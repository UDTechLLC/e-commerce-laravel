<?php

declare(strict_types = 1);

namespace App\Services\Statistic;

use App\Models\Order;
use App\Services\Statistic\Traits\LabelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class StatisticService
 * @package App\Services\Statistic
 */
class OrderStatisticService
{
    use LabelTrait;

    const DAY_FORMAT = 'd';

    /**
     * Get statistic for day period.
     *
     * @return array
     */
    public function getDayStats(): array
    {
        /** @var Carbon $now */
        $now = now()->addHour();
        $startOfDay = now()->copy()->startOfDay();
        $result = [];

        /** @var $orders Collection */
        $orders = Order::whereDay('created_at', $now->format(self::DAY_FORMAT))
            ->where('state', Order::ORDER_STATE_PROCESSING)
            ->get();

        do {
            $timeFilteredCollection = $orders->filter(function ($item) use ($startOfDay) {
                return $item->created_at->between($startOfDay, $startOfDay->copy()->addHour());
            });

            $total[] = number_format($timeFilteredCollection->sum('total_cost'), 2, ".", "");
            $shipping[] = number_format($timeFilteredCollection->sum('shipping_cost'), 2, ".", "");
            $products[] = number_format($timeFilteredCollection->sum('product_cost'), 2, ".", "");
        } while ($startOfDay->addHour()->diffInHours($now) !== 0);

        $result['labels'] = $this->getHoursLabels(count($total));
        $result['total'] = $total;
        $result['shipping'] = $shipping;
        $result['products'] = $products;

        return $result;
    }

    /**
     * Get statistic for week period.
     *
     * @return array
     */
    public function getWeekStats(): array
    {
        /** @var Carbon $today */
        $now = now();
        $today = today();
        $startOfWeek = $today->copy()->startOfWeek();
        $result = [];

        /** @var $orders Collection */
        $orders = Order::whereDate('created_at', '>=', $startOfWeek)
            ->whereDate('created_at', '<=', $now)
            ->where('state', Order::ORDER_STATE_PROCESSING)
            ->get();

        do {
            $timeFilteredCollection = $orders->filter(function ($item) use ($startOfWeek) {
                return $item->created_at->between($startOfWeek, $startOfWeek->copy()->addDay());
            });

            $total[] = number_format($timeFilteredCollection->sum('total_cost'), 2, ".", "");
            $shipping[] = number_format($timeFilteredCollection->sum('shipping_cost'), 2, ".", "");
            $products[] = number_format($timeFilteredCollection->sum('product_cost'), 2, ".", "");
        } while ($startOfWeek->addDay() <= $today);

        $result['labels'] = $this->getWeekLabels(count($total));
        $result['total'] = $total;
        $result['shipping'] = $shipping;
        $result['products'] = $products;

        return $result;
    }

    /**
     * Get statistic for month period.
     *
     * @return array
     */
    public function getMonthStats(): array
    {
        $today = today();
        $startOfMonth = $today->copy()->startOfMonth();

        /** @var $orders Collection */
        $orders = Order::whereMonth('created_at', $today->month)
            ->where('state', Order::ORDER_STATE_PROCESSING)
            ->get();

        do {
            $timeFilteredCollection = $orders->filter(function ($item) use ($startOfMonth) {
                return $item->created_at->between($startOfMonth, $startOfMonth->copy()->addDay());
            });

            $total[] = number_format($timeFilteredCollection->sum('total_cost'), 2, ".", "");
            $shipping[] = number_format($timeFilteredCollection->sum('shipping_cost'), 2, ".", "");
            $products[] = number_format($timeFilteredCollection->sum('product_cost'), 2, ".", "");
        } while ($startOfMonth->addDay() <= $today);

        $result['labels'] = $this->getDaysOfMonthLabels(count($total));
        $result['total'] = $total;
        $result['shipping'] = $shipping;
        $result['products'] = $products;

        return $result;
    }

    /**
     * Get statistic for year period.
     *
     * @return array
     */
    public function getYearStats(): array
    {
        $lastOfMonth = today()->lastOfMonth();
        $startOfYear = today()->startOfYear();

        /** @var $orders Collection */
        $orders = Order::whereYear('created_at', $lastOfMonth->year)
            ->where('state', Order::ORDER_STATE_PROCESSING)
            ->get();

        do {
            $timeFilteredCollection = $orders->filter(function ($item) use ($startOfYear) {
                return $item->created_at->between($startOfYear, $startOfYear->copy()->addMonth());
            });

            $total[] = number_format($timeFilteredCollection->sum('total_cost'), 2, ".", "");
            $shipping[] = number_format($timeFilteredCollection->sum('shipping_cost'), 2, ".", "");
            $products[] = number_format($timeFilteredCollection->sum('product_cost'), 2, ".", "");
        } while ($startOfYear->addMonth() <= $lastOfMonth);

        $result['labels'] = $this->getDaysOfMonthLabels(count($total));
        $result['total'] = $total;
        $result['shipping'] = $shipping;
        $result['products'] = $products;

        return $result;
    }

    public function getCustomPeriodStats($startDate, $endDate)
    {
        /** @var Carbon $startDate */
        $startDate = Carbon::createFromFormat('Y-m-d', $startDate);
        /** @var Carbon $endDate */
        $endDate = Carbon::createFromFormat('Y-m-d', $endDate);

        /** @var $orders Collection */
        $orders = Order::whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->where('state', Order::ORDER_STATE_PROCESSING)
            ->get();

        if ($startDate->diffInMonths($endDate) !== 0) {
            $startDate = $startDate->startOfMonth();
            $step = 'addMonth';
            $labels = $this->getCustomPeriodMonthsLabels($startDate->copy(), $endDate->copy());
        } else {
            $step = 'addDay';
            $labels = $this->getCustomPeriodDaysLabels($startDate->copy(), $endDate->copy());
        }

        do {
            $timeFilteredCollection = $orders->filter(function ($item) use ($startDate, $endDate, $step) {
                    return $item->created_at->between($startDate, $startDate->copy()->$step());
            });

            $total[] = number_format($timeFilteredCollection->sum('total_cost'), 2, ".", "");
            $shipping[] = number_format($timeFilteredCollection->sum('shipping_cost'), 2, ".", "");
            $products[] = number_format($timeFilteredCollection->sum('product_cost'), 2, ".", "");
        } while ($startDate->$step() <= today());

        $result['labels'] = $labels;

        $result['total'] = $total;
        $result['shipping'] = $shipping;
        $result['products'] = $products;

        return $result;
    }
}

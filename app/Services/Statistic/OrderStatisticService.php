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
     * @var
     */
    protected $startDate;

    /**
     * @var
     */
    protected $endDate;

    /**
     * StatisticService constructor.
     *
     * @param null $startDate
     * @param null $endDate
     */
    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * Get statistic for day period.
     *
     * @return array
     */
    public function getDayStats(): array
    {
        /** @var Carbon $now */
        $now = now();
        $startOfDay = now()->copy()->startOfDay();
        $result = [];

        /** @var $orders Collection */
        $orders = Order::whereDay('created_at', $now->format(self::DAY_FORMAT))->get();

        do {
            $timeFilteredCollection = $orders->filter(function ($item) use ($startOfDay) {
                return $item->created_at->between($startOfDay, $startOfDay->copy()->addHour());
            });

            $total[] = $timeFilteredCollection->sum('total_cost');
            $shipping[] = $timeFilteredCollection->sum('shipping_cost');
            $products[] = $timeFilteredCollection->sum('product_cost');
        } while ($startOfDay->addHour()->diffInHours($now) !== 0);

        $result['labels'] = $this->getHoursLabels(count($total));
        $result['total'] = array_combine($this->getHoursLabels(count($total)), $total);
        $result['shipping'] = array_combine($this->getHoursLabels(count($shipping)), $shipping);
        $result['products'] = array_combine($this->getHoursLabels(count($products)), $products);

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

        $orders = Order::whereDate('created_at', '>=', $startOfWeek)
            ->whereDate('created_at', '<=', $now)
            ->get();

        do {
            $result[] = $orders->filter(function ($item) use ($startOfWeek) {
                return $item->created_at->between($startOfWeek, $startOfWeek->copy()->addDay());
            })->sum('total_cost');
        } while ($startOfWeek->addDay() <= $today);

        return array_combine($this->getWeekLabels(count($result)), $result);
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

        $orders = Order::whereMonth('created_at', $today->month)->get();

        do {
            $result[] = $orders->filter(function ($item) use ($startOfMonth) {
                return $item->created_at->between($startOfMonth, $startOfMonth->copy()->addDay());
            })->sum('total_cost');
        } while ($startOfMonth->addDay() <= $today);

        return array_combine($this->getDaysOfMonthLabels(count($result)), $result);
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

        $orders = Order::whereYear('created_at', $lastOfMonth->year)->get();

        do {
            $result[] = $orders->filter(function ($item) use ($startOfYear) {
                return $item->created_at->between($startOfYear, $startOfYear->copy()->addMonth());
            })->sum('total_cost');
        } while ($startOfYear->addMonth() <= $lastOfMonth);

        return array_combine($this->getMonthsOfYearLabels(count($result)), $result);
    }
}

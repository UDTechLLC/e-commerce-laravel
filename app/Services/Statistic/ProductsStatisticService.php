<?php

declare(strict_types = 1);

namespace App\Services\Statistic;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Services\Statistic\Traits\LabelTrait;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;
use Carbon\Carbon;

/**
 * Class ProductsStatisticService.
 *
 * @package App\Services\Statistic
 */
class ProductsStatisticService
{
    use LabelTrait;

    const DAY_FORMAT = 'd';

    /**
     * Get statistic for week period.
     *
     * @return array
     */
    public function getTotalDayStats(): array
    {
        $period = today()->startOfDay()->format('Y-m-d H:i:s');

        return $this->getTotalPeriodStats($period);
    }

    /**
     * Get statistic for week period.
     *
     * @return array
     */
    public function getTotalWeekStats(): array
    {
        $period = today()->startOfWeek()->format('Y-m-d H:i:s');

        return $this->getTotalPeriodStats($period);
    }

    /**
     * Get statistic for month period.
     *
     * @return array
     */
    public function getTotalMonthStats(): array
    {
        $period = today()->startOfMonth()->format('Y-m-d H:i:s');

        return $this->getTotalPeriodStats($period);
    }

    /**
     * Get statistic for year period.
     *
     * @return array
     */
    public function getTotalYearStats(): array
    {
        $period = today()->startOfYear()->format('Y-m-d H:i:s');

        return $this->getTotalPeriodStats($period);
    }

    /**
     * @param $startDate
     * @param $endDate
     * @return array
     */
    public function getTotalCustomStats($startDate, $endDate):array
    {
        $startDate = Carbon::parse($startDate)->startOfDay()->format('Y-m-d H:i:s');
        $endDate = Carbon::parse($endDate)->endOfDay()->format('Y-m-d H:i:s');

        return $this->getTotalCustomPeriodStats($startDate, $endDate);
    }

    /**
     * Get specific product stats for day period.
     *
     * @param string $product
     *
     * @return array
     */
    public function getProductDayStats(string $product): array
    {
        $period = now()->copy()->startOfDay()->format('Y-m-d');

        /** @var Carbon $now */
        $now = now()->addHour();
        $startOfDay = now()->copy()->startOfDay();
        $result = [];

        $products = $this->getProductPeriodStats($period, $product);

        do {
            $result[] = $products->filter(function ($item) use ($startOfDay) {
                return $item->created_at->between($startOfDay, $startOfDay->copy()->addHour());
            })->sum('count');
        } while ($startOfDay->addHour()->diffInHours($now) !== 0);

        return [
            'labels' => $this->getHoursLabels(count($result)),
            'data'   => $result,
        ];
    }

    /**
     * Get specific product stats for week period.
     *
     * @param string $product
     *
     * @return array
     */
    public function getProductWeekStats(string $product): array
    {
        $period = today()->startOfWeek()->format('Y-m-d');

        /** @var Carbon $today */
        $today = today();
        $startOfWeek = $today->copy()->startOfWeek();
        $result = [];

        $products = $this->getProductPeriodStats($period, $product);

        do {
            $result[] = $products->filter(function ($item) use ($startOfWeek) {
                return $item->created_at->between($startOfWeek, $startOfWeek->copy()->addDay());
            })->sum('count');
        } while ($startOfWeek->addDay() <= $today);

        return [
            'labels' => $this->getWeekLabels(count($result)),
            'data'   => $result,
        ];
    }

    /**
     * Get specific product stats for month period.
     *
     * @param string $product
     *
     * @return array
     */
    public function getProductMonthStats(string $product): array
    {
        $period = today()->startOfMonth()->format('Y-m-d');

        $today = today();
        $startOfMonth = $today->copy()->startOfMonth();

        $products = $this->getProductPeriodStats($period, $product);

        do {
            $result[] = $products->filter(function ($item) use ($startOfMonth) {
                return $item->created_at->between($startOfMonth, $startOfMonth->copy()->addDay());
            })->sum('count');
        } while ($startOfMonth->addDay() <= $today);

        return [
            'labels' => $this->getDaysOfMonthLabels(count($result)),
            'data'   => $result,
        ];
    }

    /**
     * Get specific product stats for year period.
     *
     * @param string $product
     *
     * @return array
     */
    public function getProductYearStats(string $product): array
    {
        $period = today()->startOfYear()->format('Y-m-d');

        $lastOfMonth = today()->lastOfMonth();
        $startOfYear = today()->startOfYear();

        $products = $this->getProductPeriodStats($period, $product);

        do {
            $result[] = $products->filter(function ($item) use ($startOfYear) {
                return $item->created_at->between($startOfYear, $startOfYear->copy()->addMonth());
            })->sum('count');
        } while ($startOfYear->addMonth() <= $lastOfMonth);

        return [
            'labels' => $this->getMonthsOfYearLabels(count($result)),
            'data'   => $result,
        ];
    }

    /**
     * Get stats for all product by period.
     *
     * @param string $period
     *
     * @return array
     */
    private function getTotalPeriodStats(string $period): array
    {
        return \DB::select(\DB::raw('
            select p.id, p.title, p.slug, res.count, res.total from products as p inner join (
                select slug, sum(opres.count) as `count`, sum(opres.product_price) as `total`
                    from products
                        left join (select op.* from orders o 
                            inner join order_product op on o.id = op.order_id and o.state = "PROCESSING") opres
                                on products.id = opres.product_id
                                and opres.created_at >= \'' . $period . '\'
                    group by slug
                ) res on p.slug = res.slug
                order by res.count desc;'));
    }

    /**
     * @param string $startDate
     * @param string $endDate
     * @return array
     */
    private function getTotalCustomPeriodStats(string $startDate, string $endDate): array
    {
        return \DB::select(\DB::raw('
            select p.id, p.title, p.slug, res.count, res.total from products as p inner join (
                select slug, sum(opres.count) as `count`, sum(opres.product_price) as `total`
                    from products
                        left join (select op.* from orders o 
                            inner join order_product op on o.id = op.order_id and o.state = "PROCESSING") opres
                                on products.id = opres.product_id
                                and opres.created_at >= \'' . $startDate . '\'
                                and opres.created_at <= \'' . $endDate . '\'
                    group by slug
                ) res on p.slug = res.slug
                order by res.count desc;'));
    }

    /**
     * Get stats for specific product by period.
     *
     * @param string $period
     * @param string $product
     *
     * @return Collection
     */
    private function getProductPeriodStats(string $period, string $product)
    {
        $result = OrderProduct::where('product_id', Product::where('slug', $product)->pluck('id'))
            ->where('created_at', '>=', $period)
            ->whereIn('order_id', Order::where('state', Order::ORDER_STATE_PROCESSING)->pluck('id'))
            ->get();

        return $result;
    }

    /**
     * @param $product
     * @param $startDate
     * @param $endDate
     * @return array
     */
    public function getCustomPeriodStats($product, $startDate, $endDate)
    {
        /** @var Carbon $startDate */
        $startDate = Carbon::createFromFormat('Y-m-d', $startDate);
        /** @var Carbon $endDate */
        $endDate = Carbon::createFromFormat('Y-m-d', $endDate);

        /** @var $orders Collection */
        $products = $this->getProductCustomPeriodStats($product, $startDate, $endDate);

        if ($startDate->diffInMonths($endDate) !== 0) {
            $startDate = $startDate->startOfMonth();
            $step = 'addMonth';
            $labels = $this->getCustomPeriodMonthsLabels($startDate->copy(), $endDate->copy());
        } else {
            $startDate = $startDate->startOfDay();
            $step = 'addDay';
            $labels = $this->getCustomPeriodDaysLabels($startDate->copy(), $endDate->copy());
        }

        do {
            $result[] = $products->filter(function ($item) use ($startDate, $step) {
                return $item->created_at->between($startDate, $startDate->copy()->$step());
            })->sum('count');
        } while ($startDate->$step() <= $endDate);

        return [
            'labels' => $labels,
            'data'   => $result
        ];
    }

    /**
     * Get stats for specific product by period.
     *
     * @param string $product
     * @param string $start
     * @param string $end
     *
     * @return Collection
     */
    private function getProductCustomPeriodStats(string $product, $start, $end)
    {
        $result = OrderProduct::where('product_id', Product::where('slug', $product)->pluck('id'))
            ->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)
            ->whereIn('order_id', Order::where('state', Order::ORDER_STATE_PROCESSING)->pluck('id'))
            ->get();

        return $result;
    }
}

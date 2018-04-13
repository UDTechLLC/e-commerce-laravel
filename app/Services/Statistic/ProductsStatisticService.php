<?php

declare(strict_types = 1);

namespace App\Services\Statistic;

use App\Models\Order;
use App\Models\OrderProduct;
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
    const DAY_FORMAT = 'd';

    /**
     * Get statistic for week period.
     *
     * @return array
     */
    public function getTotalWeekStats(): array
    {
        $period = today()->startOfWeek()->format('Y-m-d');

        return $this->getTotalPeriodStats($period);
    }

    /**
     * Get statistic for month period.
     *
     * @return array
     */
    public function getTotalMonthStats(): array
    {
        $period = today()->startOfMonth()->format('Y-m-d');

        return $this->getTotalPeriodStats($period);
    }

    /**
     * Get statistic for year period.
     *
     * @return array
     */
    public function getTotalYearStats(): array
    {
        $period = today()->startOfYear()->format('Y-m-d');

        return $this->getTotalPeriodStats($period);
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

        return array_combine($this->getWeekLabels(count($result)), $result);
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

        return array_combine($this->getDaysOfMonthLabels(count($result)), $result);
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

        return array_combine($this->getMonthsOfYearLabels(count($result)), $result);
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
            select p.slug, sum(op.count) as "count" 
              from products as p 
              left join order_product as op
              on p.id = op.product_id
              and op.created_at >= '. $period .'
              group by p.slug
              order by "count" desc
              '));
    }

    /**
     * Get stats for specific product by period.
     *
     * @param string $period
     * @param string $product
     *
     * @return array
     */
    private function getProductPeriodStats(string $period, string $product): array
    {
        $result = OrderProduct::where('product_id', Product::where('slug', $product)->pluck('id'))
            ->where('created_at', '>=', $period)
            ->get();

        return $result;
    }

    /**
     * Get week labels.
     *
     * @param $count
     *
     * @return array
     */
    private function getWeekLabels($count): array
    {
        return array_slice([
            'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday',
        ], 0, $count);
    }

    /**
     * Get days of month labels.
     *
     * @param $count
     *
     * @return array
     */
    private function getDaysOfMonthLabels($count): array
    {
        /** @var Carbon $month */
        $startOfMonth = now()->startOfMonth();
        $lastOfMonth = now()->lastOfMonth();

        $result = [];

        do {
            $result[] = $startOfMonth->format('Y-m-d');
        } while ($startOfMonth->addDay() <= $lastOfMonth);

        return array_slice($result, 0, $count);
    }

    /**
     * Get Months labels.
     *
     * @param $count
     *
     * @return array
     */
    private function getMonthsOfYearLabels($count): array
    {
        return array_slice([
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December',
        ], 0, $count);
    }
}

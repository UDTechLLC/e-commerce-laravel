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
            select p.title, p.slug, res.count from products as p inner join (
              select title, sum(order_product.count) as `count`
               from `products`
                left join `order_product`
                  on `products`.`id` = `order_product`.`product_id`
                  and `order_product`.`created_at` >= ' . $period . '
                group by `title`
            ) res on p.title = res.title
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
            ->get();

        return $result;
    }
}

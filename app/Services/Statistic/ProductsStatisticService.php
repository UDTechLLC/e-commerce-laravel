<?php

declare(strict_types = 1);

namespace App\Services\Statistic;

use App\Models\Order;
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
    public function getWeekStats(): array
    {
        $period = today()->startOfWeek()->format('Y-m-d');

        return $this->getPeriodStats($period);
    }

    /**
     * Get statistic for month period.
     *
     * @return array
     */
    public function getMonthStats(): array
    {
        $period = today()->startOfMonth()->format('Y-m-d');

        return $this->getPeriodStats($period);
    }

    /**
     * Get statistic for year period.
     *
     * @return array
     */
    public function getYearStats(): array
    {
        $period = today()->startOfYear()->format('Y-m-d');

        return $this->getPeriodStats($period);
    }

    /**
     * @param string $period
     *
     * @return array
     */
    private function getPeriodStats(string $period): array
    {
        return \DB::select(\DB::raw('
            select p.slug, sum(op.count) as "count" 
              from products as p 
              left join (select * from order_product where created_at > ' . $period . ') as op
              on p.id = op.product_id
              group by p.slug
              '));
    }
}

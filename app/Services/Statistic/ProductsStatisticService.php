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
     * Get statistic for day period.
     */
    public function getWeekStats()
    {
        $date = today()->startOfWeek()->format('Y-m-d');

        $result = \DB::select(\DB::raw('
            select p.slug, sum(op.count) as "count" 
              from products as p 
              left join (select * from order_product where created_at > ' . $date .') as op
              on p.id = op.product_id
              group by p.slug
              '));

        return $result;
    }

    /**
     * Get hours labels.
     *
     * @param $count
     *
     * @return array
     */
    private function getHoursLabels($count): array
    {
        return array_slice([
            '00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00',
            '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00',
        ], 0, $count);
    }
}

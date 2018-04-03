<?php

declare(strict_types = 1);

namespace App\Services\Statistic;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class StatisticService
 * @package App\Services\Statistic
 */
class StatisticService
{
    const DAY_FORMAT = 'd';
    const MONTH_FORMAT = 'm';
    const YEAR_FORMAT = 'Y';

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
     */
    public function getDayStats()
    {
        /** @var Carbon $now */
        $now = now();
        $startOfDay = now()->startOfDay();
        $result = [];

        /** @var $orders Collection */
        $orders = Order::whereDay('created_at', $now->format(self::DAY_FORMAT))->get();

        do {
            $result[] = $orders->filter(function ($item) use ($startOfDay) {
                return $item->created_at->between($startOfDay, $startOfDay->copy()->addHour());
            })->sum('total_cost');
        } while ($startOfDay->addHour()->diffInHours($now) !== 0);

        return array_combine($this->getHoursLabels(count($result)), $result);
    }

    private function getHoursLabels($count)
    {
        return array_slice([
            '00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00',
            '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00',
        ], 0, $count);
    }
}

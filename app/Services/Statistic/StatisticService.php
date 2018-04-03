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
            $result[] = $orders->filter(function ($item) use ($startOfDay) {
                return $item->created_at->between($startOfDay, $startOfDay->copy()->addHour());
            })->sum('total_cost');
        } while ($startOfDay->addHour()->diffInHours($now) !== 0);

        return array_combine($this->getHoursLabels(count($result)), $result);
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

    private function getWeekLabels($count): array
    {
        return array_slice([
            'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday',
        ], 0, $count);
    }

    /**
     * Get date of month list.
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
        } while ($startOfMonth->addDay()->diffInDays($lastOfMonth) !== 0);

        return array_slice($result, 0, $count);
    }
}

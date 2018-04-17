<?php

declare(strict_types = 1);

namespace App\Services\Statistic\Traits;

use Carbon\Carbon;

/**
 * Class LabelTrait.
 *
 * @package App\Services\Statistic\Traits
 */
trait LabelTrait
{
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

    private function getCustomPeriodDaysLabels($startDate, $endDate)
    {
        $result = [];

        do {
            $result[] = $startDate->format('Y-m-d');
        } while ($startDate->addDay() <= $endDate);

        return $result;
    }

    /**
     * @param Carbon $startDate
     * @param Carbon $endDate
     *
     * @return array
     */
    private function getCustomPeriodMonthsLabels($startDate, $endDate)
    {
        $startOfMonth = $startDate->startOfMonth();

        do {
            $result[] = $startOfMonth->format('Y-m-d');
        } while ($startDate->addMonth() <= $endDate);

        return $result;
    }
}

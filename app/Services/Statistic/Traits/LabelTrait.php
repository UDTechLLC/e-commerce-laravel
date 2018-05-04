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
            '12:00 AM', '01:00 AM', '02:00 AM', '03:00 AM', '04:00 AM', '05:00 AM', '06:00 AM', '07:00 AM', '08:00AM',
            '09:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '01:00 PM', '02:00 PM', '03:00 PM', '04:00 PM', '05:00 PM',
            '06:00 PM', '07:00 PM', '08:00 PM', '09:00 PM', '10:00 PM', '11:00 PM',
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

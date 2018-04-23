<?php
declare (strict_types = 1);

namespace App\Services;

use Carbon\Carbon,
    Spatie\Analytics\Period;

/**
 * Class GoogleAnalyticsService
 * @package App\Services
 */
class GoogleAnalyticsService
{
    /**
     * @return array
     */
    public function getVisitorsForDay(): array
    {
        $end = (int)now()->addHour()->format('H');
        $startDate = Carbon::now()->startOfDay();

        return array_slice($this->getVisitors('ga:hour', $startDate), 0, $end);
    }

    /**
     * @return array
     */
    public function getVisitorsForWeek(): array
    {
        $startDate = Carbon::now()->startOfWeek();

        return $this->getVisitors('ga:day', $startDate);
    }

    /**
     * @return array
     */
    public function getVisitorsForMonth(): array
    {
        $startDate = Carbon::now()->startOfMonth();

        return $this->getVisitors('ga:day', $startDate);
    }

    /**
     * @return array
     */
    public function getVisitorsForYear():array
    {
        $startDate = Carbon::now()->startOfYear();

        return $this->getVisitors('ga:month', $startDate);
    }

    /**
     * @param $startDate
     * @param $endDate
     * @param $step
     * @return array
     */
    public function getVisitorsForCustomPeriod($startDate, $endDate, $step):array
    {
        $dimensions = ($step == 'addDay') ? 'ga:day' : 'ga:month';

        return $this->getVisitors($dimensions, $startDate, $endDate);
    }

    /**
     * @param $dimensions
     * @param $startDate
     * @param null $endDate
     * @return array
     */
    private function getVisitors($dimensions, $startDate, $endDate = null)
    {
        $endDate = ($endDate) ? $endDate : now();
        $period = Period::create($startDate, $endDate);
        $visitorsData = \Analytics::performQuery($period, 'ga:users, ga:pageviews', ['dimensions' => $dimensions]);

        return collect($visitorsData['rows'] ?? [])->map(function (array $dateRow) {
            return (int)$dateRow[1]; /// visitors
        })->toArray();
    }
}

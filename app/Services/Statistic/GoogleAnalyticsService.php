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
     * @return array
     */
    public function getDeviceAnalytics():array
    {
        $period = Period::create(Carbon::parse('2018-01-01'), now());
        $data = $this->getAnalytics($period, 'ga:sessions', ["ga:deviceCategory"]);

        return [
            'labels'  => $data->pluck(0)->all(),
            'session' => $data->pluck(1)->all()
        ];
    }

    /**
     * @return $this
     */
    public function getBrowserAnalytics()
    {
        $period = Period::create(Carbon::parse('2018-01-01'), now());

        $data = $this->getAnalytics($period, 'ga:sessions', ["ga:browser"])->sortByDesc(1);
        $totalSessions = $data->sum(1);
        $others = $data->slice(7)->sum(1);

        return $data->map(function (array $dateRow) use ($totalSessions) {
            return [
                'browser' => $dateRow[0],
                'session' => $dateRow[1],
                'percent' => round($dateRow[1] / $totalSessions * 100, 2)
            ];
        })->slice(0, 7)->push([
            'browser' => 'Others',
            'session' => $others,
            'percent' => round($others / $totalSessions * 100, 2)
        ]);
    }

    /**
     * @return $this
     */
    public function getSourceAnalytics()
    {
        $period = Period::create(Carbon::parse('2018-01-01'), now());
        $data  = $this->getAnalytics($period, 'ga:sessions', ['ga:source'])->sortByDesc(1);
        $totalSessions = $data->sum(1);
        $others = $data->slice(7)->sum(1);

        return $data->slice(0, 7)->map(function (array $dateRow) use ($totalSessions) {
            return [
                'source' => $dateRow[0],
                'session' => $dateRow[1],
                'percent' => round($dateRow[1] / $totalSessions * 100, 2)
            ];
        })->slice(0, 7)->push([
            'source' => 'Others',
            'session' => $others,
            'percent' => round($others / $totalSessions * 100, 2)
        ]);
    }

    /**
     * @param $dimensions
     * @param $startDate
     * @param null $endDate
     * @return array
     */
    private function getVisitors($dimensions, $startDate, $endDate = null): array
    {
        $endDate = ($endDate) ? $endDate : now();
        $period = Period::create($startDate, $endDate);

        return $this->getAnalytics($period, 'ga:users', $dimensions)->map(function (array $dateRow) {
            return (int)$dateRow[1]; /// visitors
        })->toArray();
    }

    /**
     * @param $period
     * @param $metrics
     * @param $dimensions
     * @return \Illuminate\Support\Collection|\IlluminateAgnostic\Arr\Support\Collection|\IlluminateAgnostic\Collection\Support\Collection|\IlluminateAgnostic\Str\Support\Collection|\Vanilla\Support\Collection
     */
    private function getAnalytics($period, $metrics, $dimensions)
    {
        return collect(\Analytics::performQuery($period, $metrics, ['dimensions' => $dimensions])['rows'] ?? []);
    }
}

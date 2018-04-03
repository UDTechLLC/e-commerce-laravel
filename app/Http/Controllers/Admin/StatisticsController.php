<?php

namespace App\Http\Controllers\Admin;

use App\Services\Statistic\StatisticService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.statistics.index');
    }

    /**
     * Get orders sum for fixed period.
     *
     * @param Request $request
     *
     * @return JsonResponse
     * @throws \Throwable
     */
    public function totalSumFixedPeriod(Request $request): JsonResponse
    {
        throw_if(!($period = $request->get('period')), new NotFoundHttpException());

        return response()->json($this->getTotalSumFixedPeriod($period));
    }

    public function totalSumCustomPeriod()
    {
        //todo::
    }

    /**
     * Get total orders sum for custom period.
     *
     * @param string $period
     *
     * @return array|string
     */
    private function getTotalSumFixedPeriod(string $period)
    {
        $statisticService = new StatisticService();

        switch ($period) {
            case 'day':
                return $statisticService->getDayStats();
                break;
            case 'week':
                return $statisticService->getWeekStats();
                break;
            case 'month':
                return $statisticService->getMonthStats();
                break;
            case 'year':
                return $statisticService->getYearStats();
                break;
        }
    }
}

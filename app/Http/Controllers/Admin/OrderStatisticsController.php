<?php

namespace App\Http\Controllers\Admin;

use App\Services\Statistic\OrderStatisticService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderStatisticsController extends Controller
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
        $custom = [
            'start' => $request->get('start'),
            'end'   => $request->get('end')
        ];

        return response()->json($this->getTotalSumFixedPeriod($period, $custom));
    }

    public function totalSumCustomPeriod()
    {
        //todo::
    }

    /**
     * Get total orders sum for custom period.
     *
     * @param string $period
     * @param array|null $custom
     * @return array|string
     */
    private function getTotalSumFixedPeriod(string $period, array $custom = null)
    {
        $statisticService = new OrderStatisticService();

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
            case 'custom':
                throw_if(!($custom['start'] && $custom['end']), new NotFoundHttpException());
                return $statisticService->getCustomPeriodStats($custom['start'], $custom['end']);
                break;
        }
    }
}

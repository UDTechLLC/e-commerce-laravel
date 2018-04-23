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
     * @var OrderStatisticService
     */
    protected $service;

    public function __construct(OrderStatisticService $service)
    {
        $this->service = $service;
    }

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
     *
     * @return array|string
     * @throws \Throwable
     */
    private function getTotalSumFixedPeriod(string $period, array $custom = null)
    {
        switch ($period) {
            case 'day':
                return $this->service->getDayStats();
            case 'week':
                return $this->service->getWeekStats();
            case 'month':
                return $this->service->getMonthStats();
            case 'year':
                return $this->service->getYearStats();
            case 'custom':
                throw_if(!($custom['start'] && $custom['end']), new NotFoundHttpException());
                return $this->service->getCustomPeriodStats($custom['start'], $custom['end']);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Services\Statistic\ProductsStatisticService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductStatisticController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function allProductsStatisticFixedPeriod(Request $request)
    {
        throw_if(!($period = $request->get('period')), new NotFoundHttpException());

        return response()->json($this->getAllProductsStatisticFixedPeriod($period));
    }

    private function getAllProductsStatisticFixedPeriod(string $period)
    {
        $statisticService = new ProductsStatisticService();

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

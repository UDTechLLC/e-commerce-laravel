<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Services\Statistic\ProductsStatisticService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class ProductStatisticController
 * @package App\Http\Controllers\Admin
 */
class ProductStatisticController extends Controller
{
    /**
     * Get fixed period statistic for all product.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function allProductsStatisticFixedPeriod(Request $request)
    {
        throw_if(!($period = $request->get('period')), new NotFoundHttpException());
        $custom = [
            'start' => $request->get('start'),
            'end'   => $request->get('end')
        ];

        return response()->json($this->getAllProductsStatisticFixedPeriod($period, $custom));
    }

    /**
     * Get fixed period statistic for specific product.
     *
     * @param Request $request
     * @param Product $product
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function productStatisticFixedPeriod(Request $request, Product $product)
    {
        throw_if(!($period = $request->get('period')), new NotFoundHttpException());
        $product = $product->slug;
        $custom = [
            'start' => $request->get('start'),
            'end'   => $request->get('end')
        ];

        return response()->json($this->getProductsStatisticFixedPeriod($period, $product, $custom));
    }

    /**
     * Get statistics by period for all products.
     *
     * @param string $period
     * @param array|null $custom
     *
     * @return array
     * @throws \Throwable
     * @throws string
     */
    private function getAllProductsStatisticFixedPeriod(string $period, array $custom = null): array
    {
        $statisticService = new ProductsStatisticService();

        switch ($period) {
            case 'day':
                return $statisticService->getTotalDayStats();
            case 'week':
                return $statisticService->getTotalWeekStats();
            case 'month':
                return $statisticService->getTotalMonthStats();
            case 'year':
                return $statisticService->getTotalYearStats();
            case 'custom':
                throw_if(!($custom['start'] && $custom['end']), new NotFoundHttpException());
                return $statisticService->getTotalCustomStats($custom['start'], $custom['end']);
        }
    }

    /**
     * @param string $period
     * @param $product
     * @param array|null $custom
     *
     * @return array
     * @throws \Throwable
     * @throws string
     */
    private function getProductsStatisticFixedPeriod(string $period, $product, array $custom = null): array
    {
        $statisticService = new ProductsStatisticService();

        switch ($period) {
            case 'day':
                return $statisticService->getProductDayStats($product);
            case 'week':
                return $statisticService->getProductWeekStats($product);
            case 'month':
                return $statisticService->getProductMonthStats($product);
            case 'year':
                return $statisticService->getProductYearStats($product);
            case 'custom':
                throw_if(!($custom['start'] && $custom['end']), new NotFoundHttpException());
                return $statisticService->getCustomPeriodStats($product, $custom['start'], $custom['end']);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Services\Statistic\ProductsStatisticService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

        return response()->json($this->getAllProductsStatisticFixedPeriod($period));
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
     *
     * @return array
     */
    private function getAllProductsStatisticFixedPeriod(string $period): array
    {
        $statisticService = new ProductsStatisticService();
        if ($period == 'custom') {
            $period = 'day';            /// @FIXME
        }

        switch ($period) {
            case 'day':
                return $statisticService->getTotalDayStats();
            case 'week':
                return $statisticService->getTotalWeekStats();
            case 'month':
                return $statisticService->getTotalMonthStats();
            case 'year':
                return $statisticService->getTotalYearStats();
        }
    }

    /**
     * @param string $period
     *
     * @param $product
     *
     * @return array
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

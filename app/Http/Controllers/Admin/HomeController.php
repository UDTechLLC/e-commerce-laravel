<?php

namespace App\Http\Controllers\Admin;

use App\Models\{
    Order, OrderProduct
};
use App\Services\GoogleAnalyticsService;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::where('state', Order::ORDER_STATE_PROCESSING);

        $product = OrderProduct::whereHas('orders', function ($q) {
            $q->where('state', Order::ORDER_STATE_PROCESSING);
        });

        $googleService = new GoogleAnalyticsService();

        return view('admin.dashboard', [
            'totalOrders'   => $order->count(),
            'totalUsers'    =>
                array_sum($googleService->getVisitorsForCustomPeriod(Carbon::parse('2018-01-01'), now(), 'ga:month')),
            'totalProducts' => $product->sum('count'),
            'totalSales'    => number_format($order->sum('total_cost') / 100, 2, ".", ""),
            
            'monthOrders' => $order->whereMonth('created_at', now()->format('m'))->count(),
            'monthSales'  =>
             number_format($order->whereMonth('created_at', now()->format('m'))->sum('total_cost') / 100, 2, ".", ""),
            'totalMonthProducts' => $product->whereMonth('created_at', now()->format('m'))->sum('count'),
            'totalMonthUser' => array_sum($googleService->getVisitorsForMonth()),
            
            'todayOrders' => $order->whereDay('created_at', now()->format('d'))->count(),
            'todaySales'  =>
                number_format($order->whereDay('created_at', now()->format('d'))->sum('total_cost') / 100, 2, ".", ""),
            'totalTodayProducts' => $product->whereDay('created_at', now()->format('d'))->sum('count'),
            'totalTodayUser' => array_sum($googleService->getVisitorsForDay()),
            
            'device' => $googleService->getDeviceAnalytics(),
            'browsers' => $googleService->getBrowserAnalytics(),
            'sources' => $googleService->getSourceAnalytics()
        ]);
    }
}

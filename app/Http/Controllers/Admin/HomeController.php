<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
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

        return view('admin.dashboard', [
            'totalOrders'   => $order->count(),
            'totalUsers'    => User::count(),
            'totalProducts' => $product->sum('count'),
            'totalSales'    => number_format($order->sum('total_cost') / 100, 2, ".", ""),

            'yearOrders' => $order->whereYear('created_at', now()->format('Y'))->count(),
            'yearSales'  =>
                number_format($order->whereYear('created_at', now()->format('Y'))->sum('total_cost') / 100, 2, ".", ""),
            'totalYearProducts' => $product->whereYear('created_at', now()->format('Y'))->sum('count'),

            'monthOrders' => $order->whereMonth('created_at', now()->format('m'))->count(),
            'monthSales'  =>
             number_format($order->whereMonth('created_at', now()->format('m'))->sum('total_cost') / 100, 2, ".", ""),
            'totalMonthProducts' => $product->whereMonth('created_at', now()->format('m'))->sum('count'),

            'todayOrders' => $order->whereDay('created_at', now()->format('d'))->count(),
            'todaySales'  =>
                number_format($order->whereDay('created_at', now()->format('d'))->sum('total_cost') / 100, 2, ".", ""),
            'totalTodayProducts' => $product->whereDay('created_at', now()->format('d'))->sum('count'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

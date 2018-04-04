<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateOrderStatusRequest;
use App\Http\Resources\Admin\OrdersResource;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $order = Order::paginate(15);

        return view("admin.orders.index", [
            'orders' => $order,
        ]);
    }

    /**
     * @param Request $request
     *
     * @return
     */
    public function filter(Request $request)
    {
        $field = $request->get('field');
        $value = $request->get('value');

        $orders = Order::paginate(20);

        switch ($field) {
            case 'id':
                $orders = Order::where('id', $value)->paginate(20);
                break;
            case 'email':
                $orders = Order::whereHas('billing', function ($query) use ($value) {
                    $query->where('email', $value);
                })->paginate(20);
                break;
            case 'name':
                $orders = Order::whereHas('billing', function ($query) use ($value) {
                    $query->where('first_name', 'LIKE', $value . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $value . '%');
                })->paginate(20);
        }

        return OrdersResource::collection($orders);
    }

    public function getOrders(Request $request)
    {
        $sortField = $request->get('sortField') ?? 'id';
        $sortType = $request->get('sortType') ?? 'asc';

        $orders = Order::orderBy($sortField, $sortType)->paginate(20);

        return OrdersResource::collection($orders);
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
     *
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
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $state = Order::ORDER_STATES;

        return view('admin.orders.edit', compact('order', 'state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
//
    }

    public function updateStatus(UpdateOrderStatusRequest $request, Order $order)
    {
        $order->update([
            'state' => $request->get('state'),
        ]);

        return redirect()->route('admin.orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreShippingRequest;
use App\Models\Shipping;
use App\Http\Controllers\Controller;

/**
 * Class ShippingController
 * @package App\Http\Controllers\Web
 */
class ShippingController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.shipping.index', [
            'shippings' => Shipping::all(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.shipping.create');
    }

    /**
     * @param StoreShippingRequest $request
     */
    public function store(StoreShippingRequest $request)
    {
        Shipping::create([
            'country' => $request->get('country'),
            'cost' => $request->get('cost'),
            'isFree' => $request->get('isFree'),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('admin.shipping.edit');
    }

    /**
     * @param StoreShippingRequest $request
     * @param Shipping $shipping
     *
     * @return bool
     */
    public function update(StoreShippingRequest $request, Shipping $shipping)
    {
        return $shipping->update([
            'country' => $request->get('country'),
            'cost' => $request->get('cost'),
            'isFree' => $request->get('isFree'),
        ]);
    }

    /**
     * @param Shipping $shipping
     *
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Shipping $shipping)
    {
        return $shipping->delete();
    }
}

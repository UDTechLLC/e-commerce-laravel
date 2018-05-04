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
        return view('admin.shipping.create', [
            'countries' => Shipping::SHIPPING_COUNTRIES
        ]);
    }

    /**
     * @param StoreShippingRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreShippingRequest $request)
    {
        Shipping::create([
            'country' => $request->get('country'),
            'cost'    => $request->get('cost'),
            'isFree'  => $request->get('isFree') ?? 0,
        ]);

        return redirect()->route('admin.shipping.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Shipping $shipping)
    {
        return view('admin.shipping.edit', [
            'shipping' => $shipping
        ]);
    }

    /**
     * @param StoreShippingRequest $request
     * @param Shipping $shipping
     *
     * @return bool
     */
    public function update(StoreShippingRequest $request, Shipping $shipping)
    {
        $shipping->update([
            'cost'   => $request->get('cost'),
            'isFree' => $request->get('isFree'),
        ]);

        return redirect()->route('admin.shipping.index');
    }

    /**
     * @param Shipping $shipping
     *
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(Shipping $shipping)
    {
        $shipping->delete();

        return back();
    }
}

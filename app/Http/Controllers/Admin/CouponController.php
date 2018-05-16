<?php
declare (strict_types = 1);

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCouponRequest;
use App\Http\Requests\Admin\CreateProductRequest;
use App\Http\Resources\Admin\CouponsResource;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view("admin.coupons.index");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getCoupons(Request $request)
    {
        $sortField = $request->get('sortField') ?? 'id';
        $sortType = $request->get('sortType') ?? 'asc';

        $coupons = Coupon::orderBy($sortField, $sortType)->where('active', true)->paginate(20);

        return CouponsResource::collection($coupons);
    }

    /**
     *  Show the form for creating a new resource.
     *
     * @return View
     */

    public function create(): View
    {
        return view("admin.coupons.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCouponRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCouponRequest $request)
    {
        $coupon = Coupon::create([
            'code'          => $request->get('code'),
            'description'   => $request->get('description'),
//            'discount_type' =>$request->get('discount_type'),
            'coupon_amount' => $request->get('coupon_amount')

        ]);

        return $coupon;
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
     * @param  Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit', ['coupon' => $coupon]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CreateCouponRequest $request
     * @param  Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCouponRequest $request, Coupon $coupon)
    {
        $coupon->update([
            'code'          => $request->get('code'),
            'description'   => $request->get('description'),
            'coupon_amount' => $request->get('coupon_amount')
        ]);

        return $coupon;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->update([
            'active' => false
        ]);
    }

    public function attachProduct(Coupon $coupon)
    {
        return view('admin.coupons.coupons-product', [
            'coupon'     => $coupon,
            'productIds' => json_encode($coupon->products->pluck('id')->toArray()),
            'products'   => Product::where('published', true)->get()
        ]);
    }

    public function attach(Request $request, Coupon $coupon)
    {
        $coupon->products()->sync($request->get('products'));
    }
}

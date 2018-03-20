<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $product = Product::where('published', true)->orderBy('position')->get();

        return view("web.shop.products.index", [
            'products' => $product,
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
     * @param  Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if (!$product->published) {
            return abort(404);
        }
//        return view('web.shop.products.12week-custom-training-plan', compact('product'));
//        return view('web.shop.products.never-stop-moving-e-book', compact('product'));
//        return view('web.shop.products.shedfat-infuser-bottle', compact('product'));
//        return view('web.shop.products.resistance-bands',compact('product'));
//        return view('web.shop.products.what-to-eat-in-the-streets',compact('product'));
//        return view('web.shop.products.14-day-detox-guide',compact('product'));
//        return view('web.shop.products.queen-of-the-hill', compact('product'));
        if ($product->view_name) {
            return view('web.shop.products.' . $product->view_name . '', compact('product'));
        } else {
            return view('web.shop.products.show', compact('product'));
        }
    }

    public function challenge(): View
    {
        $product = Product::where('category', 'Limited-Time Offer')->get();

        return view("web.shop.challenges.spring", [
            'products' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
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
     *
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
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

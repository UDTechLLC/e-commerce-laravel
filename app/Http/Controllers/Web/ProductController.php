<?php

namespace App\Http\Controllers\Web;

use App\Models\Challenge;
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
        
        return view("web.shop.products.index", [
            'products' => Product::where('visible', true)->where('published', true)->orderBy('position')->get(),
            'challenges' => Challenge::where('published', true)->get()
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

        $viewName = ($product->view_name) ? 'web.shop.products.' . $product->view_name : 'web.shop.products.show';

        $checkMark = (array) json_decode($product->check_mark);

        return view($viewName, compact('product', 'checkMark'));
    }

    public function challenge(): View
    {
        $product = Product::where('category', 'Limited-Time Offer')->orderBy('position')->get();

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

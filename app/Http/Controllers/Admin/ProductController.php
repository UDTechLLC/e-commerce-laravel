<?php
declare (strict_types = 1);

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\ProductsResource;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view("admin.products.index");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getProducts(Request $request)
    {
        $sortField = $request->get('sortField') ?? 'id';
        $sortType = $request->get('sortType') ?? 'asc';

        $users = Product::orderBy($sortField, $sortType)->paginate(20);

        return ProductsResource::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create([
            'title'       => $request->get('title'),
            'slug'        => $request->get('slug'),
            'description' => $request->get('description'),
            'old_amount'  => $request->get('oldPrice'),
            'amount'      => $request->get('price')
        ]);

        $product->saveImage($request->input('image'), 'products');
        $product->saveImage($request->input('imagePreview'), 'preview');

        return $product;
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
    public function edit()
    {
        $product = Product::find(125);

        $data = [
            'title'        => $product->title,
            'subtitle'     => "subtitle",
            'description'  => $product->description,
            'image'        => $product->getMainImage(),
            'imagePreview' => $product->getPreviewImage(),
            'price'        => $product->amount,
            'oldPrice'     => $product->old_amount
        ];

        return view('admin.products.edit', ['product' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }
}

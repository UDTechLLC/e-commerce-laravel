<?php
declare (strict_types = 1);

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Http\Resources\Admin\ProductsResource;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ProductController
 * @package App\Http\Controllers\Admin
 */
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

        $products = Product::orderBy($sortField, $sortType)->paginate(20);

        return ProductsResource::collection($products);
    }

    /**
     *  Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $product = Product::create([
            'title'       => $request->get('title'),
            'slug'        => $request->get('slug'),
            'description' => $request->get('description'),
            'view_name'   => $request->get('view_name'),
            'old_amount'  => $request->get('oldPrice') ?? 0,
            'amount'      => $request->get('price'),
            'published'   => $request->get('published')
        ]);

        $product->saveImageBase64($request->input('image'), 'products');
        $product->saveImageBase64($request->input('imagePreview'), 'preview');

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
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data = [
            'title'        => $product->title,
            'subtitle'     => "subtitle",
            'description'  => $product->description,
            'image'        => $product->getFirstMediaUrl('products'),
            'imagePreview' => $product->getFirstMediaUrl('preview'),
            'price'        => $product->amount,
            'published'    => $product->published,
            'view_name'    => $product->view_name,
            'oldPrice'     => $product->old_amount,
            'slug'         => $product->slug
        ];

        return view('admin.products.edit', ['product' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return Product
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update([
            'title'       => $request->get('title'),
            'subtitle'    => $request->get('subtitle'),
            'description' => $request->get('description'),
            'view_name'   => $request->get('view_name'),
            'old_amount'  => $request->get('oldPrice') ?? "0",
            'amount'      => $request->get('price'),
            'slug'        => $request->get('slug'),
            'published'   => $request->get('published')
        ]);

        if ($request->has('image') && $this->checkImage($request->get('image'))) {
            $product->updateImageBase64($request->get('image'), 'products');
        }
        if ($request->has('imagePreview') && $this->checkImage($request->get('imagePreview'))) {
            $product->updateImageBase64($request->get('imagePreview'), 'preview');
        }

        return $product;
    }

    /**
     * @param $value
     * @return bool
     */
    private function checkImage($value): bool
    {
        return substr($value, 0, 1) != '/';
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

    /**
     * @return View
     */
    public function order()
    {
        $products = Product::where('published', true)->orderBy('position')->get();
       
        return view('admin.products.order', [
            'products' => ProductsResource::collection($products)
        ]);
    }

    /**
     * @param Request $request
     */
    public function orderSave(Request $request)
    {
        $i = 1;
        foreach($request->all() as $item) {
            Product::find($item['id'])->update([
                'position' => $i
            ]);
            $i++;
        }
    }
}

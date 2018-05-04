<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCategoryRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * @param CreateCategoryRequest $request
     *
     * @return void
     */
    public function store(CreateCategoryRequest $request)
    {
        Category::create(['title' => $request->get('title')]);
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', ['category' => $category]);
    }

    /**
     * @param CreateCategoryRequest $request
     * @param Category $category
     *
     * @return void
     */
    public function update(CreateCategoryRequest $request, Category $category)
    {
        $category->update((['title' => $request->get('title')]));
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.create');
    }
    
    public function store(Request $request)
    {
        dd($request->all());
    }
}

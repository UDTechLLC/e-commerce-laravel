<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Models\CMSHomePage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{
    public function index()
    {
        return view('admin.cms.homepage.index', [
            'banners' => CMSHomePage::all()
        ]);
    }
}

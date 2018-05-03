<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ShippingController
 * @package App\Http\Controllers\Web
 */
class ShippingController extends Controller
{
    public function index()
    {
        return view('admin.shipping.index', [
            'shippings' => Shipping::all(),
        ]);
    }
}

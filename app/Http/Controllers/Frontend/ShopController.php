<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function index($slug = null)
    {
        return view('corano-dark.frontend.shop.index', compact('slug'));
    }
}

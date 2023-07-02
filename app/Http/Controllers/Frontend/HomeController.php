<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Page;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View
    {
        $coupon = Coupon::active()->public()->first();

        $categories = Category::select('id', 'parent_id', 'slug', 'cover', 'name')
            ->has('children')
            ->with('children:id,parent_id,slug,cover,name', 'products', 'products.firstMedia')
            ->active()
            ->whereParentId(null)
            ->get();
        $sub_categories = Category::select('id', 'parent_id', 'slug', 'cover', 'name')
            ->has('products')
            ->withCount('products')
            ->with('products', 'products.firstMedia')
            ->active()
            ->whereNotNull('parent_id')
            ->orderBy('products_count', 'desc')
            ->get()
            ->unique('parent_id');

        $sliders = Slider::active()->get();

        $latest_posts = Page::active()->posts()->latest()->take(10)->get();

        return view('corano-dark.frontend.index', compact('categories', 'coupon', 'sub_categories', 'latest_posts', 'sliders'));
    }

    public function search(Request $request): JsonResponse
    {
        $data = Product::select('slug', 'name')
            ->where('name', 'LIKE', '%' . $request->productName . '%')
            ->active()
            ->hasQuantity()
            ->activeCategory()
            ->take(5)
            ->get();

        return response()->json($data);
    }
}

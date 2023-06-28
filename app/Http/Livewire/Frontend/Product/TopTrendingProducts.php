<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class TopTrendingProducts extends Component
{

    protected $listeners = ['update_cart' => '$refresh'];

    public function render()
    {
        return view('livewire.frontend.product.top-trending-products', [
            'products' => Product::query()
                ->with('firstMedia')
                ->inRandomOrder()
                ->featured()
                ->active()
                ->hasQuantity()
                ->activeCategory()
                ->take(8)
                ->get()
        ]);
    }
}

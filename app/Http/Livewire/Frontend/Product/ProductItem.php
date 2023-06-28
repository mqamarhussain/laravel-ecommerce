<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

use App\Services\CartService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProductItem extends Component
{
    use LivewireAlert;

    public Product $product;

    public function addToCart($productId)
    {
        $product = Product::whereId($productId)->active()->hasQuantity()->activeCategory()->firstOrFail();
        try {
            (new CartService())->addToList('default', $product);
            $this->emit('update_cart');
            $this->alert('success', 'added to Cart.');
        } catch(\Exception $exception) {
            $this->alert('warning', $exception->getMessage());
        }
    }

    public function addToWishList($productId)
    {
        $product = Product::whereId($productId)->active()->hasQuantity()->activeCategory()->firstOrFail();
        // dd($product);
        try {
            (new CartService())->addToList('wishlist', $product);
            $this->emit('update_wishlist');
            $this->alert('success', 'added to Wishlist.');
        } catch(\Exception $exception) {
            $this->alert('warning', $exception->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.frontend.product.product-item');
    }
}

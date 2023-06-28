<div class="product-item">
    <figure class="product-thumb">
        <a href="{{ route('product.show', $product->slug) }}">
            <img class="pri-img" src="{{ $product->image }}" alt="{{ $product->name }}">
            <img class="sec-img" src="{{ $product->image }}" alt="{{ $product->name }}">
        </a>
        <div class="product-badge">
            @if ($product->is_new)
                <div class="product-label new">
                    <span>new</span>
                </div>
            @endif
            <div class="product-label discount">
                <span>20%</span>
            </div>
        </div>
        <div class="button-group">
            <a href="#" wire:click.prevent="addToWishList('{{ $product->id }}')" data-toggle="tooltip"
                data-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
        </div>
        <div class="cart-hover">
            @if (Cart::search(function ($cartItem, $rowId) use ($product) {
                    return $cartItem->id == $product->id;
                })->count() > 0)
                <button class="btn btn-cart2" disabled>added to cart</button>
            @else
                <button class="btn btn-cart" wire:loading.remove wire:target='addToCart'
                    wire:click.prevent="addToCart('{{ $product->id }}')">add to cart</button>
                <button class="btn btn-cart" wire:loading wire:target='addToCart'>adding...</button>
            @endif

        </div>
    </figure>
    <div class="product-caption text-center">
        <div class="product-identity">
            <p class="manufacturer-name"><a href="product-details.html">Gold</a></p>
        </div>
        <ul class="color-categories">
            <li>
                <a class="c-lightblue" href="#" title="LightSteelblue"></a>
            </li>
            <li>
                <a class="c-darktan" href="#" title="Darktan"></a>
            </li>
            <li>
                <a class="c-grey" href="#" title="Grey"></a>
            </li>
            <li>
                <a class="c-brown" href="#" title="Brown"></a>
            </li>
        </ul>
        <h6 class="product-name">
            <a href="product-details.html">{{ $product->name }}</a>
        </h6>
        <div class="price-box">
            <span class="price-regular">{{ $product->price }}</span>
            <span class="price-old"><del>{{ $product->price + 0.2 * $product->price }}</del></span>
        </div>
    </div>
</div>

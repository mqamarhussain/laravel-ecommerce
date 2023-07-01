<div class="shop-product-wrapper">
    <!-- shop product top wrap start -->
    <div class="shop-top-bar">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6 order-2 order-md-1">
                <div class="top-bar-left">
                    <div class="product-view-mode">
                        <a class="active" href="#" data-target="grid-view" wire:ignore.self data-toggle="tooltip"
                            title="Grid View"><i class="fa fa-th"></i></a>
                        <a href="#" data-target="list-view" wire:ignore.self data-toggle="tooltip"
                            title="List View"><i class="fa fa-list"></i></a>
                    </div>
                    <div class="product-amount">
                        <p>Showing {{ $products->firstItem() }} - {{ $products->lastItem() }} of
                            {{ $products->total() }} results</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 order-1 order-md-2">
                <div class="top-bar-right">
                    <div class="product-short" wire:ignore>
                        <p>Sort By : </p>
                        <select class="nice-select" wire:model="sortingBy">
                            <option value="default">Default sorting</option>
                            <option value="popularity">Popularity</option>
                            <option value="low-high">Price: Low to High</option>
                            <option value="high-low">Price: High to Low</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop product top wrap start -->

    <!-- product item list wrapper start -->
    <div class="shop-product-wrap grid-view row mbn-30" wire:ignore.self>
        @forelse($products as $product)
            <!-- product single item start -->
            <div class="col-md-4 col-sm-6">
                <!-- product grid start -->
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
                            @if ($product->discount_percent > 0)
                                <div class="product-label discount">
                                    <span>{{ $product->discount_percent }}%</span>
                                </div>
                            @endif
                        </div>
                        <div class="button-group">
                            <a href="#" wire:click.prevent="addToWishList('{{ $product->id }}')"
                                data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i
                                    class="pe-7s-like"></i></a>
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
                            <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                        </h6>
                        <div class="price-box">
                            <span class="price-regular">{{ currency_format($product->price) }}</span>
                            @if ($product->discount_amount > 0)
                                <span class="price-old"><del>{{ currency_format($product->oldPrice()) }}</del></span>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- product grid end -->

                <!-- product list item end -->
                <div class="product-list-item">
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
                            @if ($product->discount_percent > 0)
                                <div class="product-label discount">
                                    <span>{{ $product->discount_percent }}%</span>
                                </div>
                            @endif
                        </div>
                        <div class="button-group">
                            <a href="#" wire:click.prevent="addToWishList('{{ $product->id }}')"
                                data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i
                                    class="pe-7s-like"></i></a>
                        </div>
                        <div class="cart-hover">
                            @if (Cart::instance('default')->search(function ($cartItem, $rowId) use ($product) {
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
                    <div class="product-content-list">
                        <div class="manufacturer-name">
                            <a href="{{ route('product.show', $product->slug) }}">Platinum</a>
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

                        <h5 class="product-name">
                            <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                        </h5>
                        <div class="price-box">
                            <span class="price-regular">{{ currency_format($product->price) }}</span>
                            @if ($product->discount_amount > 0)
                                <span class="price-old"><del>{{ currency_format($product->oldPrice()) }}</del></span>
                            @endif
                        </div>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
                <!-- product list item end -->
            </div>
        @endforeach
    </div>
    <!-- product item list wrapper end -->
    @if ($products->has('links'))
        <!-- start pagination area -->
        <div class="paginatoin-area text-center">
            {!! $products->appends(request()->all())->onEachSide(1)->links() !!}
        </div>
    @endif
    <!-- end pagination area -->
</div>
<!-- shop main wrapper end -->

@section('script')
    <script>
        $(document).ready(function() {
            $('.nice-select').niceSelect();
            $('.nice-select').on('change', function(e) {
                @this.set('sortingBy', e.target.value);
            });
        });
    </script>
@endsection

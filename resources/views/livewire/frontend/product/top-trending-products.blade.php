<div id="all-products" wire:ignore>
    <section class="feature-product section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">featured products</h2>
                        <p class="sub-title">Add featured products to weekly lineup</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                        @forelse($products as $product)
                            <!-- product item start -->
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="{{ route('product.show', $product->slug) }}">
                                        <img class="pri-img"
                                            src="{{ $product->image }}"
                                            alt="{{ $product->name }}">
                                        <img class="sec-img"
                                            src="{{ $product->image }}"
                                            alt="{{ $product->name }}">
                                    </a>
                                    <div class="product-badge">
                                        <div class="product-label new">
                                            <span>new</span>
                                        </div>
                                        <div class="product-label discount">
                                            <span>20%</span>
                                        </div>
                                    </div>
                                    <div class="button-group">
                                        <a href="#" wire:click.prevent="addToWishList('{{ $product->id }}')"
                                            data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i
                                                class="pe-7s-like"></i></a>
                                    </div>
                                    <div class="cart-hover">
                                        <button class="btn btn-cart"
                                            wire:click.prevent="addToCart('{{ $product->id }}')">add to cart</button>
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
                                        <span class="price-old"><del>{{ $product->price + 0.20*$product->price }}</del></span>
                                    </div>
                                </div>
                            </div>
                            <!-- product item end -->
                        @empty
                            <p>No products found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

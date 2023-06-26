<section class="product-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">our products</h2>
                    <p class="sub-title">Add our products to weekly lineup</p>
                </div>
                <!-- section title start -->
            </div>
        </div>
        @php
            $ourProducst = [];
        @endphp
        <div class="row">
            <div class="col-12">
                <div class="product-container">
                    <!-- product tab menu start -->
                    <div class="product-tab-menu">
                        <ul class="nav justify-content-center">
                            @foreach ($sub_categories as $index => $category)
                                <li>
                                    <a href="#tab{{ $loop->index }}"
                                        {{ $loop->index == 0 ? "class='active'" : '' }} data-toggle="tab">
                                        {{ $category->name }} ({{ $category->products->count() }})
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- product tab menu end -->

                    <!-- product tab content start -->
                    <div class="tab-content">
                        @foreach ($sub_categories as $index => $cates)
                            <div class="tab-pane fade {{ $loop->index == 0 ? 'show active' : '' }}"
                                id="tab{{ $loop->index }}">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    @foreach ($cates->products as $product)
                                        <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="product-details.html">
                                                    <img class="pri-img"
                                                        src="{{ $product->image }}"
                                                        alt="product">
                                                    <img class="sec-img"
                                                        src="{{ $product->image }}"
                                                        alt="product">
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
                                                    <a href="wishlist.html" data-toggle="tooltip" data-placement="left"
                                                        title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                    <a href="compare.html" data-toggle="tooltip" data-placement="left"
                                                        title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                                </div>
                                                <div class="cart-hover">
                                                    <button class="btn btn-cart">add to cart</button>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <div class="product-identity">
                                                    <p class="manufacturer-name"><a href="product-details.html">Gold</a>
                                                    </p>
                                                </div>
                                                <ul class="color-categories">
                                                    <li>
                                                        <a class="c-lightblue" href="#"
                                                            title="LightSteelblue"></a>
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
                                                    <span class="price-old"><del>{{ $product->price + $product->price*0.20 }}</del></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- product tab content end -->
                </div>
            </div>
        </div>
    </div>
</section>

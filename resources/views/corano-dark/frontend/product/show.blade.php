@extends('corano-dark.layouts.app')
@section('title', $product->name)
@section('content')
    <div>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('shop.index') }}">shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">product details</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding pb-0">
            <div class="container">
                <div class="row">
                    <!-- product details wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="product-large-slider">
                                        @forelse ($product->media as $media)
                                            <div class="pro-large-img img-zoom">
                                                <img src="{{ asset('storage/images/products/' . $media?->file_name) }}"
                                                    alt="{{ $product->name }}" />
                                            </div>
                                        @empty
                                            <div class="pro-large-img img-zoom">
                                                <img src="{{ asset('storage/images/products/default.jpg') }}"
                                                    alt="{{ $product->name }}" />
                                            </div>
                                        @endforelse
                                    </div>
                                    <div class="pro-nav slick-row-10 slick-arrow-style">
                                        @forelse ($product->media as $media)
                                            <div class="pro-nav-thumb">
                                                <img src="{{ asset('storage/images/products/' . $media?->file_name) }}"
                                                    alt="{{ $product->name }}" />
                                            </div>
                                        @empty
                                            <div class="pro-nav-thumb">
                                                <img src="{{ asset('storage/images/products/default.jpg') }}"
                                                    alt="{{ $product->name }}" />
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="product-details-des">
                                        <h3 class="product-name">{{ $product->name }}</h3>
                                        <div class="ratings d-flex">
                                            @if ($product->approved_reviews_avg_rating)
                                                @for ($i = 0; $i < 5; $i++)
                                                    <span><i class="fa fa-star-o"></i></span>
                                                @endfor
                                            @else
                                                @for ($i = 0; $i < 5; $i++)
                                                    <span><i class="fa fa-star-o"></i></span>
                                                @endfor
                                            @endif



                                            <div class="pro-review">
                                                <span>{{ $product->approved_reviews_count }} Reviews</span>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="price-regular">{{ currency_format($product->price) }}</span>
                                            @if ($product->discount_amount > 0)
                                                <span
                                                    class="price-old"><del>{{ currency_format($product->oldPrice()) }}</del></span>
                                            @endif
                                        </div>
                                        <div class="availability">
                                            <i class="fa fa-check-circle"></i>
                                            <span> in stock</span>
                                        </div>
                                        <p class="pro-desc">{!! $product->description !!}</p>
                                        <livewire:frontend.product.single-product-cart-component :product="$product" />
                                        <div class="pro-size">
                                            <h6 class="option-title">size :</h6>
                                            <select class="nice-select">
                                                <option>S</option>
                                                <option>M</option>
                                                <option>L</option>
                                                <option>XL</option>
                                            </select>
                                        </div>
                                        <div class="color-option">
                                            <h6 class="option-title">color :</h6>
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
                                        </div>
                                        <div class="useful-links">
                                            <a href="#" data-toggle="tooltip" title="Wishlist"><i
                                                    class="pe-7s-like"></i>wishlist</a>
                                        </div>
                                        <div class="like-icon">
                                            @include('corano-dark.partials.frontend.shareBtn')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->

                        <!-- product details reviews start -->
                        <div class="product-details-reviews section-padding pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="active" data-toggle="tab" href="#tab_three">reviews (1)</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade show active" id="tab_three">
                                                <livewire:frontend.product.single-product-review-component :product="$product" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details reviews end -->
                    </div>
                    <!-- product details wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->

        <!-- related products area start -->
        <section class="related-products section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Related Products</h2>
                            <p class="sub-title">Add related products to weekly lineup</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                            @foreach ($relatedProducts as $product)
                            <livewire:frontend.product.product-item :product="$product" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- related products area end -->
    </div>
@endsection

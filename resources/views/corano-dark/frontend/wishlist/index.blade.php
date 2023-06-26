@extends('corano-dark.layouts.app')
@section('title', 'wishlist')
@section('content')

    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('shop.index') }}">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">wishlist</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- wishlist main wrapper start -->
    <div class="wishlist-main-wrapper section-padding">
        <div class="container">
            <!-- Wishlist Page Content Start -->
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Wishlist Table Area -->
                        <div class="cart-table table-responsive">
                            <livewire:frontend.wishlist.wishlist-item-component />
                            <livewire:frontend.message.wishlist-not-found-component />
                        </div>
                    </div>
                </div>
            </div>
            <!-- Wishlist Page Content End -->
        </div>
    </div>
    <!-- wishlist main wrapper end -->
@endsection

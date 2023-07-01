@extends('corano-dark.layouts.app')
@section('title', 'Shop '.$slug)
@section('content')
<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">shop</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->
<div class="shop-main-wrapper section-padding">
    <div class="container">
        <div class="row">
            <!-- sidebar area start -->
            <div class="col-lg-3 order-2 order-lg-1">
                    @include('corano-dark.partials.frontend.shop.sidebar')
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <livewire:frontend.product.shop-products-tag-component  :slug="$slug"/>
                </div>
            </div>
        </div>
    </div>
@endsection


@extends('corano-dark.layouts.app')
@section('title', 'User Address')
@section('content')
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">addresses</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->
    <section class="container pt-4 pb-5 bg-white rounded">
        <div class="row">
            <div class="col-md-12 col-lg-8 text-dark">
                <livewire:frontend.user.addresses-component />
            </div>
            <div class="col-md-12 col-lg-4 text-dark">
                @include('corano-dark.partials.frontend.user.sidebar')
            </div>
        </div>
    </section>
@endsection

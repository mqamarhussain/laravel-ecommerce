@extends('corano-dark.layouts.app')
@section('title', $static_page->title)
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
                                <li class="breadcrumb-item active" aria-current="page">{{ $static_page->title }}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <div class="container shadow-sm card mt-5 mb-5 bg-dark" style="border: none;">
        <div class="m-3">
            <div>
                <h1 class="text-center font-weight-bold">{{ $static_page->title }}</h1>
                {!! $static_page->content !!}
            </div>
            <div class="mt-5">Last update: {{ $static_page->updated_at }}</div>
        </div>
    </div>
@endsection

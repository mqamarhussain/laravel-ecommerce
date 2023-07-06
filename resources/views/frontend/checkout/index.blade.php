@extends('layouts.app')
@section('title', 'Checkout')
@section('content')
    <div class="checkout-area pt-5 pb-5">
        <div class="container">
            @foreach (['danger', 'success'] as $status)
                @if (Session::has($status))
                    <p class="alert alert-{{ $status }}">{{ Session::get($status) }}</p>
                @endif
            @endforeach
            <div id="success" style="display: none"
                 class="col-md-8 text-center h3 p-4 bg-success text-light rounded">
                The purchase was completed successfully
            </div>
            <div class="card-body">
                <livewire:frontend.checkout.checkout-component />
            </div>
        </div>
    </div>
@endsection



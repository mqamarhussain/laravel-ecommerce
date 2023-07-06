@extends('corano-dark.layouts.app')
@section('title', 'Pay with Stripe')
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
                                    <li class="breadcrumb-item"><a href="{{ route('checkout.index') }}">Checkout</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pay with stripe</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->
        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding pb-0 mb-4">
            <div class="container">
                <div class="row">
                    <aside class="col-sm-6 offset-3">
                        <article class="card">
                            <div class="card-body p-5">
                                <ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
                                            <i class="fa fa-credit-card"></i> Credit Card</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="nav-tab-card">
                                        @foreach (['danger', 'success'] as $status)
                                            @if (Session::has($status))
                                                <p class="alert alert-{{ $status }}">{{ Session::get($status) }}</p>
                                            @endif
                                        @endforeach
                                        <form role="form" method="POST" id="paymentForm" action="{{ route('stripe.payment.store') }}">
                                            @csrf
                                            <input type="hidden" name="userAddressId"
                                                value="{{ old('userAddressId', $userAddressId) }}" class="form-control">
                                            <input type="hidden" name="shippingCompanyId"
                                                value="{{ old('shippingCompanyId', $shippingCompanyId) }}"
                                                class="form-control">
                                            <input type="hidden" name="paymentMethodId"
                                                value="{{ old('paymentMethodId', $paymentMethodId) }}" class="form-control">

                                            <div class="form-group">
                                                <label for="username">Full name (on the card)</label>
                                                <input type="text" class="form-control" name="fullName"
                                                    placeholder="Full Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="cardNumber">Card number</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="cardNumber"
                                                        placeholder="Card Number">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text text-muted">
                                                            <i class="fab fa-cc-visa fa-lg pr-1"></i>
                                                            <i class="fab fa-cc-amex fa-lg pr-1"></i>
                                                            <i class="fab fa-cc-mastercard fa-lg"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <label><span class="hidden-xs">Expiration</span> </label>
                                                        <div class="input-group">
                                                            <select class="form-control" name="month">
                                                                <option value="">MM</option>
                                                                @foreach (range(1, 12) as $month)
                                                                    <option value="{{ $month }}">{{ $month }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <select class="form-control" name="year">
                                                                <option value="">YYYY</option>
                                                                @foreach (range(date('Y'), date('Y') + 10) as $year)
                                                                    <option value="{{ $year }}">{{ $year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label data-toggle="tooltip" title=""
                                                            data-original-title="3 digits code on back side of the card">CVV
                                                            <i class="fa fa-question-circle"></i></label>
                                                        <input type="number" class="form-control" placeholder="CVV"
                                                            name="cvv">
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="subscribe btn btn-primary bg-primary p-2 btn-block" type="submit"> Pay {{currency_format($totalAmount)}}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('corano-dark.layouts.app')
@section('title', 'Contact us')
@section('content')
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">contact us</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- google map start -->
        <div class="map-area section-padding">
            <div id="google-map"></div>
        </div>
        <!-- google map end -->

        <!-- contact area start -->
        <div class="contact-area section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-message">
                            <h4 class="contact-title">Tell Us Your Project</h4>
                            <form action="{{ route('contact.store') }}" method="post" class="contact-form">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Name *" required>
                                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email *" required>
                                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input type="text" name="title" value="{{ old('title') }}" placeholder="Title *" required>
                                        @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="contact2-textarea text-center">
                                            <textarea name="message" placeholder="Your message *" required>{{ old('message') }}</textarea>
                                        @error('message')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="contact-btn">
                                            <button class="btn btn-sqr" type="submit">Send Message</button>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center">
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-info">
                            <h4 class="contact-title">Contact Us</h4>
                            <p>We will be glade to here about you!</p>
                            <ul>
                                <li><i class="fa fa-fax"></i> Address : {!! getSettingsOf('address') !!}</li>
                                <li><i class="fa fa-phone"></i> E-mail: {!! getSettingsOf('site_email') !!}</li>
                                <li><i class="fa fa-envelope-o"></i> {!! getSettingsOf('phone_number') !!}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact area end -->
@endsection

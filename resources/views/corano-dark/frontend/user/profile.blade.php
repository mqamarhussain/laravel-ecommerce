@extends('corano-dark.layouts.app')
@section('title', 'User Profile')
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
                            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
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
                <form action="{{ route('user.update_profile') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-lg-12 text-center mb-4">
                            @if(auth()->user()->user_image)
                                <img src="{{ asset('storage/images/users/' . auth()->user()->user_image) }}"
                                     class="img-thumbnail" width="120"
                                     alt="{{ auth()->user()->full_name }}">
                                <div class="mt-2">
                                    <a href="{{ route('user.remove_image') }}" class="btn btn-sm btn-outline-danger">Remove image</a>
                                </div>
                            @else
                                <img src="{{ asset('img/avatar.png') }}"
                                     class="img-thumbnail" width="120"
                                     alt="{{ auth()->user()->full_name }}">
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label for="first_name" class="text-small text-uppercase">First Name</label>
                            <input type="text" class="form-control form-control-lg"
                                   name="first_name" id="first_name"
                                   value="{{ old('first_name', auth()->user()->first_name) }}">
                            @error('first_name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="col-lg-6 form-group">
                            <label for="last_name" class="text-small text-uppercase">Last Name</label>
                            <input type="text" class="form-control form-control-lg"
                                   name="last_name" id="last_name"
                                   value="{{ old('last_name', auth()->user()->last_name) }}">
                            @error('last_name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label for="email" class="text-small text-uppercase">Email</label>
                            <input type="email" class="form-control form-control-lg"
                                   name="email" id="email"
                                   value="{{ old('email', auth()->user()->email) }}">
                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="col-lg-6 form-group">
                            <label for="phone" class="text-small text-uppercase">Phone Number</label>
                            <input type="text" class="form-control form-control-lg"
                                   name="phone" id="phone"
                                   placeholder="ex. 9665xxxxxxxx"
                                   value="{{ old('phone', auth()->user()->phone) }}">
                            @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label for="password" class="text-small text-uppercase">
                                Password
                                <small class="ml-auto text-secondary">(optional)</small>
                            </label>
                            <input type="password" class="form-control form-control-lg"
                                   name="password" id="email"
                                   value="{{ old('password') }}">
                            @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="password_confirmation" class="text-small text-uppercase">Re-Password</label>
                            <input type="password" class="form-control form-control-lg"
                                   name="password_confirmation" id="password_confirmation"
                                   value="{{ old('password_confirmation') }}">
                            @error('password-confirm')<span class="text-danger"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label for="receive-email">Receive Email</label>
                            <select name="receive_email" id="receive-email" class="form-control">
                                <option value="">---</option>
                                <option value="1" {{ old('receive_email', auth()->user()->receive_email) == 1 ? 'selected' : null }}>Yes</option>
                                <option value="0" {{ old('receive_email', auth()->user()->receive_email) == 0 ? 'selected' : null }}>No</option>
                            </select>
                            @error('receive_email')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <label for="user_image" class="text-small text-uppercase">Image</label>
                            <input type="file" id="user_image" name="user_image"><br>
                            @error('user_image')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button class="btn p-2 bg-dark btn-dark" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 col-lg-4 text-dark">
                @include('corano-dark.partials.frontend.user.sidebar')
            </div>
        </div>
    </section>
@endsection

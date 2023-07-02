@extends('corano-dark.layouts.app')
@section('title', 'Login')
@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Login</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- login-area start -->
    <div id="login-form" class="register-area ptb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-12 col-lg-6 col-xl-6 ml-auto mr-auto">
                    <div class="contact-message m-5 p-5">
                        <h4 class="contact-title mb-2 text-center">Login to your account</h4>
                        <form action="{{ route('login') }}" method="POST" class="contact-form">
                            @csrf
                                <div class="">
                                    <input type="text" name="username" value="{{ old('username') }}" placeholder="Username" required>
                                    @error('username')<span class="text-danger">{{ $message }}</span>@enderror                                </div>
                                <div class="">
                                    <input id="pass" type="password" name="password" placeholder="password" required>
                                        @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div>
                                    <div class="contact-btn text-center">
                                        <button class="btn btn-sqr" type="submit">Login</button>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                    <p class="form-messege text-danger"></p>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login-area end -->
@endsection

@section('script')
    <script>

        $('.show').click(function (){
            $(this).text('')
            $(':password').attr('type', 'text')
            $('.hide').text('Hide password')
        });

        $('.hide').click(function (){
            $(this).text('');
            $('#pass').attr('type', 'password')
            $('.show').text('Show password')
        });

    </script>

    {{--    <script>--}}
    {{--        let vm = new Vue({--}}
    {{--            el: "#login-form",--}}
    {{--            data: {--}}
    {{--                fieldType: "password",--}}
    {{--            },--}}
    {{--            methods: {--}}
    {{--                switchField() {--}}
    {{--                    this.fieldType = this.fieldType === "password" ? "text" : "password";--}}
    {{--                }--}}
    {{--            },--}}
    {{--        });--}}
    {{--    </script>--}}
@endsection

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} | @yield('title', 'E Shop')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS
 ============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/corano-dark/assets/css/vendor/bootstrap.min.css') }}">
    <!-- Pe-icon-7-stroke CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/corano-dark/assets/css/vendor/pe-icon-7-stroke.css') }}">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/corano-dark/assets/css/vendor/font-awesome.min.css') }}">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="{{ asset('frontend/corano-dark/assets/css/plugins/slick.min.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('frontend/corano-dark/assets/css/plugins/animate.css') }}">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="{{ asset('frontend/corano-dark/assets/css/plugins/nice-select.css') }}">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="{{ asset('frontend/corano-dark/assets/css/plugins/jqueryui.min.css') }}">
    <!-- main style css -->
    <link rel="stylesheet" href="{{ asset('frontend/corano-dark/assets/css/style.css') }}">
    <livewire:styles />
    @yield('style')
    <style>
        .s-sticky {
            position: relative;
            z-index: 99998;
        }
        .minicart-inner{
            z-index: 99999;
        }
        .empty-cart{
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body class="dark">
    @include('corano-dark.partials.frontend.header')
    @include('corano-dark.partials.frontend.flash')
    <main>
        @yield('content')
    </main>
    @include('corano-dark.partials.frontend.footer')
    <livewire:scripts />
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <x-livewire-alert::flash />
    <x-livewire-alert::scripts />
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Modernizer JS -->
    <script src="{{ asset('frontend/corano-dark/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('frontend/corano-dark/assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('frontend/corano-dark/assets/js/vendor/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend/corano-dark/assets/js/vendor/bootstrap.min.js') }}"></script>
    <!-- slick Slider JS -->
    <script src="{{ asset('frontend/corano-dark/assets/js/plugins/slick.min.js') }}"></script>
    <!-- Countdown JS -->
    <script src="{{ asset('frontend/corano-dark/assets/js/plugins/countdown.min.js') }}"></script>
    <!-- Nice Select JS -->
    <script src="{{ asset('frontend/corano-dark/assets/js/plugins/nice-select.min.js') }}"></script>
    <!-- jquery UI JS -->
    <script src="{{ asset('frontend/corano-dark/assets/js/plugins/jqueryui.min.js') }}"></script>
    <!-- Image zoom JS -->
    <script src="{{ asset('frontend/corano-dark/assets/js/plugins/image-zoom.min.js') }}"></script>
    <!-- Imagesloaded JS -->
    <script src="{{ asset('frontend/corano-dark/assets/js/plugins/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Instagram feed JS -->
    <script src="{{ asset('frontend/corano-dark/assets/js/plugins/instagramfeed.min.js') }}"></script>
    <!-- mailchimp active js -->
    <script src="{{ asset('frontend/corano-dark/assets/js/plugins/ajaxchimp.js') }}"></script>
    <!-- contact form dynamic js -->
    <script src="{{ asset('frontend/corano-dark/assets/js/plugins/ajax-mail.js') }}"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
    <script src="{{ asset('frontend/corano-dark/assets/js/plugins/google-map.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('frontend/corano-dark/assets/js/main.js') }}"></script>


    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/alert-message.js') }}"></script>
    <script src="{{ url('https://kit.fontawesome.com/8003f9e0e2.js') }}" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            let bloodhound = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: '{{ url('search') }}?productName=%QUERY%', //'/user/find?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
            });

            $('#search').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                name: 'products',
                source: bloodhound,
                limit: 10,
                display: function(data) {
                    return data.name //Input value to be set when you select a suggestion.
                },
                templates: {
                    empty: [
                        '<div class="list-group-item">There are no matching search results</div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function(data) {
                        return '<div style="font-weight:normal; width:100%" class="list-group-item"><a href="{{ url('product') }}/' +
                            data.slug + '">' + data.name + '</a></div></div>'
                    }
                }
            });
        });
    </script>
    @yield('script')
</body>

</html>

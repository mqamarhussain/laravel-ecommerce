    <!-- Start Header Area -->
    <header class="header-area header-wide">
        <!-- main header start -->
        <div class="main-header d-none d-lg-block">
            <!-- header middle area start -->
            <div class="header-main-area sticky s-sticky">
                <div class="container">
                    <div class="row align-items-center position-relative">

                        <!-- start logo area -->
                        <div class="col-lg-2">
                            <div class="logo">
                                <a href="{{route('home')}}">
                                    <img src="{{ asset('frontend/corano-dark/assets/img/logo/logo-light.png') }}"
                                        alt="Brand Logo">
                                </a>
                            </div>
                        </div>
                        <!-- start logo area -->

                        <!-- main menu area start -->
                        <div class="col-lg-6 position-static">
                            <div class="main-menu-area">
                                <div class="main-menu">
                                    <!-- main menu navbar start -->
                                    <nav class="desktop-menu">
                                        <ul>
                                            <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a
                                                    href="{{ route('home') }}">{{ __('Home') }}</a></li>
                                            <li class="{{ request()->routeIs('shop.index') ? 'active' : '' }}"><a
                                                    href="{{ route('shop.index') }}">{{ __('Products') }}</a></li>
                                            <li class="position-static">
                                                <a href="{{route('shop.index')}}">{{ __('shop') }} <i
                                                        class="fa fa-angle-down"></i></a>
                                                <ul class="megamenu dropdown">
                                                    @foreach ($shop_categories_menu as $global_category)
                                                        <li class="mega-title"><span>{{ $global_category->name }}</span>
                                                            <ul>
                                                                @foreach ($global_category->children as $children)
                                                                    <li>
                                                                        <a
                                                                            href="{{ route('shop.index', $children->slug) }}">
                                                                            {{ $children->name }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>

                                            <li class=""><a href="#">Posts <i
                                                        class="fa fa-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    @foreach ($posts_menu as $post)
                                                        <li><a
                                                                href="{{ route('post.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>

                                            <li class=""><a href="#">Pages <i
                                                        class="fa fa-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    @foreach ($pages_menu as $page)
                                                        <li><a
                                                                href="{{ route('page.show', ['slug' => $page->slug]) }}">{{ $page->title }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>


                                            <li><a href="{{ route('contact.index') }}">Contact us</a></li>
                                        </ul>
                                    </nav>
                                    <!-- main menu navbar end -->
                                </div>
                            </div>
                        </div>
                        <!-- main menu area end -->

                        <!-- mini cart area start -->
                        <div class="col-lg-4">
                            <div
                                class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                                <div class="header-search-container">
                                    <button class="search-trigger d-xl-none d-lg-block"><i
                                            class="pe-7s-search"></i></button>
                                    <form class="header-search-box d-lg-none d-xl-block animated jackInTheBox">

                                        <input id="search" type="text" class="header-search-field"
                                            value="{{ old('keyword', request()->keyword) }}"
                                            placeholder="Search for product...">

                                        <button class="header-search-btn"><i class="pe-7s-search"></i></button>
                                    </form>
                                </div>
                                <div class="header-configure-area">
                                    <ul class="nav justify-content-end">
                                        @guest
                                            <li class="user-hover">
                                                <a href="#">
                                                    <i class="pe-7s-user"></i>
                                                </a>
                                                <ul class="dropdown-list">
                                                    <li><a href="{{ route('login') }}">login</a></li>
                                                    <li><a href="{{ route('register') }}">register</a></li>
                                                </ul>
                                            </li>
                                        @else
                                            <li class="user-hover">
                                                <a href="#">
                                                    <i class="pe-7s-user"></i>
                                                </a>
                                                <ul class="dropdown-list">
                                                    <li>
                                                        <a href="javascript:void(0);">My Account</a>
                                                        <ul class="single-dropdown">
                                                            @auth
                                                                @role('admin')
                                                                    <li>
                                                                        <a href="{{ route('admin.index') }}">
                                                                            Administration
                                                                        </a>
                                                                    </li>
                                                                @endrole

                                                                <li><a href="{{ route('user.dashboard') }}">Dashboard</a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{ route('logout') }}"
                                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                                        {{ __('Logout') }}
                                                                    </a>
                                                                    <form id="logout-form" action="{{ route('logout') }}"
                                                                        method="POST" style="display: none;">
                                                                        @csrf
                                                                    </form>
                                                                </li>
                                                            @endauth
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>

                                        @endguest
                                        <li>
                                            <livewire:frontend.header.wishlist-component />
                                        </li>
                                        <li>
                                            <livewire:frontend.header.cart-component />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- mini cart area end -->

                    </div>
                </div>
            </div>
            <!-- header middle area end -->
        </div>
        <!-- main header start -->

        <!-- mobile header start -->
        <div class="mobile-header d-lg-none d-md-block sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="mobile-main-header">
                            <div class="mobile-logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('frontend/corano-dark/assets/img/logo/logo-light.png') }}"
                                        alt="Brand Logo">
                                </a>
                            </div>
                            <div class="mobile-menu-toggler">
                                <div class="mini-cart-wrap">
                                    <livewire:frontend.header.cart-component />
                                </div>
                                <button class="mobile-menu-btn">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile header end -->

        <!-- offcanvas mobile menu start -->
        <!-- off-canvas menu start -->
        <aside class="off-canvas-wrapper">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-inner-content">
                <div class="btn-close-off-canvas">
                    <i class="pe-7s-close"></i>
                </div>

                <div class="off-canvas-inner">
                    <!-- search box start -->
                    <div class="search-box-offcanvas">
                        <form>
                            <input type="text" placeholder="Search Here...">
                            <button class="search-btn"><i class="pe-7s-search"></i></button>
                        </form>
                    </div>
                    <!-- search box end -->

                    <!-- mobile menu start -->
                    <div class="mobile-navigation">

                        <!-- mobile menu navigation start -->
                        <nav>
                            <ul class="mobile-menu">

                                <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a
                                        href="{{ route('home') }}">{{ __('Home') }}</a></li>
                                <li class="{{ request()->routeIs('shop.index') ? 'active' : '' }}"><a
                                        href="{{ route('shop.index') }}">{{ __('Products') }}</a></li>

                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);">{{ __('Shop now') }}</a>
                                    <ul class="megamenu dropdown">
                                        @foreach ($shop_categories_menu as $global_category)
                                            <li class="mega-title menu-item-has-children">
                                                <a
                                                    href="{{ route('shop.index', $global_category->slug) }}">{{ $global_category->name }}</a>
                                                <ul class="dropdown">
                                                    @foreach ($global_category->children as $children)
                                                        <li>
                                                            <a href="{{ route('shop.index', $children->slug) }}">
                                                                {{ $children->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);">Posts</a>
                                    <ul class="dropdown">
                                        @foreach ($posts_menu as $post)
                                            <li>
                                                <a
                                                    href="{{ route('post.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>

                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);">Pages</a>
                                    <ul class="dropdown">
                                        @foreach ($pages_menu as $page)
                                            <li>
                                                <a href="{{ route('page.show', ['slug' => $page->slug]) }}">{{ $page->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="">Contact us</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->

                    <div class="mobile-settings">
                        <ul class="nav">
                            @auth
                                @role('admin')
                                    <li><a href="{{ route('user.dashboard') }}">Adminstration</a></li>
                                    @elserole
                                    <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                @endrole
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endauth
                            @guest
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endguest
                        </ul>
                    </div>

                    <!-- offcanvas widget area start -->
                    <div class="offcanvas-widget-area">
                        <div class="off-canvas-contact-widget">
                            <ul>
                                <li><i class="fa fa-mobile"></i>
                                    <a href="tel:{!! getSettingsOf('phone_number') !!}">{!! getSettingsOf('phone_number') !!}</a>
                                </li>
                                <li><i class="fa fa-envelope-o"></i>
                                    <a href="mailto:{!! getSettingsOf('site_email') !!}">{!! getSettingsOf('site_email') !!}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="off-canvas-social-widget">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                    <!-- offcanvas widget area end -->
                </div>
            </div>
        </aside>
        <!-- off-canvas menu end -->
        <!-- offcanvas mobile menu end -->
    </header>
    <!-- end Header Area -->

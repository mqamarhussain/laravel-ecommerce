    <!-- footer area start -->
    <footer class="footer-widget-area">
        <div class="footer-top section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                            <div class="widget-title">
                                <div class="widget-logo">
                                    <a href="index.html">
                                        <img src="{{ site_logo() }}"
                                            alt="brand logo">
                                    </a>
                                </div>
                            </div>
                            <div class="widget-body">
                                <p>We are a team of designers and developers that create high quality wordpress,
                                    shopify, Opencart </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                            <h6 class="widget-title">Contact Us</h6>
                            <div class="widget-body">
                                <address class="contact-block">
                                    <ul>
                                        <li><i class="pe-7s-home"></i> {!! getSettingsOf('address') !!}</li>
                                        <li><i class="pe-7s-mail"></i> <a
                                                href="mailto:{!! getSettingsOf('site_email') !!}">{!! getSettingsOf('site_email') !!}</a></li>
                                        <li><i class="pe-7s-call"></i> <a
                                                href="tel:{!! getSettingsOf('phone_number') !!}">{!! getSettingsOf('phone_number') !!}</a></li>
                                    </ul>
                                </address>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                            <h6 class="widget-title">Information</h6>
                            <div class="widget-body">
                                <ul class="info-list">
                                    <li><a href="{{ route('page.show', 'about') }}">about us</a></li>
                                    <li><a href="#">Delivery Information</a></li>
                                    <li><a href="{{ route('page.show', 'privacy-policy') }}">privet policy</a></li>
                                    <li><a href="{{ route('page.show', 'terms-and-conditions') }}">Terms & Conditions</a></li>
                                    <li><a href="{{route('contact.index')}}">contact us</a></li>
                                    <li><a href="#">site map</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                            <h6 class="widget-title">Follow Us</h6>
                            <div class="widget-body social-link">
                                <a href="{!! getSettingsOf('fb_link') !!}"><i class="fa fa-facebook"></i></a>
                                <a href="{!! getSettingsOf('twitter_id') !!}"><i class="fa fa-twitter"></i></a>
                                <a href="{!! getSettingsOf('instagram_link') !!}"><i class="fa fa-instagram"></i></a>
                                <a href="{!! getSettingsOf('youtube_link') !!}"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mt-20">
                    <div class="col-md-6">
                        <div class="newsletter-wrapper">
                            <h6 class="widget-title-text">Signup for newsletter</h6>
                            <form class="newsletter-inner" id="mc-form">
                                <input type="email" class="news-field" id="mc-email" autocomplete="off"
                                    placeholder="Enter your email address">
                                <button class="news-btn" id="mc-submit">Subscribe</button>
                            </form>
                            <!-- mail-chimp-alerts Start -->
                            <div class="mailchimp-alerts">
                                <div class="mailchimp-submitting"></div><!-- mail-chimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mail-chimp-success end -->
                                <div class="mailchimp-error"></div><!-- mail-chimp-error end -->
                            </div>
                            <!-- mail-chimp-alerts end -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-payment">
                            <img src="{{ asset('frontend/corano-dark/assets/img/payment.png') }}" alt="payment method">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright-text text-center">
                            <p>&copy; {{date('Y')}} <b class="text-white">{{ getSettingsOf('site_title') }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

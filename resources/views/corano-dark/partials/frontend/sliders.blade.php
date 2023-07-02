<section class="slider-area">
    <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
        @foreach ($sliders as $slider)
        <!-- single slider item start -->
        <div class="hero-single-slide hero-overlay">
            <div class="hero-slider-item bg-img"
                data-bg="{{ $slider->image_name }} ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero-slider-content slide-1">
                                <h2 class="slide-title">{!! $slider->title !!}</h2>
                                <h4 class="slide-desc">{{ $slider->text }}</h4>
                                <a href="{{url($slider->link)}}" class="btn btn-hero">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single slider item start -->
        @endforeach
    </div>
</section>

<aside class="sidebar-wrapper">
    <!-- single sidebar start -->
    <div class="sidebar-single">
        <h5 class="sidebar-title">categories</h5>
        <div class="sidebar-body">
            <ul class="shop-categories">
                @forelse($shop_categories_menu as $category)
                    <div class="py-2 px-4 bg-dark text-white mb-3">
                        <strong class="small text-uppercase font-weight-bold">
                            <a class="text-decoration-none text-white" href="{{ route('shop.index', $category->slug) }}">
                                {{ $category->name }}
                            </a>
                        </strong>
                    </div>
                    <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                        @forelse($category->appearedChildren as $sub_category)
                            <li class="mb-2">
                                <a class="reset-anchor" href="{{ route('shop.index', $sub_category->slug) }}">
                                    {{ $sub_category->name }}
                                </a>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                @empty
                @endforelse
            </ul>
        </div>
    </div>
    <!-- single sidebar end -->

    <!-- single sidebar start -->
    <div class="sidebar-single">
        <h5 class="sidebar-title">tags</h5>
        <div class="sidebar-body">
            <ul>
                @foreach($shop_tags_menu as $tag)
                    <span style="background: #ebebeb none repeat scroll 0 0; color: #333;
                    display: inline-block; font-size: 12px; line-height: 20px; margin:
                    5px 5px 0 0; padding: 5px 15px; text-transform: capitalize;">
                        <a href="{{ route('shop.tag', $tag->slug) }}">
                            {{ $tag->name }}
                            ({{ $tag->products_count }})
                        </a>
                    </span>
                @endforeach
        </div>
    </div>
    <!-- single sidebar end -->

    <!-- single sidebar start -->
    <div class="sidebar-single">
        <h5 class="sidebar-title">RECENT REVIEWS</h5>
        <div class="sidebar-body">
            <ul>
                @foreach($recent_reviews as $recent_review)
                    <li>
                        <div class="post-wrapper d-flex">
                            <div class="mb-2">
                                <img src="{{ get_gravatar($recent_review->email, 50) }}" alt="{{ $recent_review->name }}">
                            </div>
                            <div class="ml-3 p-0">
                                @if(isset($recent_review->product->slug))
                                    <p>
                                        <span class="">{{ $recent_review->user->full_name }}</span>
                                        <small> review on :
                                            {{ $recent_review->product->name }}
                                        </small>
                                    </p>
                                    <p>{!! \Illuminate\Support\Str::limit($recent_review->review, 30, '...') !!}</p>
                                @else

                                    <h6><span class="text-success">{{ $recent_review->name }}</span>
                                        <small> review : </small>
                                    </h6>
                                    <p>{!! \Illuminate\Support\Str::limit($recent_review->review, 30, '...') !!}</p>

                                @endif
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- single sidebar end -->

    <!-- single sidebar start -->
    <div class="sidebar-banner">
        <div class="img-container">
            <a href="#">
                <img src="{{asset('frontend/corano-dark/assets/img/banner/sidebar-banner.jpg')}}" alt="">
            </a>
        </div>
    </div>
    <!-- single sidebar end -->
</aside>

<section class="product-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">our products</h2>
                    <p class="sub-title">Add our products to weekly lineup</p>
                </div>
                <!-- section title start -->
            </div>
        </div>
        @php
            $ourProducst = [];
        @endphp
        <div class="row">
            <div class="col-12">
                <div class="product-container">
                    <!-- product tab menu start -->
                    <div class="product-tab-menu">
                        <ul class="nav justify-content-center">
                            @foreach ($sub_categories as $index => $category)
                                <li>
                                    <a href="#tab{{ $loop->index }}"
                                        {{ $loop->index == 0 ? "class='active'" : '' }} data-toggle="tab">
                                        {{ $category->name }} ({{ $category->products->count() }})
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- product tab menu end -->

                    <!-- product tab content start -->
                    <div class="tab-content">
                        @foreach ($sub_categories as $index => $cates)
                            <div class="tab-pane fade {{ $loop->index == 0 ? 'show active' : '' }}"
                                id="tab{{ $loop->index }}">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    @foreach ($cates->products as $product)
                                        <!-- product item start -->
                                        <livewire:frontend.product.product-item :product="$product" />
                                        <!-- product item end -->
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- product tab content end -->
                </div>
            </div>
        </div>
    </div>
</section>

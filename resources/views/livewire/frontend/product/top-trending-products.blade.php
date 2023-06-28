<div id="all-products" wire:ignore>
    <section class="feature-product section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">featured products</h2>
                        <p class="sub-title">Add featured products to weekly lineup</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                        @forelse($products as $product)
                            <!-- product item start -->
                            <livewire:frontend.product.product-item :product="$product" />
                            <!-- product item end -->
                        @empty
                            <p>No products found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

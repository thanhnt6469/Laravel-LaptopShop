<!-- Products Deals -->
<section class="deals-section">
    <div class="container">
        <div class="section-title wow animate__animated animate__fadeIn">
            <h3 class="">TOP DEALS</h3>
        </div>
        <div class="row">
            <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                <div class="banner-pro">
                    <img class="img-fluid" src="/template/assets/img/shop/product.png" alt="">
                    <div class="banner-text">
                        <h4>Laptop Entertainment</h4>
                        <a href="view-product.html" class="view-more">View More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                <div class="deals-slider arrow-center position-relative">
                    <div class="slider-arrow slider-arrow-two carousel-3-columns-arrow" id="carousel-3-columns-arrows"></div>
                    <div class="carousel-3-columns carousel-arrow-center" id="carousel-3-columns">
                        
                        @foreach ($product_deals as $key => $product_deal)
                        <!-- Product box -->
                        <div class="product-card wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-col">
                                <div class="product-img product-img-zoom">
                                    <a href="view-product.html">
                                        <img class="default-img" src="{{ $product_deal->thumb }}" alt="{{ $product_deal->name }}">
                                        <img class="hover-img" src="{{ $product_deal->thumb }}" alt="{{ $product_deal->name }}">
                                    </a>
                                </div>
                                <div class="product-inner-details">
                                    <a aria-label="Quick view" class="product-btn" data-bs-toggle="modal" 
                                    href="#quickViewModal{{ $product_deal->id }}">
                                        <i class="fi-rs-eye"></i>
                                    </a>
                                        <a href="cart.html" aria-label="Cart" class="product-btn"><i class="fi-rs-shopping-cart"></i></a>
                                </div>
                                <div class="product-badge">
                                    <span class="best">SALE</span>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2><a href="/san-pham/{{ $product_deal->id }}-{{ \Str::slug($product_deal->name) }}.html">{{ $product_deal->name }}</a></h2>
                                <div class="product-card-bottom mt-0">
                                    <div class="product-price">
                                        @php
                                            $discountPercentage = round((1 - ($product_deal->price_sale / $product_deal->price)) * 100);
                                        @endphp
                                        <span>${{ $product_deal->price_sale }}.00</span>
                                        <span class="old-price">${{ $product_deal->price }}.00</span>
                                        <span class="discount-tag">-{{ $discountPercentage }}%</span>
                                        
                                    </div>
                                </div>
                                <div class="product-card-bottom">
                                        <div class="rating d-inline-block">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                        <span class="ml-5"> (3.5)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Product box -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Products Deals -->
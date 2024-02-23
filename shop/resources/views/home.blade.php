@extends('main')

@section('content')
    <!-- Main -->
    <main class="main">
        <!--Start hero slider -->
        <section class="banner-section position-relative">
            <div class="container">
                <div class="banner-slider">
                    <div class="banner-slider-one pagination-square align-pagination-square">
                        @foreach ($sliders as $slider)
                        <div class="banner-slider-single banner-animation-col">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-lg-6">
                                    <div class="banner-content">
                                        <h1 class="banner-title mb-40">
                                            {{ $slider->name}}
                                            <span>{{ $slider->name2 }}</span>
                                        </h1>
                                        <p>{!! $slider->description !!}</p>
                                        <a href="{{ $slider->url }}" class="shop-now">Shop Now</a>
                                        <span class="border-line"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="single-banner-slider" style="background-image: url({{ $slider->thumb }})"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!--End hero slider-->

        <!-- Feature -->
        <section class="featured section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 d-flex">
                        <div class="banner-box d-flex flex-fill align-items-center wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <div class="banner-icon">
                                <i class="feather-headphones"></i>
                            </div>
                            <div class="banner-text">
                                <h3>Customer care support</h3>
                                <p>Get Help When You Need</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 d-flex">
                        <div class="banner-box d-flex align-items-center flex-fill wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <div class="banner-icon">
                                <i class="feather-shield"></i>
                            </div>
                            <div class="banner-text">
                                <h3>Secure Payment</h3>
                                <p>Safe & Fast</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 d-flex">
                        <div class="banner-box d-flex align-items-center flex-fill wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                            <div class="banner-icon">
                                <i class="feather-truck"></i>
                            </div>
                            <div class="banner-text">
                                <h3>Free Shipping</h3>
                                <p>On all orders</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Feature -->

        <!-- Top Products -->
        <section class="product-tab-section product-section">
            <div class="container">
                <div class="section-title wow animate__animated animate__fadeIn">
                    <h3>PRODUCT OVERVIEW</h3>
                </div>
                <div class="wow animate__animated animate__fadeIn mb-40">
                    <div class="row justify-content-between">
                        <div class="col-12 col-lg-10 col-md-10">
                            <ul class="nav nav-tabs links" id="product-tab-nav" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-selected="true">All Products</button>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!--End nav-tabs-->

                <div id="loadProduct">
                    @include('products.list')
                </div>
    
                <!-- Load more -->
                <div class="flex-c-m flex-w w-full p-t-45 pb-5" id="button-loadMore">
                    <input type="hidden" value="1" id="page">
                    <a onclick="loadMore()" class="btn btn-xs">
                        Load More
                    </a>
                </div>

                <!-- End Load more -->
            </div>
        </section>
        <!-- /Top Products -->

        <!-- Electrnoics Section -->
        <section class="electrnoics-section">
            <div class="container">
                <div class="row">
                    @foreach ($sliders as $index => $slider)
                    @if ($index < 1)
                        <div class="col-lg-12 col-md-12 d-flex">
                            <div class="banner-img wow animate__animated animate__fadeInUp flex-fill" data-wow-delay="0">
                                <img src="{{ $slider->thumb }}" style="max-width: 60%; max-height: 100%; margin-right: 5%">
                                <div class="banner-text">
                                    <h2>{{ $slider->name }}{{ $slider->name2 }}</h2><br>
                                    <p>{!! $slider->description !!}</p>
                                    <a href="{{ $slider->url}}" target="blank" class="btn btn-xs">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    @else
                        @break
                    @endif
                @endforeach
                

                </div>
            </div>
        </section>
        <!-- /Electrnoics Section -->


        <!-- Products Deals -->
        @include('products.deal')
        <!-- /Products Deals -->

    </main>
    <!-- /Main -->
    <!-- Quick view -->
    @foreach ($productss as $key => $product)
    <div class="modal fade custom-modal" id="quickViewModal{{ $product->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close quick-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="feather-x-circle"></i>
                </button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <!-- MAIN SLIDES -->
                                <div class="position-relative">
                                    <div class="product-image-slider slick-initialized slick-slider"><button type="button"
                                            class="slick-prev slick-arrow" ><i class="fi-rs-arrow-small-left"></i></button>
                                        <div class="slick-list draggable">
                                            <div class="slick-track" style="opacity: 1; width: 6825px; transform: translate3d(-455px, 0px, 0px);">
                                                <figure class="border-radius-10 slick-slide slick-cloned" data-slick-index="-1" id=""
                                                    aria-hidden="true" tabindex="-1" style="width: 455px;">
                                                    <img src="{{ $product->thumb }}" alt="{{ $product->name }}">
                                                </figure>
                                                <figure class="border-radius-10 slick-slide slick-current slick-active" data-slick-index="0"
                                                    aria-hidden="false" tabindex="0" style="width: 455px;">
                                                    <img src="{{ $product->thumb }}" alt="{{ $product->name }}">
                                                </figure>

                                            </div>
                                        </div>
                                        <button type="button" class="slick-next slick-arrow" ><i
                                                class="fi-rs-arrow-small-right"></i></button>
                                    </div>
                                    <span class="zoom-icon"><i class="feather-maximize-2"></i></span>
                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info">
                                <h5 class="title-detail">{{ $product->name }}</h5>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        @php
                                            $helper = \App\Helpers\Helper::price($product->price, $product->price_sale);
                                            if ($product->price == 0) {
                                                $isPrice = '<span>' . \App\Helpers\Helper::price($product->price, $product->price_sale) . '</span>';
                                            } else if ($product->price_sale == $product->price){
                                                $isPrice = '<span class="current-price">$' . $helper . '.00</span>';
                                            } else {
                                                $discountPercentage = round((1 - ($product->price_sale / $product->price)) * 100);
                                                $isPrice = '
                                                    <span class="current-price">$' . $helper . '.00</span>
                                                    <span class="old-price">$' . $product->price . '.00</span>
                                                    <span class="save-price">-'. $discountPercentage .'%</span>';
                                            }
                                        @endphp
                                        {!! $isPrice !!}
                                    </div>
                                </div>
                                <ul class="pro-code">
                                    <li>Product Code : <span class="text-black">{{ $product->id }}</span></li>
                                    @foreach ($menus as $key => $menu)
                                    @if ($product->menu_id == $menu->id)
                                        <li>Categories: <span class="text-black">
                                            {{ $menu->name}}
                                        </span></li>
                                    @endif
                                    @endforeach
                                </ul>
                                <div class="rating d-inline-block mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <span class="ml-5"> (3.5)</span>
                                </div>
                                @if ($product->price > 0)
                                <div class="detail-extralink">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-minus-small"></i></a>
                                        <span class="qty-val">1</span>
                                        <a href="#" class="qty-up"><i class="fi-rs-plus-small"></i></a>
                                    </div>
                                </div>
                                
                                <div class="product-extra-link2">
                                    <button type="submit" class="button button-add-to-cart me-3">
                                        <i class="fi-rs-shopping-cart"></i> ADD TO CART
                                    </button>
                                </div>
                                @endif

                                    <div class="pro-share">
                                        <ul>
                                            <li class="me-2"><span>Share :</span></li>
                                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Detail Info -->

                                <div class="product-info p-0 border-0">
                                    <div class="tab-style3">
                                        <ul class="nav nav-tabs text-uppercase modal-nav">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Specification">Specification</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content shop_info_tab entry-main-content">
                                            <div class="tab-pane fade show active" id="Description">
                                                <div class="">
                                                    <ul class="pro-desc">
                                                        {{ $product->description }}
                                                        {{-- <li>Product Dimensions : 65 x 46 x 1 cm; 240 Grams
                                                        <li>Date First Available : 31 October 2020</li>
                                                        <li>Manufacturer : Seven Rocks International</li>
                                                        <li>ASIN : B08MCZMNDW</li>
                                                        <li>Item model number : T285HS</li> --}}
                                                    </ul> 
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="Specification">
                                                <ul class="pro-desc">
                                                    {!! $product->content !!}
                                                    {{-- <li>Item model number : T285HS</li>
                                                    <li>Department : Men</li>
                                                    <li>Packer : Seven Rocks International</li>
                                                    <li>Importer : Seven Rocks International</li>
                                                    <li>Item Weight : 240 g</li> --}}
                                                </ul> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @foreach ($product_deals as $key => $product)
    <div class="modal fade custom-modal" id="quickViewModal{{ $product->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close quick-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="feather-x-circle"></i>
                </button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <!-- MAIN SLIDES -->
                                <div class="position-relative">
                                    <div class="product-image-slider slick-initialized slick-slider"><button type="button"
                                            class="slick-prev slick-arrow" ><i class="fi-rs-arrow-small-left"></i></button>
                                        <div class="slick-list draggable">
                                            <div class="slick-track" style="opacity: 1; width: 6825px; transform: translate3d(-455px, 0px, 0px);">
                                                <figure class="border-radius-10 slick-slide slick-cloned" data-slick-index="-1" id=""
                                                    aria-hidden="true" tabindex="-1" style="width: 455px;">
                                                    <img src="{{ $product->thumb }}" alt="{{ $product->name }}">
                                                </figure>
                                                <figure class="border-radius-10 slick-slide slick-current slick-active" data-slick-index="0"
                                                    aria-hidden="false" tabindex="0" style="width: 455px;">
                                                    <img src="{{ $product->thumb }}" alt="{{ $product->name }}">
                                                </figure>

                                            </div>
                                        </div>
                                        <button type="button" class="slick-next slick-arrow" ><i
                                                class="fi-rs-arrow-small-right"></i></button>
                                    </div>
                                    <span class="zoom-icon"><i class="feather-maximize-2"></i></span>
                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info">
                                <h5 class="title-detail">{{ $product->name }}</h5>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        @php
                                            $helper = \App\Helpers\Helper::price($product->price, $product->price_sale);
                                            if ($product->price == 0) {
                                                $isPrice = '<span>' . \App\Helpers\Helper::price($product->price, $product->price_sale) . '</span>';
                                            } else if ($product->price_sale == $product->price){
                                                $isPrice = '<span class="current-price">$' . $helper . '.00</span>';
                                            } else {
                                                $discountPercentage = round((1 - ($product->price_sale / $product->price)) * 100);
                                                $isPrice = '
                                                    <span class="current-price">$' . $helper . '.00</span>
                                                    <span class="old-price">$' . $product->price . '.00</span>
                                                    <span class="save-price">-'. $discountPercentage .'%</span>';
                                            }
                                        @endphp
                                        {!! $isPrice !!}
                                    </div>
                                </div>
                                <ul class="pro-code">
                                    <li>Product Code : <span class="text-black">{{ $product->id }}</span></li>
                                    @foreach ($menus as $key => $menu)
                                    @if ($product->menu_id == $menu->id)
                                        <li>Categories: <span class="text-black">
                                            {{ $menu->name}}
                                        </span></li>
                                    @endif
                                    @endforeach
                                </ul>
                                <div class="rating d-inline-block mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <span class="ml-5"> (3.5)</span>
                                </div>
                                <div class="detail-extralink">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-minus-small"></i></a>
                                        <span class="qty-val">1</span>
                                        <a href="#" class="qty-up"><i class="fi-rs-plus-small"></i></a>
                                    </div>
                                </div>                                      
                                    <div class="product-extra-link2">
                                        <button type="submit" class="button button-add-to-cart me-3"><i class="fi-rs-shopping-cart"></i> ADD TO CART</button>
                                    </div>
                                    <div class="pro-share">
                                        <ul>
                                            <li class="me-2"><span>Share :</span></li>
                                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Detail Info -->

                                <div class="product-info p-0 border-0">
                                    <div class="tab-style3">
                                        <ul class="nav nav-tabs text-uppercase modal-nav">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Specification">Specification</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content shop_info_tab entry-main-content">
                                            <div class="tab-pane fade show active" id="Description">
                                                <div class="">
                                                    <ul class="pro-desc">
                                                        {{ $product->description }}
                                                    </ul> 
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="Specification">
                                                <ul class="pro-desc">
                                                    {!! $product->content !!}
                                                </ul> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- /Quick view -->
@endsection
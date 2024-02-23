@extends('main')
@section('content')
    <!-- Main -->
    <main class="main">
        <div class="container">
            <div class="page-header breadcrumb-wrap">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fas fa-home mr-10"></i>Home</a>
                    <span></span> 
                    <a href="/danh-muc/{{ $product->menu->id }}-{{ \Str::slug($product->menu->name) }}.html">  
                        {{ $product->menu->name}}
                    </a> 
                    <span></span> {{ $title}}
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 m-auto">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                
                                <div class="col-md-5 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                    <div class="detail-gallery">
                                        <!-- MAIN SLIDES -->
                                        <div class="position-relative">
                                            <div class="product-image-slider">
                                            @php $dummyArray = range(1, 7) @endphp
                                            @foreach($dummyArray as $index)
                                                <figure class="border-radius-7">
                                                    <img src="{{ $product->thumb }}" alt="{{ $product->name }}" />
                                                </figure>
                                            @endforeach
                                            </div>
                                            <span class="zoom-icon"><i class="feather-maximize-2"></i></span>
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails">
                                            @foreach($dummyArray as $index)
                                                <div><img src="{{ $product->thumb }}" alt="{{ $product->name }}" /></div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                </div>

                                <div class="col-md-7 col-sm-12 col-xs-12">
                                    <div class="detail-info pr-30 pl-30">
                                        <h4 class="title-detail">{{ $product->name }}</h4>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                            @php
                                            $helper = \App\Helpers\Helper::price($product->price, $product->price_sale);
                                            if ($product->price == 0) {
                                                $isPrice = '<span class="current-price">' . \App\Helpers\Helper::price($product->price, $product->price_sale) . '</span>';
                                            } else if ($product->price_sale == $product->price){
                                                $isPrice = '<span class="current-price">$' . $helper . '.00</span>';
                                            } else {
                                                $discountPercentage = round((1 - ($product->price_sale / $product->price)) * 100);
                                                $isPrice = '
                                                    <span class="current-price">$' . $helper . '.00</span>
                                                    <span class="old-price">$' . $product->price . '.00</span>
                                                    <span class="discount-tag">-'. $discountPercentage .'%</span>';
                                            }
                                            @endphp
                                            {!! $isPrice !!}
                                            </div>
                                        </div>
                                        <ul class="pro-code">
                                            <li>Product Code : <span class="text-black">{{ $product->id }}</span></li>
                                            
                                                @if ($product->menu_id == $product->menu->id)
                                                    <li>Categories: <span class="text-black">{{ $product->menu->name}}</span></li>
                                                @endif
                                            
                                        </ul>
                                        <div class="rating d-inline-block mb-3">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                            <span class="ml-5"> (3.5)</span>
                                        </div>
                                        <form action="/add-cart" method="post">
                                        @if ($product->price !== NULL)
                                            <div class=" d-flex m-r-20 m-tb-10 col-lg-4">
                                                <div class="btn-num-product-down hov-btn3 trans-04 flex-c-m form-control w-25">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>

                                                <input class="text-center num-product form-control" type="number"
                                                    name="num_product" value="1">

                                                <div class="btn-num-product-up hov-btn3 trans-04 flex-c-m form-control w-25">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>
                                            <div class="product-extra-link2">
                                                <button type="submit" class="button button-add-to-cart me-3">
                                                    <i class="fi-rs-shopping-cart"></i>Add to cart
                                                </button>
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            </div>
                                        @endif
                                        @csrf
                                        </form>


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
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="tab-style3">
                                    <ul class="nav nav-tabs text-uppercase">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">
                                                Description
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Specification">
                                                Specification
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content shop_info_tab entry-main-content">
                                        <div class="tab-pane fade show active" id="Description">
                                            <div class="">
                                                <ul class="pro-desc">
                                                @foreach($dummyArray as $index)
                                                    <li>{{ $product->description }}</li>
                                                @endforeach
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
                            
                            <!-- Products Deals -->
                            @include('products.deal')
                            <!-- /Products Deals -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- /Main -->
    @foreach ($product_deals as $key => $product)
    <div class="modal fade custom-modal pb-5" id="quickViewModal{{ $product->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close quick-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="feather-x-circle"></i>
                </button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <!-- MAIN SLIDES -->
                                <div class="position-relative">
                                    <div class="product-image-slider">
                                        <div class="slick-track" 
                                        style="opacity: 1; width: 457px; transform: translate3d(-225px, 0px, 0px);">
                                            <figure class="border-radius-10 slick-slide slick-current slick-active" 
                                            data-slick-index="2" aria-hidden="false" style="width: 457px;" tabindex="0">
                                            <img src="{{ $product->thumb }}" alt="{{ $product->name }}">
                                        </figure>
                                        </div>
                                    </div>
                                    <span class="zoom-icon"><i class="feather-maximize-2"></i></span>
                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
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
                                    @if ($product->menu_id == $product->menu->id)
                                        <li>Categories: <span class="text-black">{{ $product->menu->name}}</span></li>
                                    @endif
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
                                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Descriptions">Description</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Specifications">Specification</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content shop_info_tab entry-main-content">
                                            <div class="tab-pane fade show active" id="Descriptions">
                                                <div class="">
                                                    <ul class="pro-desc">
                                                        {{ $product->description }}
                                                    </ul> 
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="Specifications">
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
@endsection

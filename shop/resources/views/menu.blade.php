@extends('main')

@section('content')
    <!-- Main -->
    <main class="main">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 m-auto">
                    <div class="page-header breadcrumb-wrap">
                        <div class="breadcrumb">
                            <a href="/" rel="nofollow"><i class="fas fa-home mr-10"></i> Home</a>
                            <span></span> Category <span></span> {{ $title }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container mb-30">
                <div class="row flex-row-reverse">
                    <div class="col-lg-4-5">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <div class="sort-by-product-area">
                                    <div class="sort-by-cover mr-10">
                                        <div class="sort-by-product-wrap">
                                            <div class="sort-by ps-1">
                                                <span>Sort By</span>
                                            </div>
                                            <div class="sort-by-dropdown-wrap">
                                                <span><i class="fi-rs-angle-small-down"></i></span>
                                            </div>
                                        </div>
                                        <div class="sort-by-dropdown">
                                            <ul>
                                                <li>
                                                    <a class="{{ empty(request('sort')) ? 'active' : '' }}" 
                                                    href="{{ request()->url() }}">
                                                        Default
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="{{ request('sort') == 'price_asc' ? 'active' : '' }}" 
                                                    href="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}">
                                                        Price: Low to High
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="{{ request('sort') == 'price_desc' ? 'active' : '' }}" 
                                                    href="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}">
                                                        Price: High to Low
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="{{ request('sort') == 'name_asc' ? 'active' : '' }}" 
                                                    href="{{ request()->fullUrlWithQuery(['sort' => 'name_asc']) }}">
                                                        Name: A - Z
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="{{ request('sort') == 'name_desc' ? 'active' : '' }}" 
                                                    href="{{ request()->fullUrlWithQuery(['sort' => 'name_desc']) }}">
                                                        Name: Z - A
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="totall-product">
                                <div class="sort-by-product-area">
                                    <div class="sort-by-cover">
                                        <div class="sort-by-product-wrap">
                                            <div class="sort-by">
                                                <span>Show</span>
                                            </div>
                                            <div class="sort-by-dropdown-wrap">
                                                <span><i class="fi-rs-angle-small-down"></i></span>
                                            </div>
                                        </div>
                                        <div class="sort-by-dropdown">
                                            <ul>
                                                @foreach([3, 6, 9, 16, 32] as $perPageOption)
                                                    <li>
                                                        <a class="{{ request('per_page') == $perPageOption ? 'active' : '' }}" 
                                                        href="{{ request()->fullUrlWithQuery(['per_page' => $perPageOption]) }}">
                                                            {{$perPageOption}}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="sort-by-cover sort-link-right">
                                        <div class="sort-by-link">
                                            <div class="sort-link">
                                                <a><i class="fi-rs-apps" style="cursor:default"></i></a>
                                                <a class="m-0 active" style="cursor:default"><i class="fi-rs-list"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="filterProduct">
                            @include('products.filter')
                        </div>
                        <!--End Deals-->
                    </div>
                    <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                        <!-- Fillter By Price -->
                        <div class="sidebar-widget price_range range mb-30">
                            <h5 class="section-title style-1 mb-20">FILTERS</h5>
                            {{-- <div class="list-group">
                                @foreach ($menu_parent as $menu_parents)
                                <div class="list-group-item mb-10">
                                    <label class="list-group-text" onclick="toggleCheckboxGroup({{ $menu_parents->id }})">
                                        {{ $menu_parents->name }}
                                        <i id="arrow-icon{{ $menu_parents->id }}" class="fi-rs-angle-right"></i>
                                    </label>
                                    <div class="custome-checkbox" id="checkbox-group-{{ $menu_parents->id }}" style="display: none;">
                                        @foreach ($menu_child as $menu_childs)
                                            @if ($menu_parents->id == $menu_childs->parent_id)
                                            <a href="/">
                                                <input class="form-check-input menu-checkbox" type="checkbox" name="checkbox" 
                                                id="exampleCheckbox{{ $menu_childs->id }}" value="{{ $menu_childs->id }}">
                                                <label class="form-check-label" for="exampleCheckbox{{ $menu_childs->id }}">
                                                    <span>{{ $menu_childs->name }}</span>
                                                </label>
                                            </a>
                                     

                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <script>
                                    function toggleCheckboxGroup(menuId) {
                                        var checkboxGroup = document.getElementById('checkbox-group-' + menuId);
                                        var arrowIcon = document.getElementById('arrow-icon' + menuId);

                                        if (checkboxGroup.style.display === 'none' || checkboxGroup.style.display === '') {
                                            checkboxGroup.style.display = 'block';
                                            arrowIcon.classList.remove('fi-rs-angle-right');
                                            arrowIcon.classList.add('fi-rs-angle-down');
                                        } else {
                                            checkboxGroup.style.display = 'none';
                                            arrowIcon.classList.remove('fi-rs-angle-down');
                                            arrowIcon.classList.add('fi-rs-angle-right');
                                        }
                                    }
                                </script>
                                @endforeach
                            </div> --}}
                            <div class="list-group">
                                @foreach ($menu_parent as $menu_parents)
                                <div class="list-group-item mb-10">
                                    <label class="list-group-text" onclick="toggleCheckboxGroup({{ $menu_parents->id }})">
                                        {{ $menu_parents->name }}
                                        <i id="arrow-icon{{ $menu_parents->id }}" class="fi-rs-angle-right"></i>
                                    </label>
                                    <div class="custome-checkbox" id="checkbox-group-{{ $menu_parents->id }}" style="display: none;">
                                        @foreach ($menu_child as $menu_childs)
                                        @if ($menu_parents->id == $menu_childs->parent_id)
                                        <a href="{{ request()->fullUrlWithQuery(['category' => $menu_childs->id]) }}" 
                                            class="custom-checkbox-link" onclick="handleCheckboxLink(event)">
                                            <input class="form-check-input menu-checkbox" type="checkbox" name="checkbox" 
                                            id="exampleCheckbox{{ $menu_childs->id }}" value="{{ $menu_childs->id }}" id="category">
                                            <input type="hidden" 
                                            value="@if(request()->query('category') == $menu_childs->id){{$menu_childs->id}}@endif" class="category">
                                            <label class="form-check-label label-checkbox
                                                    @if(request()->query('category') == $menu_childs->id) text-danger fw-bold @endif"
                                                for="exampleCheckbox{{ $menu_childs->id }}">
                                                <span>{{ $menu_childs->name }}</span>
                                            </label>
                                        </a>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <script>
                                    function toggleCheckboxGroup(menuId) {
                                        var checkboxGroup = document.getElementById('checkbox-group-' + menuId);
                                        var arrowIcon = document.getElementById('arrow-icon' + menuId);
                            
                                        if (checkboxGroup.style.display === 'none' || checkboxGroup.style.display === '') {
                                            checkboxGroup.style.display = 'block';
                                            arrowIcon.classList.remove('fi-rs-angle-right');
                                            arrowIcon.classList.add('fi-rs-angle-down');
                                        } else {
                                            checkboxGroup.style.display = 'none';
                                            arrowIcon.classList.remove('fi-rs-angle-down');
                                            arrowIcon.classList.add('fi-rs-angle-right');
                                        }
                                    }
                            
                                    function handleCheckboxLink(event) {
                                        // Ngăn chặn sự kiện mặc định của checkbox để không làm thay đổi trạng thái khi nhấp vào label
                                        event.preventDefault();
                                        // Lấy checkbox tương ứng với label được nhấp vào
                                        var checkbox = event.target.parentNode.querySelector('.menu-checkbox');
                                        // Đảm bảo rằng checkbox tồn tại
                                        if (checkbox) {
                                            // Đảm bảo rằng sự kiện click không được chuyển tiếp đến checkbox
                                            event.stopPropagation();
                                            // Thay đổi trạng thái của checkbox khi nhấp vào label
                                            checkbox.checked = !checkbox.checked;
                                            // Thực hiện chuyển hướng tới đường link chỉ định trong thẻ a
                                            window.location.href = event.target.parentNode.getAttribute('href');
                                        }
                                    }
                                </script>
                                @endforeach
                            </div>
                            
                            <div class="price-filter">
                                <div class="price-filter-inner">
                                    <label class="list-group-text">FILTER BY PRICER</label>
                                    <div id="slider-range" class="mb-20"></div>
                                    <div class="d-flex justify-content-between">
                                        <div class="caption">Price: 
                                            <span id="slider-range-value1"></span> — 
                                            <span id="slider-range-value2"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a  class="btn fillter-btn" onclick="applyFilter()">Filter</a>
                            {{-- <script>
                                function applyFilter(){
                                    var currentUrl = window.location.pathname;
                                    var minValueString = document.getElementById('slider-range-value1').innerText;
                                    var maxValueString = document.getElementById('slider-range-value2').innerText;
                                    var minValue = parseFloat(minValueString.replace('$', '').replace(',', ''));
                                    var maxValue = parseFloat(maxValueString.replace('$', '').replace(',', ''));
                                    var ajaxUrl = currentUrl.includes('/all') ? '' : currentUrl;

                                    $.ajax({
                                        url: ajaxUrl, // Điều chỉnh đường dẫn máy chủ của bạn
                                        method: 'GET',
                                        data: {
                                            minValue: minValue,
                                            maxValue: maxValue
                                        },
                                        success: function(response) {
                                            console.log(response);
                                        },
                                        error: function(error) {
                                            console.error(error);
                                        }
                                    });
                                }
                            </script> --}}
                            
                        </div>
                        <!-- Product sidebar Widget -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- /Main -->

    @foreach ($products as $key => $product)
    <div class="modal fade custom-modal" id="quickViewModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="quickViewModal" aria-hidden="true">
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
                                    <div class="product-image-slider slick-initialized slick-slider">
                                        <button type="button" class="slick-prev slick-arrow" >
                                            <i class="fi-rs-arrow-small-left"></i>
                                        </button>
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
                                        <button type="button" class="slick-next slick-arrow" >
                                            <i class="fi-rs-arrow-small-right"></i>
                                        </button>
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
                                    @foreach ($menu_child as $menu_childs)
                                        @if ($product->menu_id == $menu_childs->id)
                                            <li>Categories: <span class="text-black">{{ $menu_childs->name}}</span></li>
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
                                <form action="/add-cart" method="post">
                                @if ($product->price > 0)
                                <div class="detail-extralink col-3 mb-5">
                                    {{-- <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-minus-small"></i></a>
                                        <span class="qty-val">1</span>
                                        <a href="#" class="qty-up"><i class="fi-rs-plus-small"></i></a>
                                    </div> --}}
                                    <input class="text-center num-product form-control" type="number" name="num_product" value="1">
                                </div>                                      
                                <div class="product-extra-link2 mt-5">
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
@endsection
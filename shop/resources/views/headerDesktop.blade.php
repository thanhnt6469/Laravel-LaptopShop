    <!-- Header -->
    <header class="header">
        <div class="header-middle d-none d-lg-block">
            <div class="container">
                <div class="header-col">
                    <div class="logo header-logo">
                        <a href="/"><img src="/template/assets/img/logo.png" alt="logo"></a>
                    </div>
                    <div class="header-right">
                        <style>
                            .search-ajax-product{
                                box-sizing: border-box;
                                background-color: #fff !important;
                                z-index: 1000;
                                top: 100%;
                                left: 0;
                                display: none
                            }
                        </style>
                        <div class="header-search">
                            <form action="">
                                <div class="position-relative d-flex w-100">
                                    <input type="text" placeholder="Search for items..." class="input-search-ajax-product">
                                    <input type="submit" name="form-submit" class="submit-btn" disabled>
                                </div>
                                <div class="search-ajax-product d-flex flex-column mt-1 position-absolute border"></div>
                            </form>
                        </div>
                        <script>
                            $('.search-ajax-product').hide();
                            $('.input-search-ajax-product').keyup(function(){
                                var _text = $(this).val();
                                if (_text != ''){
                                    $.ajax({
                                        url: "{{ route('ajax-search-product') }}?key=" + _text,
                                        type: 'GET',
                                        success: function(res){
                                            var _html = '';
                                            _html += '<ul class="latest-posts shadow px-3 pt-3 bg-body rounded" style="width:103% !important;margin-left: -5px">';
                                            for (var product of res){
                                                var slug = convertToSlug(product.name)
                                                _html += '<li>';
                                                _html += '<div class="post-thumb">';
                                                _html += '<a href="/san-pham/'+ product.id + '-' + slug +'.html"><img class="img-fluid" src="'+ product.thumb + '"></a>';
                                                _html += '</div>';
                                                _html += '<div class="post-info">';
                                                _html += '<h4><a href="/san-pham/'+ product.id + '-' + slug +'.html">'+ product.name +'</a></h4>';
                                                var createdAtDate = new Date(product.created_at);
                                                var options = { day: 'numeric', month: 'short', year: 'numeric' };
                                                var formattedDate = createdAtDate.toLocaleDateString('en-GB', options);
                                                _html += '<p>' + formattedDate + '</p>';
                                                _html += '</div></li>';
                                            }
                                            _html += '</ul>';
                                            $('.search-ajax-product').html(_html)
                                        }
                                    });
                                }  else {
                                    $('.search-ajax-product').html('')
                                    $('.search-ajax-product').hide()
                                }

                            })

                            function convertToSlug(Text) {
                                return Text
                                    .toLowerCase()
                                    .replace(/ /g, '-')
                                    .replace(/[^\w-]+/g, '')
                            }
                        </script>
                        <div class="header-details">
                            <div class="header-inner">
                                @php
                                    if(is_null(Session::get('carts'))) { $productQuantity = 0; } 
                                    else $productQuantity = count(Session::get('carts'));                 
                                @endphp
                                <div class="wrap-icon-header flex-w flex-r-m">
                                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ $productQuantity }}">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                </div>

                                <div class="header-inner-icon">
                                    <a href="/admin/main" class="d-flex align-items-center">
                                        <span><img src="/template/assets/img/icons/icon-profile.svg" alt=""></span>
                                        <span class="lable mt-0">My Account</span>
                                    </a>
                                    <div class="cart-dropdown-wrap account-dropdown">
                                        <ul>
                                            <li>
                                                <a href="/admin/main">My Account</a>
                                            </li>
                                            <li>
                                                <a href="/admin/users/login">Sign In</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}">Log Out</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom sticky-bar">
            <div class="container">
                <div class="header-col">
                    <div class="logo header-logo d-block d-lg-none">
                        <a href="index.html"><img src="/template/assets/img/logo.png" alt="logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="categories-col d-none d-lg-block">
                            <a class="categories-btn" href="#">
                                <span class="fi-rs-menu-burger"></span> Categories
                                <i class="fi-rs-angle-down"></i>
                            </a>
                            <div class="categories-dropdown-col categories-dropdown-list">
                                <div class="d-flex categories-dropdown-inner">
                                    <ul>
                                        <li>
                                            <a href="/danh-muc/30-gaming.html"><img src="/template/assets/img/icons/category-1.svg" alt="">Gaming</a>
                                        </li>
                                        <li>
                                            <a href="33-student.html"><img src="/template/assets/img/icons/category-2.svg" alt="">Student - Office</a>
                                        </li>
                                        <li>
                                            <a href="/danh-muc/32-graphics-technical.html"><img src="/template/assets/img/icons/category-3.svg" alt="">Graphic Design</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="categories-slide-open" style="display: none">
                                    <div class="d-flex categories-dropdown-inner">
                                        <ul>
                                            <li>
                                                <a href="/danh-muc/31-thin-and-light.html"><img src="/template/assets/img/icons/category-4.svg" alt="">Thin and Light</a>
                                            </li>
                                            <li>
                                                <a href="29-office.html"><img src="/template/assets/img/icons/category-5.svg" alt="">Business</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="more-categories"><span class="icon"></span> 
                                    <a class="categories-click">Show more...</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li><a class="active" href="/">Home</a></li>
                                    <li class="position-static">
                                        <a href="/danh-muc/all">Shop <i class="fi-rs-angle-down"></i></a>
                                        <ul class="mega-menu d-flex justify-content-center">
                                            <li class="sub-mega-menu sub-mega-menu-two w-25 ">
                                                <div class="menu-banner-wrap">
                                                    <div class="menu-banner-content">
                                                        <p>Earn Extra 5% Cashback</p>
                                                        <h4>Amazing Deals</h4>
                                                        <h3>Just For You</h3>
                                                        <div class="menu-banner-price">
                                                            <span class="new-price text-success">Save to 50%</span>
                                                        </div>
                                                        <div class="menu-banner-btn">
                                                            <a href="/danh-muc/all">Shop now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-two w-25">
                                                <div class="menu-banner-wrap">
                                                    <div class="menu-banner-content">
                                                        <p>Earn Extra 5% Cashback</p>
                                                        <h4>Amazing Deals</h4>
                                                        <h3>Just For You</h3>
                                                        <div class="menu-banner-price">
                                                            <span class="new-price text-success">Save to 50%</span>
                                                        </div>
                                                        <div class="menu-banner-btn">
                                                            <a href="/danh-muc/all">Shop now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-two w-25">
                                                <div class="menu-banner-wrap">
                                                    <div class="menu-banner-content">
                                                        <p>Earn Extra 5% Cashback</p>
                                                        <h4>Amazing Deals</h4>
                                                        <h3>Just For You</h3>
                                                        <div class="menu-banner-price">
                                                            <span class="new-price text-success">Save to 50%</span>
                                                        </div>
                                                        <div class="menu-banner-btn">
                                                            <a href="/danh-muc/all">Shop now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="position-static">
                                        <a href="/danh-muc/all">Laptops <i class="fi-rs-angle-down"></i></a>
                                        <ul class="mega-menu">
                                            {!! \App\Helpers\Helper::menus($menus,0,false); !!}
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Pages <i class="fi-rs-angle-down"></i></a>
                                        <ul class="has-submenu">
                                            <li><a href="/about">About Us</a></li>
                                            <li><a href="/policy">Privacy Policy</a></li>
                                            <li><a href="/term">Terms of Service</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/blogs">Blog</a></li>
                                    <li><a href="/contact">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="contact-item d-none d-lg-flex">
                        <img src="/template/assets/img/icons/icon-headphone-white.svg" alt="contact-number">
                        <p>CALL US NOW<span>+123 5678 890</span></p>
                    </div>
                    <div class="header-inner-icon d-block d-lg-none">
                        <div class="bar-icon">
                            <span class="bar-icon-one"></span>
                            <span class="bar-icon-two"></span>
                            <span class="bar-icon-three"></span>
                        </div>
                    </div>
                    <div class="header-details d-block d-lg-none">
                        <div class="header-inner">
                            <div class="header-inner-icon">
                                <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{ $productQuantity }}">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


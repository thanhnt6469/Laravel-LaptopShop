<div class="main-menu-wrapper">
    <div class="mobile-header-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="/"><img src="/template/assets/img/logo.png" alt="logo" /></a>
            </div>
            <div class="mobile-menu-close close-col menu-close-position">
                <button class="close-style">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content">
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
            <div class="mobile-search mobile-search-three mobile-header-border">
                <form action="">             
                    <div class="position-relative d-flex w-100">
                        <input type="text" placeholder="Search for items..." class="input-search-ajax-product">
                        <button type="submit" disabled><i class="fi-rs-search"></i></button>
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
            <div class="mobile-menu-col mobile-header-border">

                <!-- Mobile Menu -->
                <nav>
                    <ul class="main-nav">
                        <li class="mobile-menu-item">
                            <a href="/">Home</a>
                        </li>
                        <li class="mobile-menu-item">
                            <a href="#">Shop</a>
                            {{-- <ul class="dropdown">
                                <li class="mobile-menu-item">
                                    <a href="#">Women's Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="product-category-list.html">Dresses</a></li>
                                        <li><a href="product-category-list.html">Blouses & Shirts</a></li>
                                        <li><a href="product-category-list.html">Hoodies & Sweatshirts</a></li>
                                        <li><a href="product-category-list.html">Women's Sets</a></li>
                                    </ul>
                                </li>
                                <li class="mobile-menu-item">
                                    <a href="#">Men's Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="product-category-list.html">Jackets</a></li>
                                        <li><a href="product-category-list.html">Casual Faux Leather</a></li>
                                        <li><a href="product-category-list.html">Genuine Leather</a></li>
                                    </ul>
                                </li>
                                <li class="mobile-menu-item">
                                    <a href="#">Technology</a>
                                    <ul class="dropdown">
                                        <li><a href="product-category-list.html">Gaming Laptops</a></li>
                                        <li><a href="product-category-list.html">Ultraslim Laptops</a></li>
                                        <li><a href="product-category-list.html">Tablets</a></li>
                                        <li><a href="product-category-list.html">Laptop Accessories</a></li>
                                        <li><a href="product-category-list.html">Tablet Accessories</a></li>
                                    </ul>
                                </li>
                            </ul> --}}
                        </li>
                        <li class="mobile-menu-item">
                            <a href="/danh-muc/all">Laptops</a>
                            <ul class="dropdown">
                                {!! \App\Helpers\Helper::menus($menus,0,true); !!}
                            </ul>
                        </li>
                        <li class="mobile-menu-item">
                            <a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="/about">About Us</a></li>
                                <li><a href="/policy">Privacy Policy</a></li>
                                <li><a href="/term">Terms Conditions</a></li>
                            </ul>
                        </li>
                        <li class="mobile-menu-item">
                            <a href="/blogs">Blog</a>
                        </li>
                        <li class="mobile-menu-item">
                            <a href="/contact">Contact Us</a>
                        </li>

                        <li class="mobile-menu-item">
                            <a href="#">Account</a>
                            <ul class="dropdown">
                                <li><a href="/admin/main">My Account</a></li>
                                <li><a href="/admin/users/login">Sign In</a></li>
                                <li><a href="/">Log Out</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /Mobile Menu -->

            </div>
        </div>
    </div>
</div>
<!-- /Header -->
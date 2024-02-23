    <!-- Footer --> 
    <footer class="footer">
        <section class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="footer-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <div class="logo mb-30">
                                <a href="/" class="mb-15"><img src="/template/assets/img/logo.png" alt="logo" /></a>
                                <p>Integer posuere orci sit amet feugiat pellent que. Suspendisse vel tempor justo, sit amet posuere orci dapibus auctor.Integer posuere orci sit amet.</p>
                                <a href="/"><img src="/template/assets/img/payment.png" alt="logo" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="footer-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <h4 class="footer-title">Contact Info</h4>
                    <ul class="contact-info">
                        <li><p><i class="fas fa-phone-alt"></i> +84 444444444</p></li>
                        <li><p><i class="fas fa-envelope"></i> <a href="#" class="__cf_email__" >[email&#160;protected]</a></p></li>
                        <li><p><i class="fas fa-map-marker-alt"></i> Da Nang</p></li>
                    </ul>
                    <ul class="footer-social-icon">
                        <li><a href="#" target="_blank"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
                <div class="footer-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <h4 class="footer-title">Usefull Links</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">Product Recall</a></li>
                        <li><a href="#">Gift Vouchers</a></li>
                        <li><a href="#">Returns & Exchange</a></li>
                        <li><a href="#">Shipping Options</a></li>
                        <li><a href="#">Help & FAQs</a></li>
                    </ul>
                </div>
                <div class="footer-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                    <h4 class="footer-title">Quick Links</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="/about">About Us </a></li>
                        <li><a href="/danh-muc/all">Shop Products</a></li>
                        <li><a href="/carts">My Cart</a></li>
                        <li><a href="/carts">Checkout</a></li>
                        <li><a href="/contact">Contact Us</a></li>
                    </ul>
                </div>
                </div>
            </div>
        </section>
    </footer>
    <!-- /Footer --> 
    <!-- jQuery -->
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="/template/assets/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="/template/assets/js/bootstrap.bundle.min.js"></script>

    <!-- Slick JS -->
    <script src="/template/assets/plugins/slick/slick.js"></script>

    <!-- Wow JS -->
    <script src="/template/assets/js/wow.js"></script>

    <!-- Select2 JS -->
    <script src="/template/assets/plugins/select2/select2.min.js"></script>

    <!-- Scrollup JS -->
    <script src="/template/assets/js/scrollup.js"></script>

    <!-- Sidebar JS -->
    <script src="/template/assets/plugins/theia-sticky-sidebar/jquery.theia.sticky.js"></script>

    <!-- Elevatezoom JS -->
    <script src="/template/assets/js/jquery.elevatezoom.js"></script>

    <!-- Scrollbar JS -->
    <script src="/template/assets/plugins/perfect-scrollbar/perfect-scrollbar.js"></script>

    <!-- Waypoints JS -->
    <script src="/template/assets/js/waypoints.js"></script>

    <!-- Slider Rrange  JS -->
    <script src="/template/assets/plugins/range-slider/slider-range.js"></script>
    
    <!-- Shop JS -->
    <script src="/template/assets/js/shop.js"></script>

    <!-- Custom JS -->
    <script src="/template/assets/js/script.js"></script>
<!--===============================================================================================-->
    <script src="/template1/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="/template1/vendor/animsition/js/animsition.min.js"></script>
    <script src="/template1/vendor/sweetalert/sweetalert.min.js"></script>
    <script>

        $('.js-addcart-detail').each(function(){
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function(){
                swal(nameProduct, "is added to cart !", "success");
            });
        });
    
    </script>
    <script src="/template1/js/main.js"></script>
    <script src="/template/assets/js/public.js"></script>
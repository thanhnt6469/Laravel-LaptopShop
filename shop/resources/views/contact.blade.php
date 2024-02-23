@extends('main')
@section('content')
<main class="main">
    <div class="container">
        <div class="page-header breadcrumb-wrap">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fas fa-home mr-10"></i>Home</a>
                <span></span> Contact Us
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <div class="contact-from-area padding-20-row-col">
                        <h4 class="mb-10">Contact form</h4>
                        <p class="text-muted mb-30 font-sm">Your email address will not be published. Required fields are marked *</p>
                        <form class="contact-form" id="contact-form" action="#" method="post">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20 form-group">
                                        <input name="name" placeholder="First Name" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input name="email" placeholder="Your Email" type="email">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input name="telephone" placeholder="Your Phone" type="tel">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input name="subject" placeholder="Subject" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" placeholder="Message" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group mb-0 float-end">
                                        <button class="submit submit-auto-width" type="submit">Send message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="contact-card w-100">
                        <div class="contact-body">
                            <div class="contact-icon">
                                <p><i class="feather-mail"></i></p>
                            </div>
                            <div class="contact-details">
                                <h4>Email</h4>
                                <p class="text-muted">example@vku.udn.vn</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="contact-card w-100">
                        <div class="contact-body">
                            <div class="contact-icon">
                                <p><i class="feather-phone-call"></i></p>
                            </div>
                            <div class="contact-details">
                                <h4>Phone Number</h4>
                                <p class="text-muted">+84 444444444</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="contact-card w-100">
                        <div class="contact-body">
                            <div class="contact-icon">
                                <p><i class="feather-map-pin"></i></p>
                            </div>
                            <div class="contact-details">
                                <h4>Address</h4>
                                <p class="text-muted">470 Đ. Trần Đại Nghĩa, Khu đô thị, Ngũ Hành Sơn, Đà Nẵng 550000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Google Map -->
    <div class="map-grid">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15342.933584393664!2d108.252355!3d15.9752931!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2sVietnam%20-%20Korea%20University%20of%20Information%20and%20Communication%20Technology.!5e0!3m2!1sen!2s!4v1704128053452!5m2!1sen!2s" allowfullscreen="" aria-hidden="false" tabindex="0" class="contact-map"></iframe>

    </div>
    <!-- Google Map --> 
</main>
@endsection
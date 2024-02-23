@extends('main')
@section('content')
<main class="main">
    <div class="container">
        <div class="page-header breadcrumb-wrap">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fas fa-home mr-10"></i>Home</a>
                <span></span> About Us
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="sub-title">About Us</h4>
                </div>	
                <div class="col-lg-6 col-md-6">
                    <div class="about-contact">
                        <h3>300+ Customers across UK, India &amp; UAE</h3>
                        <p>BESTATSHOP  are confident in working with clients ranging from fortune 500 companies to startups. We specialize in creating software, promote various technology startup by partnering with them, to build their technology platforms. We explore, discover, and recommend suitable and awesome solutions that meet the requirements of the client.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Our Mission
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body">
                                    More responsible in producing or to produce a consistent end-to-end light touch customer experience delivery to meet the business objectives.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-0">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Our Vision
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                                <div class="accordion-body">
                                    More responsible in producing or to produce a consistent end-to-end light touch customer experience delivery to meet the business objectives.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
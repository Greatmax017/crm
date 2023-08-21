@extends('layouts.app')

@section('content')
<!-- ##### Welcome Area Start ##### -->
    <div class="breadcumb-area">
        <!-- breadcumb content -->
        <div class="breadcumb-content">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <nav aria-label="breadcrumb" class="breadcumb--con text-center">
                            <h2 class="w-text title wow fadeInUp" data-wow-delay="0.2s">About us</h2>
                            <ol class="breadcrumb justify-content-center wow fadeInUp" data-wow-delay="0.4s">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Welcome Area End ##### -->
    <section class="relative section-padding-100-70 payment-section-gradient">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 offset-lg-0 col-md-12 no-padding-left">
                    <div class="ab-wrapper">
                        <img class="abso-img1" src="img/email4.jpg" alt="">
                        <img class="wow abso-img2 fadeInUp floating" data-wow-delay="0.2s" src="img/core-img/about-12.png"
                            alt="">
                        <img class="abso-img3" src="img/core-img/dotted1.svg" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-6 offset-lg-0">
                    <div class="who-we-contant mt-s">
                        <div class="mb-15 text-left fadeInUp" data-wow-delay="0.2s">
                            <span class="gradient-text blue">Reliable Online Platform</span>
                        </div>
                        <h4 class="fadeInUp" data-wow-delay="0.3s">Who We Are</h4>
                        <p class="fadeInUp" data-wow-delay="0.4s">A Platform that offers solutions to all your Data needs at
                            a Subsidized rate without compromising quality.</p>
                        <div class="services-block-four v2 mt-30">
                            <div class="inner-box">
                                <div class="icon-font-box">
                                    <i class="fa fa-check"></i>
                                </div>
                                <h3><a href="#">Available on all networks.</a></h3>
                                <!-- <div class="text width-80">Available on all networks.</div> -->
                            </div>
                        </div><br>
                        <div class="services-block-four v2">
                            <div class="inner-box">
                                <div class="icon-font-box">
                                    <i class="fa fa-check"></i>
                                </div>
                                <h3><a href="#">Electricity bill for EKEDC(PHCN), IKEDC(PHCN), AEDC, PHEDC e.t.c.</a></h3>
                                <!-- <div class="text width-80">Lorem ipsum dolor sit amet, conse ctetur dolor adipisicing elit alias officia aperiam.</div> -->
                            </div>
                        </div>
                        <div class="services-block-four v2">
                            <div class="inner-box">
                                <div class="icon-font-box">
                                    <i class="fa fa-check"></i>
                                </div>
                                <h3><a href="#">Instant recharge of DStv, GOtv and Startimes e.t.c.</a></h3>
                                <!-- <div class="text width-80">Lorem ipsum dolor sit amet, conse ctetur dolor adipisicing elit alias officia aperiam.</div> -->
                            </div>
                        </div>
    
    
                    </div>
                </div>
            </div>
    
        </div>
    </section>
    @endsection

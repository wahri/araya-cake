@extends('layouts.app')

@section('content')
    <!-- PAGE HERO
           ============================================= -->
    <div id="about-page" class="page-hero-section division">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="hero-txt text-center white-color">

                        <!-- Breadcrumb -->
                        <div id="breadcrumb">
                            <div class="row">
                                <div class="col">
                                    <div class="breadcrumb-nav">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Tentang Araya</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Title -->
                        <h2 class="h2-xl">About Araya</h2>

                    </div>
                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </div> <!-- END PAGE HERO -->




    <!-- ABOUT-3
           ============================================= -->
    <section id="about-3" class="wide-60 about-section division">
        <div class="container">
            <div class="row d-flex align-items-center">


                <!-- ABOUT IMAGE -->
                <div class="col-md-5 col-lg-6">
                    <div class="about-3-img text-center mb-40">
                        <img class="img-fluid" src="{{ asset('home-assets/images/about-03-img.png') }}" alt="about-image">
                    </div>
                </div>


                <!-- ABOUT TEXT -->
                <div class="col-md-7 col-lg-6">
                    <div class="about-3-txt mb-40">

                        <!-- Title -->
                        <h2 class="h2-sm">Nothing brings people together like a good burger</h2>

                        <!-- Text -->
                        <p class="p-md">Semper lacus cursus porta primis ligula risus tempus and sagittis ipsum mauris
                            lectus laoreet
                            purus ipsum tempor enim ipsum porta justo integer ultrice aligula lectus aenean magna and
                            pulvinar purus at
                            pretium gravida
                        </p>

                        <!-- List -->
                        <ul class="txt-list">

                            <li class="list-item">
                                <p class="p-md">Fringilla risus, luctus mauris orci auctor purus euismod pretium
                                    purus pretium ligula rutrum tempor sapien
                                </p>
                            </li>

                            <li class="list-item">
                                <p class="p-md">Quaerat sodales sapien euismod purus blandit</p>
                            </li>

                            <li class="list-item">
                                <p class="p-md">Nemo ipsam egestas volute turpis dolores ut aliquam quaerat sodales
                                    sapien undo pretium a purus mauris
                                </p>
                            </li>

                        </ul>

                    </div>
                </div> <!-- END ABOUT TEXT -->


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END ABOUT-3 -->




    <!-- ABOUT-1
           ============================================= -->
    <section id="about-1" class="bg-fixed wide-100 about-section division">
        <div class="container">
            <div class="row">


                <!-- ABOUT TEXT -->
                <div class="col-xl-10 offset-xl-1">
                    <div class="about-1-txt text-center">

                        <!-- Title -->
                        <h2><span class="yellow-color">Burgers…</span> what else?</h2>

                        <!-- Text -->
                        <p class="p-xl grey-color">Porta semper lacus cursus, feugiat primis ultrice a ligula risus auctor
                            an
                            tempus feugiat dolor lacinia cubilia curae integer orci congue and metus mollislorem primis in
                            integer
                            metus curae integer orci congue integer and primis in integer metus mollis faucibus
                        </p>

                        <!-- Icons List -->
                        <div class="abox-1-wrapper ico-75">
                            <div class="row">

                                <!-- ABOUT BOX #1 -->
                                <div class="col-sm-4 col-md-2">
                                    <div class="abox-1 mb-40">

                                        <!-- Icon -->
                                        <div class="abox-1-ico grey-color"><span class="flaticon-burger"></span></div>

                                        <!-- Text -->
                                        <h6 class="h6-xl">Burgers</h6>

                                    </div>
                                </div>

                                <!-- ABOUT BOX #2 -->
                                <div class="col-sm-4 col-md-2">
                                    <div class="abox-1 mb-40">

                                        <!-- Icon -->
                                        <div class="abox-1-ico grey-color"><span class="flaticon-french-fries"></span></div>

                                        <!-- Text -->
                                        <h6 class="h6-xl">Fries</h6>

                                    </div>
                                </div>

                                <!-- ABOUT BOX #3 -->
                                <div class="col-sm-4 col-md-2">
                                    <div class="abox-1 mb-40">

                                        <!-- Icon -->
                                        <div class="abox-1-ico grey-color"><span class="flaticon-fried-chicken"></span>
                                        </div>

                                        <!-- Text -->
                                        <h6 class="h6-xl">Chicken</h6>

                                    </div>
                                </div>

                                <!-- ABOUT BOX #4 -->
                                <div class="col-sm-4 col-md-2">
                                    <div class="abox-1 mb-40">

                                        <!-- Icon -->
                                        <div class="abox-1-ico grey-color"><span class="flaticon-salad"></span></div>

                                        <!-- Text -->
                                        <h6 class="h6-xl">Salads</h6>

                                    </div>
                                </div>

                                <!-- ABOUT BOX #5 -->
                                <div class="col-sm-4 col-md-2">
                                    <div class="abox-1 mb-40">

                                        <!-- Icon -->
                                        <div class="abox-1-ico grey-color"><span class="flaticon-donut"></span></div>

                                        <!-- Text -->
                                        <h6 class="h6-xl">Desserts</h6>

                                    </div>
                                </div>

                                <!-- ABOUT BOX #6 -->
                                <div class="col-sm-4 col-md-2">
                                    <div class="abox-1 mb-40">

                                        <!-- Icon -->
                                        <div class="abox-1-ico grey-color"><span class="flaticon-drinks"></span></div>

                                        <!-- Text -->
                                        <h6 class="h6-xl">Drinks</h6>

                                    </div>
                                </div>

                            </div>
                        </div> <!-- End Icons List -->

                        <!-- Button -->
                        <a href="menu-3.html" class="btn btn-md btn-red tra-red-hover">Explore Full Menu</a>

                    </div>
                </div> <!-- END ABOUT TEXT -->


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END ABOUT-1 -->




    <!-- ABOUT-4
           ============================================= -->
    <section id="about-4" class="wide-60 about-section division">
        <div class="container">
            <div class="row">


                <!-- ABOUT TEXT -->
                <div class="col-md-7 col-lg-6">
                    <div class="about-4-txt mb-40">

                        <!-- Title -->
                        <h2 class="h2-sm">Discover the new taste of the burger</h2>

                        <!-- Text -->
                        <p class="p-md grey-color">Porta semper lacus cursus, feugiat primis ultrice and ligula risus auctor
                            an
                            tempus feugiat dolor lacinia cubilia a curae integer orci congue and metus mollislorem primis
                        </p>

                        <!-- Image -->
                        <img class="img-fluid" src="{{ 'home-assets/images/img-10.jpg' }}" alt="about-image">

                    </div>
                </div> <!-- END ABOUT TEXT -->


                <!-- ABOUT IMAGE -->
                <div class="col-md-5 col-lg-6">
                    <div class="about-4-img mb-40">

                        <!-- Image -->
                        <img class="img-fluid" src="{{ 'home-assets/images/img-15.jpg' }}" alt="about-image">

                        <!-- Text -->
                        <p class="p-md grey-color">Porta semper lacus cursus, feugiat primis ultrice and ligula risus auctor
                            orci
                            tempus feugiat dolor lacinia cubilia integer
                        </p>

                    </div>
                </div>


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END ABOUT-4 -->

    <!-- GOOGLE MAP
                                                                               ============================================= -->
    <div id="lokasi">
        <div class="google-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.696207234422!2d101.41555227412404!3d0.4482737638120649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5a9a4a95e8c8b%3A0xdd3455db93f2afe1!2sAraya%20Cake!5e0!3m2!1sid!2sid!4v1692882306246!5m2!1sid!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
@endsection

@section('style')
@endsection

@section('sript')
@endsection

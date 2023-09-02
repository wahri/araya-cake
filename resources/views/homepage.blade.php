@extends('layouts.app')

@section('content')
    <!-- HERO-3
                                                                                                       ============================================= -->
    <section id="hero-3" class="hero-section division">
        <!-- SLIDER -->
        <div class="slider mt-1001">
            <ul class="slides">

                @foreach ($sliders as $slider)
                    <li id="slide-{{ $slider->id }}">
                        <a href="#" target="_blank">
                            <!-- Background Image -->
                            <img src="{{ asset('images/' . $slider->image->name) }}" alt="{{ $slider->alt_image }}">

                            <!-- Image Caption -->
                            <div class="caption d-flex align-items-center left-align">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="caption-txt white-color">

                                                <!-- Title -->
                                                <h2>{{ $slider->big_text ?? '' }}</h2>
                                                <h5 class="h5-lg">{{ $slider->small_text ?? '' }}</h5>

                                            </div>
                                        </div>
                                    </div> <!-- End row -->
                                </div> <!-- End container -->
                            </div> <!-- End Image Caption -->

                        </a>


                    </li>
                @endforeach


            </ul>
        </div> <!-- END SLIDER -->


    </section> <!-- END HERO-3 -->

    <!-- MENU-8
                                                                                                   ============================================= -->
    <section id="menu-8" class="wide-70 menu-section division">
        <div class="container">


            <!-- TABS NAVIGATION -->
            <div id="tabs-nav">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <ul class="tabs-1 ico-55 red-tabs clearfix">

                            @foreach ($categoryWithProduct as $i => $category)
                                <li class="tab-link {{ $i == 0 ? 'current' : '' }}" data-tab="tab-{{ $category->id }}">
                                    <img src="{{ asset('home-assets/icons/' . $category->big_icon) }}"
                                        alt="{{ $category->name }} Icon" class="custom-icon">
                                    <h5 class="h5-sm">{{ $category->name }}</h5>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div> <!-- END TABS NAVIGATION -->

            <section id="menu-6">

                <!-- TABS CONTENT -->
                <div id="tabs-content">

                    @foreach ($categoryWithProduct as $i => $category)
                        <div id="tab-{{ $category->id }}" class="tab-content {{ $i == 0 ? 'current' : '' }}">
                            <div class="row">

                                @foreach ($category->products as $product)
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="menu-6-item bg-white">


                                            <!-- IMAGE -->
                                            <div class="menu-6-img rel">
                                                <div class="hover-overlay">

                                                    <!-- Image -->
                                                    <img class="img-fluid"
                                                        src="{{ asset('images/' . $product->images->first()->name) }}"
                                                        alt="menu-image" />

                                                    <!-- Item Code -->
                                                    {{-- <span class="item-code bg-tra-dark">Code: 0850</span> --}}

                                                    <!-- Zoom Icon -->
                                                    <div class="menu-img-zoom ico-25">
                                                        <a href="{{ asset('images/' . $product->images->first()->name) }}"
                                                            class="image-link">
                                                            <span class="flaticon-zoom"></span>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- TEXT -->
                                            <div class="menu-6-txt rel">

                                                <!-- Rating -->
                                                <div class="item-rating">
                                                    <div class="stars-rating stars-lg">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                </div>

                                                <!-- Like Icon -->
                                                {{-- <div class="like-ico ico-25">
                                                    <a href="#"><span class="flaticon-heart"></span></a>
                                                </div> --}}

                                                <a href="{{ route('detail.cake', $product->slug) }}" target="_blank">
                                                    <h5 class="h5-sm">
                                                        {{ $product->name }}
                                                    </h5>

                                                    <p class="grey-color">
                                                        {{ $product->description }}
                                                    </p>
                                                </a>

                                                <div class="menu-6-price bg-coffee">
                                                    <h5 class="h5-xs yellow-color">Rp. {{ $product->price / 1000 }}k</h5>
                                                </div>

                                                <div class="add-to-cart bg-yellow ico-10" style="cursor: pointer">
                                                    <a class="add-to-cart-list" data-product-id="{{ $product->id }}">
                                                        <span class="flaticon-shopping-bag"></span> Add to Cart
                                                    </a>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach


                </div>
            </section>

            <div class="text-center mt-5">

                <a href="{{ route('shop') }}" class="btn btn-lg btn-red tra-red-hover">Lihat Cake Lainnya!</a>
            </div>
        </div>
    </section>


    <section id="promo-11" class="bg-fixed promo-section division">
        <div class="container">
            <div class="row d-flex align-items-center">

                <div class="col-md-5 col-lg-4">
                    <div class="pbox-11-txt mb-40 white-color">

                        <!-- Title -->
                        <h3 class="h3-lg">The</h3>
                        <h2>Premium Cake</h2>

                        <!-- Text -->
                        <p class="p-md">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla nobis numquam, ea unde eos quo!
                        </p>

                        <!-- Button -->
                        <a href="#" class="btn btn-lg btn-red tra-white-hover">Pesan Sekarang</a>

                    </div>
                </div>


                <!-- PROMO IMAGE -->
                <div class="col-md-7 col-lg-6">
                    <div class="pbox-11-img mb-40">

                        <!-- Image -->
                        <img class="img-fluid" src="{{ asset('home-assets/images/promo-11-img.png') }}"
                            alt="promo-image" />

                        <!-- Price Badge -->
                        <div class="red-badge price-badge-lg bg-fixed">
                            <div class="badge-txt white-color">
                                {{-- <h5 class="h5-xl">Pesan <br>Sekarang</h5> --}}
                                <h5 class="h5-sm">Bisa Request<br>Custom</h5>
                                {{-- <span class="item-code">Code: 0841</span> --}}
                            </div>
                        </div>

                    </div>
                </div>


                <!-- PROMO LINKS -->
                <div class="col-lg-2">

                    <!-- Link -->
                    <div class="pbox-11-link text-center white-color">
                        <a href="#">
                            <img class="img-fluid" src="{{ asset('home-assets/images/menu/burger-02.png') }}"
                                alt="promo-image" />
                            <p>Ultimate Bacon Burger</p>
                        </a>
                    </div>

                    <!-- Link -->
                    <div class="pbox-11-link text-center mb-40 white-color">
                        <a href="#">
                            <img class="img-fluid" src="{{ asset('home-assets/images/menu/burger-05.png') }}"
                                alt="promo-image" />
                            <p>Grilled Chicken Burger</p>
                        </a>
                    </div>

                </div>


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END PROMO-11 -->




    <!-- TESTIMONIALS-1
                                                                           ============================================= -->
    <div id="reviews-1" class="bg-image bg-scroll reviews-section division">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 testimonials white-color">


                    <!-- TRANSPARENT QUOTE ICON -->
                    <div class="quote-icon"></div>


                    <!-- TESTIMONIALS CONTENT -->
                    <div class="flexslider">
                        <ul class="slides text-center">

@foreach ($reviews as $review)
<li class="review-1">
    <div class="review-1-txt">

        <!-- Testimonial Author Avatar -->
        <img src="{{ asset('images/'.$review->image->name) }}"
            alt="testimonial-avatar">

        <!-- Text -->
        <p>
            {{ $review->reviews }}
        </p>

        <!-- Rating -->
        <div class="review-rating">
            <div class="stars-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>

        <!-- Testimonial Author -->
        <p class="testimonial-autor">by {{ $review->name }}</p>
        <a href="{{ $review->link_to_review }}" target="_blank" class="testimonial-autor">
            <i class="fab fa-google"></i> Lihat ulasan
        </a>

    </div>
</li>
    
@endforeach

                        </ul>
                    </div>


                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </div> <!-- END TESTIMONIALS-1 -->


    <!-- GALLERY-3
                                                                                                    ============================================= -->
    <section id="gallery-3" class="gallery-section division">


        <!-- IMAGES HOLDER -->
        <div class="row gallery-grid">
            <div class="col">
                <div class="owl-carousel images-carousel">


                    <!-- IMAGE #1 -->
                    <div class="gallery-img">
                        <a href="{{ asset('home-assets/images/gallery/img-01.jpg') }}" class="image-link">
                            <div class="hover-overlay">
                                <img class="img-fluid" src="{{ asset('home-assets/images/gallery/img-01.jpg') }}"
                                    alt="gallery-image" />
                                <div class="item-overlay"></div>

                                <!-- Image Meta -->
                                <div class="img-meta white-color">
                                    <h5 class="h5-md">Classic California</h5>
                                    <div class="txt-block-rating">
                                        <div class="stars-rating">
                                            <span>4.5</span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span>(23)</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>


                    <!-- IMAGE #2 -->
                    <div class="gallery-img">
                        <a href="{{ asset('home-assets/images/gallery/img-02.jpg') }}" class="image-link">
                            <div class="hover-overlay">
                                <img class="img-fluid" src="{{ asset('home-assets/images/gallery/img-02.jpg') }}"
                                    alt="gallery-image" />
                                <div class="item-overlay"></div>

                                <!-- Image Meta -->
                                <div class="img-meta white-color">
                                    <h5 class="h5-md">Margherita Pizza</h5>
                                    <div class="txt-block-rating">
                                        <div class="stars-rating">
                                            <span>4.52</span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span>(58)</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>


                    <!-- IMAGE #3 -->
                    <div class="gallery-img">
                        <a href="{{ asset('home-assets/images/gallery/img-03.jpg') }}" class="image-link">
                            <div class="hover-overlay">
                                <img class="img-fluid" src="{{ asset('home-assets/images/gallery/img-03.jpg') }}"
                                    alt="gallery-image" />
                                <div class="item-overlay"></div>

                                <!-- Image Meta -->
                                <div class="img-meta white-color">
                                    <h5 class="h5-md">Grilled Ribs</h5>
                                    <div class="txt-block-rating">
                                        <div class="stars-rating">
                                            <span>4.9</span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span>(69)</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>


                    <!-- IMAGE #4 -->
                    <div class="gallery-img">
                        <a href="{{ asset('home-assets/images/gallery/img-04.jpg') }}" class="image-link">
                            <div class="hover-overlay">
                                <img class="img-fluid" src="{{ asset('home-assets/images/gallery/img-04.jpg') }}"
                                    alt="gallery-image" />
                                <div class="item-overlay"></div>

                                <!-- Image Meta -->
                                <div class="img-meta white-color">
                                    <h5 class="h5-md">Field Greens Pizza</h5>
                                    <div class="txt-block-rating">
                                        <div class="stars-rating">
                                            <span>4.38</span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span>(41)</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>


                    <!-- IMAGE #5 -->
                    <div class="gallery-img">
                        <a href="{{ asset('home-assets/images/gallery/img-05.jpg') }}" class="image-link">
                            <div class="hover-overlay">
                                <img class="img-fluid" src="{{ asset('home-assets/images/gallery/img-05.jpg') }}"
                                    alt="gallery-image" />
                                <div class="item-overlay"></div>

                                <!-- Image Meta -->
                                <div class="img-meta white-color">
                                    <h5 class="h5-md">Mini Chicken Pizza</h5>
                                    <div class="txt-block-rating">
                                        <div class="stars-rating">
                                            <span>5</span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span>(86)</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>


                    <!-- IMAGE #6 -->
                    <div class="gallery-img">
                        <a href="{{ asset('home-assets/images/gallery/img-06.jpg') }}" class="image-link">
                            <div class="hover-overlay">
                                <img class="img-fluid" src="{{ asset('home-assets/images/gallery/img-06.jpg') }}"
                                    alt="gallery-image" />
                                <div class="item-overlay"></div>

                                <!-- Image Meta -->
                                <div class="img-meta white-color">
                                    <h5 class="h5-md">Eggs Benedict Burger</h5>
                                    <div class="txt-block-rating">
                                        <div class="stars-rating">
                                            <span>4.65</span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span>(30)</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>


                    <!-- IMAGE #7 -->
                    <div class="gallery-img">
                        <a href="{{ asset('home-assets/images/gallery/img-07.jpg') }}" class="image-link">
                            <div class="hover-overlay">
                                <img class="img-fluid" src="{{ asset('home-assets/images/gallery/img-07.jpg') }}"
                                    alt="gallery-image" />
                                <div class="item-overlay"></div>

                                <!-- Image Meta -->
                                <div class="img-meta white-color">
                                    <h5 class="h5-md">Double Bacon Burger</h5>
                                    <div class="txt-block-rating">
                                        <div class="stars-rating">
                                            <span>4.85</span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span>(71)</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>


                    <!-- IMAGE #8 -->
                    <div class="gallery-img">
                        <a href="{{ asset('home-assets/images/gallery/img-08.jpg') }}" class="image-link">
                            <div class="hover-overlay">
                                <img class="img-fluid" src="{{ asset('home-assets/images/gallery/img-08.jpg') }}"
                                    alt="gallery-image" />
                                <div class="item-overlay"></div>

                                <!-- Image Meta -->
                                <div class="img-meta white-color">
                                    <h5 class="h5-md">Classic California</h5>
                                    <div class="txt-block-rating">
                                        <div class="stars-rating">
                                            <span>4.64</span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span>(17)</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>


                </div>
            </div> <!-- End col-x -->
        </div> <!-- END IMAGES HOLDER -->


    </section> <!-- END GALLERY-3 -->





    <!-- ABOUT-3
                                                                       ============================================= -->
    <section id="about-3" class="wide-60 about-section division">
        <div class="container">
            <div class="row d-flex align-items-center">


                <!-- ABOUT IMAGE -->
                <div class="col-md-5 col-lg-6">
                    <div class="about-3-img text-center mb-40">
                        <img class="img-fluid" src="{{ asset('home-assets/images/about-03-img.png') }}"
                            alt="about-image">
                    </div>
                </div>


                <!-- ABOUT TEXT -->
                <div class="col-md-7 col-lg-6">
                    <div class="about-3-txt mb-40">

                        <!-- Title -->
                        <div class="text-center mb-3">
                            <img src="{{ asset('home-assets/images/logo-araya-horizontal.png') }}" class="mb-3"
                                alt="Logo Araya" style="height:50px">
                            <h6 class="h6-sm coffee-color mb-5">Dapatkan Cake Terbaik Untuk Moment Spesialmu Hanya di
                                Araya Cake Pekanbaru</h6>
                            <hr>
                            <h3 class="h3-sm yellow-color">Jam Buka Outlet</h3>

                            <!-- Text -->
                            <p class="p-md">
                                *Buka Setiap Hari, Pukul 07.00 – 22.00
                            </p>
                            <p class="p-md">
                                Jl. Soekarno - Hatta No.77, Sidomulyo Barat, Kota Pekanbaru, Riau
                            </p>

                            <a href="#gmap" class="btn btn-lg btn-red tra-white-hover">Lihat Map</a>


                        </div>



                    </div>
                </div> <!-- END ABOUT TEXT -->


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END ABOUT-3 -->



    <!-- GOOGLE MAP
                                                                           ============================================= -->
    <div id="gmap">
        <div class="google-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.696207234422!2d101.41555227412404!3d0.4482737638120649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5a9a4a95e8c8b%3A0xdd3455db93f2afe1!2sAraya%20Cake!5e0!3m2!1sid!2sid!4v1692882306246!5m2!1sid!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
@endsection

@section('script')
@endsection

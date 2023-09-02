@extends('layouts.app')

@section('content')
    <!-- PAGE HERO
                           ============================================= -->
    <div id="product-page" class="page-hero-section division">
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
                                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                                <li class="breadcrumb-item"><a
                                                        href="#">{{ $product->category->name }}</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Title -->
                        <h2 class="h2-xl">{{ $product->name }}</h2>

                    </div>
                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </div>
    <!-- END PAGE HERO -->




    <!-- SINGLE PRODUCT
                           ============================================= -->
    <section id="product-1" class="pt-100 single-product division">
        <div class="container">
            <div class="row">


                <!-- PRODUCT IMAGE -->
                <div class="col-lg-7">
                    <div class="product-preview">


                        <!-- TABS CONTENT -->
                        <div class="tabs-content">

                            @foreach ($product->images as $i => $image)
                                <div id="tab-{{ $image->id }}-img"
                                    class="tab-content text-center {{ $i == 0 ? 'displayed' : '' }}">
                                    <img class="img-fluid" src="{{ asset('images/' . $image->name) }}"
                                        alt="{{ $product->name }} Image"
                                        style="width: 500px; height: 600px; object-fit: cover" />
                                </div>
                            @endforeach

                        </div> <!-- END TABS CONTENT -->


                        <!-- TABS NAVIGATION -->
                        <div class="tabs-nav">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <ul class="tabs-2 clearfix">

                                        @foreach ($product->images as $image)
                                            <li class="tab-link {{ $i == 0 ? 'displayed' : '' }}"
                                                data-tab="tab-{{ $image->id }}-img">
                                                <img src="{{ asset('images/' . $image->name) }}"
                                                    alt="{{ $product->name }} Image" style="object-fit: cover" />
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div> <!-- END TABS NAVIGATION -->


                    </div>
                </div> <!-- END PRODUCT IMAGE -->


                <!-- PRODUCT DISCRIPTION -->
                <div class="col-lg-5">
                    <div class="product-description">

                        <!-- TITLE -->
                        <div class="project-title">

                            <!-- Title -->
                            <h2 class="h2-lg">{{ $product->name }}</h2>

                            <!-- Rating -->
                            <div class="stars-rating">
                                {{-- <span>4.38</span> --}}
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                {{-- <span>(3 Customer Reviews)</span> --}}
                            </div>

                            <!-- Price -->
                            <div class="project-price">
                                <h4 class="h4-xl yellow-color">
                                    {{-- <span class="old-price">$9.95</span>  --}}
                                    Rp {{ $product->price / 1000 }}k</h4>
                            </div>

                        </div>

                        <!-- TEXT -->
                        <div class="product-txt">

                            <!-- Text -->
                            <p class="p-md grey-color">
                                {{ $product->description }}
                            </p>

                            <!-- Product Data -->
                            <div class="product-info">
                                <p>Ukuran Cake:
                                    <span>{{ floor($product->length) . 'cm x ' . floor($product->width) . 'cm x ' . floor($product->height) . 'cm' }}</span>
                                </p>
                                <p>Rasa: <span>Chocolate, Cheese, Cream</span></p>
                                <p>Tags: <span>{{ $product->meta_keyword }}</span></p>
                            </div>

                            <input class="qty" type="number" min="1" max="1000" value="1">

                            <!-- Add To Cart -->
                            <div class="add-to-cart-btn bg-yellow ico-20 text-center">
                                <a class="add-to-cart-list" data-product-id="{{ $product->id }}">
                                    <span class="flaticon-shopping-bag"></span> Add to Cart
                                </a>
                            </div>

                            <!-- List -->
                            <ul class="txt-list">
                                <li class="list-item">
                                    <p class="p-sm">Pemesanan kue tanpa tag ready bersifat preorder dengan 2 hari
                                        pemesanan</p>
                                </li>
                                <li class="list-item">
                                    <p class="p-sm">Contoh Pesan Lain</p>
                                </li>
                            </ul>

                        </div> <!-- END TEXT-->

                    </div>
                </div> <!-- END PRODUCT DISCRIPTION -->


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section>




    <!-- SINGLE PRODUCT DATA
                           ============================================= -->
    <section id="product-1-data" class="wide-80 single-product-data division">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="">


                        <!-- TABS NAVIGATION -->
                        <div class="tabs-nav">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <ul class="tabs-1 clearfix">

                                        <!-- TAB-1 LINK -->
                                        <li class="tab-link current" data-tab="tab-1">
                                            <h5 class="h5-sm">Description</h5>
                                        </li>

                                        <!-- TAB-2 LINK -->
                                        <li class="tab-link" data-tab="tab-2">
                                            <h5 class="h5-sm">Reviews (3)</h5>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div> <!-- END TABS NAVIGATION -->


                        <!-- TABS CONTENT -->
                        <div class="tabs-content">


                            <!-- TAB-1 CONTENT -->
                            <div id="tab-1" class="tab-content current">

                                <!-- Text -->
                                <p>Donec sodales, nibh vel tristique aliquet, nisi libero suscipit diam, sed tempus ante
                                    nulla ut purus.
                                    Donec dolor magna aliquet suscipit in magna dignissim, porttitor hendrerit. Nunc
                                    gravida ultrices a felis eget faucibus. Praesent lorem purus, quis mollis nisi
                                    laoreet vitae consequat tortor
                                </p>

                                <!-- List -->
                                <ul class="txt-list">

                                    <li class="list-item">
                                        <p><span class="txt-500">Quaerat sodales sapien undo euismod purus blandit
                                                velna</span> vitae auctor
                                            a congue magna tempor sapien eget gravida laoreet turpis urna augue, viverra
                                            a augue eget, dictum tempor diam pulvinar consectetur purus efficitur ipsum
                                            primis in cubilia laoreet augue donec
                                        </p>
                                    </li>

                                    <li class="list-item">
                                        <p><span class="txt-500">Nemo ipsam egestas volute turpis dolores</span> ut
                                            aliquam quaerat sodales
                                            sapien congue augue egestas volutpat egestas magna suscipit egestas magna
                                            ipsum vitae purus
                                            efficitur ipsum primis in cubilia undo pretium a purus pretium ligula
                                        </p>
                                    </li>

                                </ul>

                                <!-- Text -->
                                <p>Aliqum mullam blandit tempor sapien gravida donec ipsum, at porta justo. Velna vitae
                                    auctor congue magna
                                    nihil impedit ligula risus. Mauris donec ociis et magnis sapien sagittis sapien sem
                                    congue tempor gravida donec enim ipsum porta justo integer odio velna a purus
                                    efficitur ipsum primis in cubilia laoreet augue egestas luctus donec purus and
                                    blandit sodales mpedit ligula risus. Mauris donec ociis et magnis sapien
                                </p>

                            </div> <!-- END TAB-1 CONTENT -->


                            <!-- TAB-2 CONTENT -->
                            <div id="tab-2" class="tab-content">


                                <!-- TESTIMONIAL #1 -->
                                <div class="review-2 b-bottom">

                                    <!-- Testimonial Author Avatar -->
                                    <div class="review-2-avatar">
                                        <img src="images/review-author-1.jpg" alt="testimonial-avatar">
                                    </div>

                                    <!-- Testimonial Text -->
                                    <div class="review-2-txt">

                                        <!-- Rating -->
                                        <div class="stars-rating stars-lg">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>

                                        <!-- Testimonial Author -->
                                        <div class="review-info clearfix">
                                            <h5 class="h5-xs">Sean McMarthy</h5>
                                            <span class="grey-color">December 4, 2020</span>
                                        </div>

                                        <!-- Text -->
                                        <p>Etiam sapien sem at sagittis congue an augue massa varius egestas a suscipit
                                            magna tempus
                                            an aliquet porta vitae auctor aliqum mullam blandit tempor sapien gravida
                                            congue eros magna
                                            nihil impedit tempor. Semper lacus cursus porta lectus enim ipsum
                                        </p>

                                    </div>

                                </div> <!--END  TESTIMONIAL #1 -->


                                <!-- TESTIMONIAL #3 -->
                                <div class="review-2 b-bottom">

                                    <!-- Testimonial Author Avatar -->
                                    <div class="review-2-avatar">
                                        <img src="images/review-author-4.jpg" alt="testimonial-avatar">
                                    </div>

                                    <!-- Testimonial Text -->
                                    <div class="review-2-txt">

                                        <!-- Rating -->
                                        <div class="stars-rating stars-lg">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>

                                        <!-- Testimonial Author -->
                                        <div class="review-info clearfix">
                                            <h5 class="h5-xs">Leslie Serpas</h5>
                                            <span class="grey-color">November 28, 2020</span>
                                        </div>

                                        <!-- Text -->
                                        <p>Etiam sapien sem at sagittis congue an augue massa varius egestas a suscipit
                                            magna tempus
                                            aliquet porta vitae auctor aliqum mullam blandit tempor sapien gravida
                                            congue eros magna
                                            nihil impedit tempor lacus
                                        </p>

                                    </div>

                                </div> <!--END  TESTIMONIAL #2 -->


                                <!-- TESTIMONIAL #3 -->
                                <div class="review-2">

                                    <!-- Testimonial Author Avatar -->
                                    <div class="review-2-avatar">
                                        <img src="images/review-author-3.jpg" alt="testimonial-avatar">
                                    </div>

                                    <!-- Testimonial Text -->
                                    <div class="review-2-txt">

                                        <!-- Rating -->
                                        <div class="stars-rating stars-lg">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>

                                        <!-- Testimonial Author -->
                                        <div class="review-info clearfix">
                                            <h5 class="h5-xs">Robert Peterson</h5>
                                            <span class="grey-color">November 11, 2020</span>
                                        </div>

                                        <!-- Text -->
                                        <p>Etiam sapien sem at sagittis congue an augue massa varius egestas a suscipit
                                            magna tempus
                                            an aliquet porta vitae auctor aliqum mullam blandit tempor sapien gravida
                                            congue eros magna
                                            nihil impedit tempor. Semper lacus cursus porta lectus enim ipsum feugiat
                                            primis in ultrice
                                            ligula tempus undo auctor ipsum and mauris lectus enim ipsum
                                        </p>

                                    </div>

                                </div> <!--END  TESTIMONIAL #3 -->


                            </div> <!-- END TAB-2 CONTENT -->


                        </div> <!-- END TABS CONTENT -->


                    </div>
                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section>
    <!-- END SINGLE PRODUCT DATA -->




    <!-- MENU-6
                           ============================================= -->
    <section id="menu-6" class="bg-lightgrey wide-70 menu-section division">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="section-title mb-60 text-center">

                        <!-- Title 	-->
                        <h2 class="h2-xl">Lihat cake lainnya</h2>

                    </div>
                </div>
            </div>


            <div class="row">

                @foreach ($relatedProducts as $item)
                    <div class="col-sm-6 col-lg-3">
                        <div class="menu-6-item bg-white">

                            <!-- IMAGE -->
                            <div class="menu-6-img rel">
                                <div class="hover-overlay">

                                    <!-- Image -->
                                    <img class="img-fluid" src="{{ asset('images/' . $item->images->first()->name) }}"
                                        alt="menu-image" />

                                    <!-- Item Code -->
                                    <span class="item-code bg-tra-dark">Code: 0850</span>

                                    <!-- Zoom Icon -->
                                    <div class="menu-img-zoom ico-25">
                                        <a href="{{ asset('images/' . $item->images->first()->name) }}" class="image-link">
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
                                <div class="like-ico ico-25">
                                    <a href="#"><span class="flaticon-heart"></span></a>
                                </div>

                                <!-- Title -->
                                <h5 class="h5-sm">{{ $item->name }}</h5>

                                <!-- Description -->
                                <p class="grey-color">
                                    {{ $item->description }}
                                </p>

                                <!-- Price -->
                                <div class="menu-6-price bg-coffee">
                                    <h5 class="h5-xs yellow-color">Rp. {{ $item->price / 1000 }}k</h5>
                                </div>

                                <!-- Add To Cart -->
                                <div class="add-to-cart bg-yellow ico-10">
                                    <a href="{{ route('addToCart') }}"><span class="flaticon-shopping-bag"></span> Add to
                                        Cart</a>
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach

            </div> <!-- End row -->
        </div> <!-- End container -->
    </section>
    <!-- END MENU-6 -->
@endsection

@section('style')
@endsection

@section('sript')
@endsection

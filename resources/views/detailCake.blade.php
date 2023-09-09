@extends('layouts.app')

@section('content')
    <!-- SINGLE PRODUCT
                                                               ============================================= -->
    <section id="product-1" class="pt-100 pb-60 single-product division">
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
                                <h4 class="h4-xl araya-color">
                                    {{-- <span class="old-price">$9.95</span>  --}}
                                    Rp. {{ $product->price / 1000 }}k</h4>
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
                            <div class="mb-3 d-flex product-info">
                                @if ($cart->where('product_id', $product->id)->first())
                                    <p>
                                        Jumlah di keranjang:
                                    </p>
                                    <input class="qty ml-auto" name="quantity" type="number" min="0" max="999"
                                        value="{{ $cart->where('product_id', $product->id)->first()->quantity }}"
                                        data-cart-id="{{ $cart->where('product_id', $product->id)->first()->id }}">
                                    <a class="d-flex align-items-center ml-3">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                @else
                                    <a class="btn btn-red tra-red-hover add-to-cart-list"
                                        data-product-id="{{ $product->id }}">
                                        <span class="flaticon-shopping-bag"></span> Order
                                    </a>
                                @endif



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
                                    {{-- <span class="item-code bg-tra-dark">Code: 0850</span> --}}

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
                                {{-- <div class="like-ico ico-25">
                                                    <a href="#"><span class="flaticon-heart"></span></a>
                                                </div> --}}

                                <a href="{{ route('detail.cake', $item->slug) }}" target="_blank">
                                    <h5 class="h5-sm product-title">
                                        {{ $item->name }}
                                    </h5>

                                    <p class="grey-color product-desc">
                                        {{ $item->description }}
                                    </p>
                                </a>

                                <div class="menu-6-price bg-shadow">
                                    <h5 class="h5-xs araya-color">RP. {{ $item->price / 1000 }}k</h5>
                                </div>

                                @if ($cart->where('product_id', $item->id)->first())
                                    <input class="qty" name="quantity" type="number" min="0" max="999"
                                        value="{{ $cart->where('product_id', $item->id)->first()->quantity }}"
                                        data-cart-id="{{ $cart->where('product_id', $item->id)->first()->id }}">
                                @else
                                    <div class="add-to-cart bg-araya ico-10" style="cursor: pointer">
                                        <a class="add-to-cart-list" data-product-id="{{ $item->id }}"
                                            style="color:white">
                                            <span class="flaticon-shopping-bag"></span> Order
                                        </a>
                                    </div>
                                @endif

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

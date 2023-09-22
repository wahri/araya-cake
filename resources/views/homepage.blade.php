@extends('layouts.app')

@push('style')
@endpush

@push('sript')
@endpush

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
                    <div class="text-center col-lg-12">
                        <ul class="clearfix tabs-1 ico-55 red-tabs">

                            @foreach ($categoryWithProduct as $i => $category)
                                <li class="tab-link {{ $i == 0 ? 'current' : '' }}" data-tab="tab-{{ $category->id }}">
                                    <img src="{{ asset('home-assets/icons/' . $category->big_icon) }}"
                                        alt="{{ $category->name }} Icon" class="custom-icon mr-5">
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
                                <div class="col-12">
                                    {{-- <livewire:product-list :categoryProductId="$category->id" />

                                    @include('components.product') --}}

                                    <div class="container">
                                        <section id="menu-6" class="menu-section division">

                                            <div class="row">

                                                @foreach ($category->products as $product)
                                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3"
                                                        wire:key="{{ $product->id }}">
                                                        <div class="bg-white menu-6-item">


                                                            <div class="menu-6-img rel">
                                                                <div class="hover-overlay">

                                                                    <img class="img-fluid"
                                                                        src="{{ asset('images/' . $product->images->first()->name) }}"
                                                                        alt="menu-image" />

                                                                    <div class="menu-img-zoom ico-25">
                                                                        <a href="{{ asset('images/' . $product->images->first()->name) }}"
                                                                            class="image-link">
                                                                            <span class="flaticon-zoom"></span>
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="menu-6-txt rel">

                                                                <div class="item-rating">
                                                                    <div class="stars-rating stars-lg">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                    </div>
                                                                </div>

                                                                <a href="{{ route('detail.cake', $product->slug) }}"
                                                                    target="_blank">
                                                                    <h5 class="h5-sm product-title">
                                                                        {{ $product->name }}
                                                                    </h5>

                                                                    <p class="grey-color product-desc">
                                                                        {{ $product->description }}
                                                                    </p>
                                                                </a>

                                                                <div class="menu-6-price bg-shadow">
                                                                    <h5 class="h5-xs araya-color">RP.
                                                                        {{ $product->price / 1000 }}k</h5>
                                                                </div>

                                                                <div x-data="{
                                                                    open: false,
                                                                    quantity: {{ $cart->where('product_id', $product->id)->first()->quantity ?? 0 }},
                                                                    cartId: {{ $cart->where('product_id', $product->id)->first()->id ?? 0 }},
                                                                    loading: false,
                                                                    productId: {{ $product->id }},
                                                                
                                                                    init() {
                                                                        if (this.quantity > 0) {
                                                                            this.open = true
                                                                        } else {
                                                                            this.open = false
                                                                        }
                                                                    },
                                                                
                                                                    async addToCart() {
                                                                        try {
                                                                            const response = await axios.post('{{ route('addToCart') }}', {
                                                                                _token: '{{ csrf_token() }}',
                                                                                product_id: this.productId
                                                                            })
                                                                            console.log(response)
                                                                            this.quantity = response.data.quantity
                                                                            this.cartId = response.data.cartId
                                                                
                                                                            var cartCountElements = $('#cart-count, #cart-count-mobile');
                                                                
                                                                            cartCountElements.each(function() {
                                                                                var element = $(this);
                                                                                if (element.is(':hidden')) {
                                                                                    element.css('display', 'block');
                                                                                }
                                                                                element.text(response.data.cart_count);
                                                                            });
                                                                
                                                                            cartCountElements.removeClass('animated').css('display', 'block').text(response.data.cart_count).addClass('animated');
                                                                        } finally {
                                                                            this.open = true
                                                                        }
                                                                    },
                                                                
                                                                    async updateCart() {
                                                                        try {
                                                                            if (this.quantity > 0) {
                                                                                this.loading = true
                                                                                response = await axios.post('{{ route('updateCart') }}', {
                                                                                    _token: '{{ csrf_token() }}',
                                                                                    cartId: this.cartId,
                                                                                    qty: this.quantity
                                                                                })
                                                                
                                                                                var cartCountElements = $('#cart-count, #cart-count-mobile');
                                                                
                                                                                cartCountElements.each(function() {
                                                                                    var element = $(this);
                                                                                    if (element.is(':hidden')) {
                                                                                        element.css('display', 'block');
                                                                                    }
                                                                                    element.text(response.data.cart_count);
                                                                                });
                                                                
                                                                                cartCountElements.removeClass('animated').css('display', 'block').text(response.data.cart_count).addClass('animated');
                                                                            } else {
                                                                                this.loading = true
                                                                                response = await axios.post('{{ route('deleteCart') }}', {
                                                                                    _token: '{{ csrf_token() }}',
                                                                                    cartId: this.cartId
                                                                                })
                                                                
                                                                                this.open = false
                                                                
                                                                                var cartCountElements = $('#cart-count, #cart-count-mobile');
                                                                
                                                                                cartCountElements.each(function() {
                                                                                    var element = $(this);
                                                                                    if (element.is(':hidden')) {
                                                                                        element.css('display', 'block');
                                                                                    }
                                                                                    element.text(response.data.cart_count);
                                                                                });
                                                                
                                                                                cartCountElements.removeClass('animated').css('display', 'block').text(response.data.cart_count).addClass('animated');
                                                                            }
                                                                        } finally {
                                                                            this.loading = false
                                                                        }
                                                                    },
                                                                }">
                                                                    <div x-show="open">
                                                                        <input type="number" class="qty" min="0"
                                                                            max="99" :disabled="loading"
                                                                            x-model="quantity"
                                                                            x-on:change="await updateCart()" />
                                                                    </div>

                                                                    <div x-show="!open">
                                                                        <div class="add-to-cart bg-araya ico-10"
                                                                            style="cursor: pointer">
                                                                            <a class="add-to-cart-list"
                                                                                data-product-id="{{ $product->id }}"
                                                                                style="color:white"
                                                                                x-on:click="await addToCart()">
                                                                                <span class="flaticon-shopping-bag"></span>
                                                                                Order
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>

                                        </section>

                                        <div class="bg-color-01 page-pagination division">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <nav aria-label="Page navigation">
                                                            <ul class="pagination justify-content-center">
                                                                <li class="page-item disabled"><a class="page-link"
                                                                        href="#" tabindex="-1"><i
                                                                            class="fas fa-angle-left"></i></a></li>
                                                                <li class="page-item active"><a class="page-link"
                                                                        href="#">1 <span
                                                                            class="sr-only">(current)</span></a></li>
                                                                <li class="page-item"><a class="page-link"
                                                                        href="#">2</a></li>
                                                                <li class="page-item"><a class="page-link"
                                                                        href="#">3</a></li>
                                                                <li class="page-item"><a class="page-link"
                                                                        href="#">4</a></li>
                                                                <li class="page-item"><a class="page-link"
                                                                        href="#"><i
                                                                            class="fas fa-angle-right"></i></a></li>
                                                            </ul>
                                                        </nav>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach


                </div>
            </section>

            <div class="mt-5 text-center">

                <a href="{{ route('product') }}" class="btn btn-lg btn-red tra-red-hover">Lihat Cake Lainnya!</a>
            </div>
        </div>
    </section>


    <section id="promo-11" class="bg-scroll bg-image reviews-section division">
        <div class="container">
            <div class="row d-flex align-items-center">

                <div class="col-md-5 col-lg-6">
                    <div class="mb-40 pbox-11-txt white-color">

                        <!-- Title -->
                        <h3 class="h3-lg">The</h3>
                        <h2>Custom Cake</h2>

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
                    <div class="mb-40 pbox-11-img">

                        <!-- Image -->
                        <img class="img-fluid" src="{{ asset('home-assets/images/promo-11-img.png') }}"
                            alt="promo-image" />

                    </div>
                </div>




            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END PROMO-11 -->




    <!-- TESTIMONIALS-1
                                                                                                                                                                                       ============================================= -->
    <div id="reviews-1" class="reviews-section division">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 testimonials">


                    <!-- TRANSPARENT QUOTE ICON -->
                    <div class="quote-icon"></div>


                    <!-- TESTIMONIALS CONTENT -->
                    <div class="flexslider">
                        <ul class="text-center slides">

                            @foreach ($reviews as $review)
                                <li class="review-1">
                                    <div class="review-1-txt">

                                        <!-- Testimonial Author Avatar -->
                                        <img src="{{ asset('images/' . $review->image->name) }}"
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
                                        <a href="{{ $review->link_to_review }}" target="_blank"
                                            class="testimonial-autor">
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
                    <div class="mb-40 text-center about-3-img">
                        <img class="img-fluid" src="{{ asset('home-assets/images/about-03-img.png') }}"
                            alt="about-image">
                    </div>
                </div>


                <!-- ABOUT TEXT -->
                <div class="col-md-7 col-lg-6">
                    <div class="mb-40 about-3-txt">

                        <!-- Title -->
                        <div class="mb-3 text-center">
                            {{-- <img src="{{ asset('home-assets/images/logo-araya-horizontal.png') }}" class="mb-3"
                                alt="Logo Araya" style="height:50px"> --}}
                            {{-- <h6 class="mb-5 h6-sm coffee-color">Dapatkan Cake Terbaik Untuk Moment Spesialmu Hanya di
                                Araya Cake Pekanbaru</h6> --}}
                            {{-- <hr> --}}
                            <h3 class="h3-sm araya-color" style="font-weight: 700">
                                Buka Setiap Hari
                            </h3>

                            <!-- Text -->
                            <p class="p-md">
                                *Pukul 07.00 – 22.00
                            </p>
                            <p class="p-md">
                                Jl. Soekarno - Hatta No.77, Sidomulyo Barat, Kota Pekanbaru, Riau
                            </p>

                            <a href="#lokasi" class="btn btn-lg btn-red tra-araya-hover">Lihat Map</a>


                        </div>



                    </div>
                </div> <!-- END ABOUT TEXT -->


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END ABOUT-3 -->



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

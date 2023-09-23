@extends('layouts.app')

@push('style')
@endpush

@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

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
                                <div class="text-center col-lg-12">
                                    <ul class="clearfix tabs-2">

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
                    <div class="product-description" x-data="{
                        orderButton: false,
                        quantity: {{ $cart->where('product_id', $product->id)->first()->quantity ?? 0 }},
                        cartId: {{ $cart->where('product_id', $product->id)->first()->id ?? 0 }},
                        loading: false,
                        productId: {{ $product->id }},
                    
                        init() {
                            if (this.quantity > 0) {
                                this.orderButton = true
                            } else {
                                this.orderButton = false
                            }
                        },

                        async deleteCart() {
                            Swal.fire({
                                title: 'Hapus item dari keranjang?',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#ff4f3f',
                                cancelButtonColor: '#d3d3d3',
                                confirmButtonText: 'Ya, Hapus item!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    this.loading = true
                                    axios.post('{{ route('deleteCart') }}', {
                                        _token: '{{ csrf_token() }}',
                                        cartId: this.cartId
                                    })
                                    location.reload()
                                    Swal.fire(
                                        'Berhasil!',
                                        'Item dihapus dari keranjang.',
                                        'success'
                                    )
                                }
                            })
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
                                this.orderButton = true
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
                    
                                    this.orderButton = false
                    
                                    var cartCountElements = $('#cart-count, #cart-count-mobile');
                    
                                    cartCountElements.each(function() {
                                        var element = $(this);
                                        if (element.is(':hidden')) {
                                            element.css('display', 'block');
                                        }
                                        element.text(response.data.cart_count);
                                    });
                    
                                    cartCountElements.removeClass('animated').css('display', 'block').text(response.data.cart_count).addClass('animated');
                    
                                    console.log(this.orderButton);
                                }
                            } finally {
                                this.loading = false
                            }
                        },
                    }">

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

                            <div x-show="orderButton">
                                <div class="mb-3 d-flex product-info">
                                    <p>
                                        Jumlah di keranjang:
                                    </p>
                                    <input type="number" class="ml-auto qty" min="0" max="99"
                                        :disabled="loading" x-model="quantity" x-on:change="await updateCart()" />
                                    <a class="ml-3 d-flex align-items-center" style="cursor: pointer"  x-on:click="deleteCart()">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="mb-3" x-show="!orderButton">
                                <a class="btn btn-red tra-red-hover add-to-cart-list" data-product-id="{{ $product->id }}"
                                    style="color:white" x-on:click="await addToCart()">
                                    <span class="flaticon-shopping-bag"></span>
                                    Order
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

    <!-- MENU-6
                                                                                               ============================================= -->
    <section id="menu-6" class="bg-lightgrey wide-70 menu-section division">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="text-center section-title mb-60">

                        <!-- Title 	-->
                        <h2 class="h2-xl">Lihat cake lainnya</h2>

                    </div>
                </div>
            </div>


            <div class="row">

                @foreach ($relatedProducts as $eachProduct)
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3" wire:key="{{ $eachProduct->id }}">
                        <div class="bg-white menu-6-item">


                            <div class="menu-6-img rel">
                                <div class="hover-overlay">

                                    <img class="img-fluid"
                                        src="{{ asset('images/' . $eachProduct->images->first()->name) }}"
                                        alt="menu-image" />

                                    <div class="menu-img-zoom ico-25">
                                        <a href="{{ asset('images/' . $eachProduct->images->first()->name) }}"
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

                                <a href="{{ route('detail.cake', $eachProduct->slug) }}" target="_blank">
                                    <h5 class="h5-sm product-title">
                                        {{ $eachProduct->name }}
                                    </h5>
                                </a>

                                <div class="d-flex">
                                    <div class="menu-6-price bg-shadow">
                                        <h5 class="h5-xs araya-color">RP.
                                            {{ $eachProduct->price / 1000 }}k</h5>
                                    </div>

                                    <div class="ml-auto" x-data="{
                                        open: false,
                                        quantity: {{ $cart->where('product_id', $eachProduct->id)->first()->quantity ?? 0 }},
                                        cartId: {{ $cart->where('product_id', $eachProduct->id)->first()->id ?? 0 }},
                                        loading: false,
                                        productId: {{ $eachProduct->id }},
                                    
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
                                            <input type="number" class="qty" min="0" max="99"
                                                :disabled="loading" x-model="quantity"
                                                x-on:change="await updateCart()" />
                                        </div>

                                        <div x-show="!open">
                                            <div class="add-to-cart bg-araya ico-10" style="cursor: pointer">
                                                <a class="add-to-cart-list" data-product-id="{{ $eachProduct->id }}"
                                                    style="color:white" x-on:click="await addToCart()">
                                                    <span class="flaticon-shopping-bag"></span>
                                                    Order
                                                </a>
                                            </div>
                                        </div>
                                    </div>

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

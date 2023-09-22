@extends('layouts.app')

@section('content')
    <!-- PAGE HERO
                                                                                                                                                   ============================================= -->
    {{-- <div id="product-page" class="page-hero-section division">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="hero-txt text-center white-color">

                        <h2 class="h2-xl">
                            Semua Cake</h2>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    
    <div class="container-fluid">
        <div class="row wide-60">

            <div class="col-lg-3 col-md-12 mb-60">
                <div class="card" id="filterCategory">
                    <div class="card-header">
                        <span><i class="fas fa-sliders-h"></i> Filter</span>
                    </div>
                    <div class="card-body">

                        <h5 class="font-size-16">Kategori Produk</h5>

                        <div class="group-category">
                            @foreach ($categoryProduct as $category)
                                <div class="checkbox-container">
                                    <input class="check-category" type="checkbox" value="" id="category{{ $category->id }}">
                                    <label class="label-category" for="category{{ $category->id }}">
                                        {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-12">
                <div class="row">
                    @foreach ($categoryWithProduct->products as $product)
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4" wire:key="{{ $product->id }}">
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

                                    <a href="{{ route('detail.cake', $product->slug) }}" target="_blank">
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
                                            <input type="number" class="qty" min="0" max="99"
                                                :disabled="loading" x-model="quantity"
                                                x-on:change="await updateCart()" />
                                        </div>

                                        <div x-show="!open">
                                            <div class="add-to-cart bg-araya ico-10" style="cursor: pointer">
                                                <a class="add-to-cart-list" data-product-id="{{ $product->id }}"
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
                    @endforeach
                </div>
            </div>


        </div>
    </div>

@endsection

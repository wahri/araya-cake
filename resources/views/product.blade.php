@extends('layouts.app')

@push('script')
    <script>
        $('.collapse').collapse()
    </script>
    <script>
        function updateQueryString(key, value) {
            var uri = window.location.href;
            var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
            var separator = uri.indexOf('?') !== -1 ? "&" : "?";

            if (uri.match(re)) {
                return uri.replace(re, '$1' + key + "=" + value + '$2');
            } else {
                return uri + separator + key + "=" + value;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var deleteFilters = document.querySelectorAll('.badge-filter');
            var urlParams = new URLSearchParams(window.location.search);

            deleteFilters.forEach(deleteFilter => {
                deleteFilter.addEventListener('click', function(event) {
                    event.preventDefault();
                    newUrl = new URLSearchParams('')

                    // Tentukan nama parameter yang akan dihapus (dalam hal ini, 'jenis[]')
                    var parameterName = $(deleteFilter).data('jenisfilter');
                    var valueFilter = $(deleteFilter).data('valuefilter');

                    console.log(parameterName)
                    console.log(valueFilter)
                    console.log(urlParams)

                    urlParams.delete(parameterName, valueFilter);

                    // Perbarui URL tanpa parameter yang dihapus
                    var newUrl = window.location.pathname + '?' + urlParams.toString();
                    history.pushState({}, '', newUrl);

                    // Refresh halaman
                    location.reload();
                })
            });
        });
    </script>
@endpush

@section('content')
    <!-- PAGE HERO
                                                                                                                                                                                                                                                                                               ============================================= -->
    {{-- <div id="product-page" class="page-hero-section division">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="text-center hero-txt white-color">

                        <h2 class="h2-xl">{{ $categoryWithProduct->name }}</h2>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <form action="{{ route('product') }}" method="get">
        <div class="container-fluid" x-data="{ openFilter: {{ request()->hasAny(['search', 'category', 'jenis']) ? 'true' : 'false' }} }">
            <div class="row">
                <div class="col-12">
                    <div class="search__container">
                        <p class="search__title">
                            Cari cake kesukaan mu di Araya
                        </p>
                        <div class="mb-3 d-flex justify-content-center">
                            <button type="button" class="mr-3 btn btn-araya tra-araya-hover" id="filterButton"
                                x-on:click="openFilter = ! openFilter">
                                <i class="fas fa-sliders-h"></i>
                            </button>

                            <input class="search__input" type="text" name="search" placeholder="Cari nama kue"
                                value="{{ $_GET['search'] ?? '' }}">
                            <button type="submit" class="ml-3 btn btn-araya tra-araya-hover" style="border-radius: 25px">
                                Cari
                            </button>
                        </div>
                        <div class="mb-3 d-flex justify-content-center" style="gap: 10px">
                            @if (request()->hasAny(['search', 'category', 'jenis']))
                                <span>
                                    Filter by :
                                </span>
                            @endif
                            @if (isset($_GET['search']) && !empty($_GET['search']))
                                <button type="button" class="badge-filter" data-jenisFilter="search"
                                    data-valueFilter="{{ $_GET['search'] }}">
                                    {{ $_GET['search'] }}
                                    <span class="ml-3">
                                        <i class="fas fa-times"></i>
                                    </span>
                                </button>
                            @endif
                            @isset($_GET['category'])
                                <button type="button" class="badge-filter" data-jenisFilter="category"
                                    data-valueFilter="{{ $_GET['category'] }}">
                                    {{ $_GET['category'] }}
                                    <span class="ml-3">
                                        <i class="fas fa-times"></i>
                                    </span>
                                </button>
                            @endisset
                            @foreach ($categoryProduct as $category)
                                @foreach ($category->subCategories as $subCategory)
                                    @if (isset($_GET['jenis']))
                                        @if (in_array($subCategory->slug, $_GET['jenis']))
                                            <button type="button" class="badge-filter" data-jenisFilter="jenis[]"
                                                data-valueFilter="{{ $subCategory->slug }}">
                                                {{ $subCategory->name }}
                                                <span class="ml-3">
                                                    <i class="fas fa-times"></i>
                                                </span>
                                            </button>
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pt-50">
                <div id="filterCategory" class="col-lg-3 col-md-4 mb-60" x-show="openFilter" x-transition>

                    <div class="card-header d-flex">
                        <span><i class="fas fa-sliders-h"></i> Filter</span>
                        <span class="ml-auto" style="cursor: pointer" x-on:click="openFilter = false">
                            <i class="fas fa-times"></i>
                        </span>
                    </div>
                    <div class="card-body">
                        @foreach ($categoryProduct as $category)
                            <h5 class="font-size-16">{{ $category->name }}</h5>
                            <div class="group-category">

                                @foreach ($category->subCategories as $subCategory)
                                    <div class="checkbox-container">
                                        <input class="check-category" name="jenis[]" onChange="this.form.submit()"
                                            type="checkbox" value="{{ $subCategory->slug }}"
                                            id="jenis{{ $subCategory->id }}"
                                            @if (isset($_GET['jenis'])) {{ in_array($subCategory->slug, $_GET['jenis']) ? 'checked' : '' }} @endif
                                            @if (isset($_GET['category'])) {{ in_array($subCategory->slug, $categoryProductByFilter->subCategories->pluck('slug')->toArray()) ? 'checked' : '' }} @endif>
                                        <label class="label-category" for="jenis{{ $subCategory->id }}">
                                            {{ $subCategory->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg col-sm" id="menu-6">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="bg-white menu-6-item">


                                    <div class="menu-6-img rel">
                                        <div class="text-center hover-overlay">

                                            <img class="img-fluid"
                                                src="{{ asset('images/' . $product->images->first()->name) }}"
                                                alt="menu-image" style="width: 300px" />

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

                                            {{-- <p class="grey-color product-desc">
                                                {{ $product->description }}
                                            </p> --}}
                                        </a>

                                        <div class="d-flex">
                                            <div class="menu-6-price bg-shadow">
                                                <h5 class="h5-xs araya-color">RP.
                                                    {{ $product->price / 1000 }}k</h5>
                                            </div>
    
                                            <div class="ml-auto" x-data="{
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
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection

@extends('layouts.app')

@push('style')
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        function startBounceAnimation() {
            const cartBadge = document.querySelector('#cart-count');
            const cartBadgeMobile = document.querySelector('#cart-count-mobile');

            cartBadge.classList.remove('animated');
            void cartBadge.offsetWidth;
            cartBadge.classList.add('animated');

            cartBadgeMobile.classList.remove('animated');
            void cartBadgeMobile.offsetWidth;
            cartBadgeMobile.classList.add('animated');
        }

        function addBadge(response) {
            if ($('#cart-count').is(':hidden')) {
                $('#cart-count').css('display', 'block');
            }
            $('#cart-count').text(response.data.cart_count);

            if ($('#cart-count-mobile').is(':hidden')) {
                $('#cart-count-mobile').css('display', 'block ');
            }
            $('#cart-count-mobile').text(response.data.cart_count);

            $("#loader").delay(100).fadeOut();
            $("#loader-wrapper").delay(100).fadeOut("fast");
            startBounceAnimation();
        }

        function addToCart() {
            const productId = {{ $product->id }}
            const rasa = $('#pilihan_rasa').val()
            const quantity = $('#quantity').val()
            const message = $('#cake_message').val()

            const cake_message = 'Note: ' + message
            $("#loader").delay(100).fadeIn();
            $("#loader-wrapper").delay(100).fadeIn("fast");

            axios({
                    method: 'post',
                    url: '{{ route('addToCart') }}',
                    data: {
                        product_id: productId,
                        quantity: quantity,
                        cake_message: cake_message,
                        pilihan_type: rasa,
                    }
                }).then(function(response) {
                    addBadge(response)
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        $(function() {
            $('#tambahKeranjang').click(addToCart)
            $('#pesanSekarang').click(function() {

                addToCart()

                window.location.replace("{{ route('cart') }}");
            })
        });
    </script>

    <script>
        (function() {
            window.inputNumber = function(el) {
                var min = el.attr("min") || false;
                var max = el.attr("max") || false;
                const harga = {{ $product->price }}


                var els = {};

                els.dec = el.prev();
                els.inc = el.next();

                el.each(function() {
                    init($(this));
                });

                function init(el) {
                    els.dec.on("click", function() {
                        decrement()

                        $('#total_harga').text(formatRupiah(harga * el[0].value))
                    });
                    els.inc.on("click", function() {
                        increment()

                        $('#total_harga').text(formatRupiah(harga * el[0].value))
                    });

                    function decrement() {
                        var value = el[0].value;
                        value--;
                        if (!min || value >= min) {
                            el[0].value = value;
                        }
                    }

                    function increment() {
                        var value = el[0].value;
                        value++;
                        if (!max || value <= max) {
                            el[0].value = value++;
                        }
                    }

                    function formatRupiah(angka) {
                        var reverse = angka.toString().split('').reverse().join('');
                        var ribuan = reverse.match(/\d{1,3}/g);
                        var formatted = ribuan.join('.').split('').reverse().join('');
                        return 'Rp ' + formatted + ',-';
                    }
                }
            };
        })();

        inputNumber($(".input-number"));
    </script>
@endpush

@section('content')
    <section id="product-1" class="pt-100 pb-60 single-product division">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-4">
                    <div class="product-preview">


                        <!-- TABS CONTENT -->
                        <div class="tabs-content">

                            @foreach ($product->images as $i => $image)
                                <div id="tab-{{ $image->id }}-img"
                                    class="tab-content cake text-center {{ $i == 0 ? 'displayed' : '' }}">
                                    <img class="img-fluid" src="{{ asset('images/' . $image->name) }}"
                                        alt="{{ $product->name }} Image" />
                                </div>
                            @endforeach

                        </div> <!-- END TABS CONTENT -->


                        <!-- TABS NAVIGATION -->
                        <div class="tabs-nav">
                            <div class="row">
                                <div class="text-center col-lg-12">
                                    <ul class="clearfix tabs-2">

                                        @foreach ($product->images as $i => $image)
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
                </div>

                <div class="mb-20 col-md-5">
                    <div class="product-description">


                        <div class="project-title">


                            <h4 class="h4-lg">{{ $product->name }}</h4>


                            <div class="stars-rating">

                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>


                            <div class="project-price">
                                <h4 class="h4-sm araya-color">
                                    {{-- <span class="old-price">$9.95</span>  --}}
                                    {{ 'Rp. ' . number_format($product->price, 0, ',', '.') . ',-' }}
                                </h4>
                            </div>

                        </div>


                        <div class="product-txt">


                            <p class="p-md grey-color">
                                {{ $product->description }}
                            </p>

                            <div class="mb-3 product-info">
                                @if ($product->length != null || $product->width != null || $product->height != null)
                                    <p class="my-auto">Ukuran Cake:
                                        <span>{{ $product->length ? floor($product->length) . 'cm x ' : '' }}{{ $product->width ? floor($product->width) . 'cm x ' : '' }}{{ $product->height ? floor($product->height) . 'cm' : '' }}</span>
                                    </p>
                                @endif
                                @if ($product->meta_keyword)
                                    <p>Tags: <span>{{ $product->meta_keyword }}</span></p>
                                @endif

                                @if ($product->pilihan_type_id != null)
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-7">
                                            <p>
                                                Varian Isi Cake:
                                            </p>
                                        </div>
                                        <div class="my-auto col-5">
                                            <select class="form-control" name="pilihan_rasa" id="pilihan_rasa">
                                                <option value="" selected disabled>Pilihan rasa</option>
                                                @foreach (json_decode($product->pilihan_type->isi_pilihan) as $isi)
                                                    <option value="{{ $isi }}">{{ $isi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif

                            </div>






                            <ul class="txt-list">
                                @foreach (preg_split('/- /', $product->information, -1, PREG_SPLIT_NO_EMPTY) as $info)
                                    <li class="list-item">
                                        <p class="p-sm">{{ $info }}</p>
                                    </li>
                                @endforeach
                            </ul>

                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-4 shadow card" style="border-radius: 20px">
                        <div class="mb-3 row">
                            <div class="col-12 d-flex justify-content-between">
                                <div>
                                    <span class="input-number-decrement">–</span><input name="quantity" class="input-number"
                                        id="quantity" type="text" value="1" min="1" max="10"
                                        disabled><span class="input-number-increment">+</span>
                                </div>

                                <span class="my-auto font-weight-bold" id="total_harga">
                                    {{ 'Rp. ' . number_format($product->price, 0, ',', '.') . ',-' }}
                                </span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-12">
                                <textarea name="cake_message" id="cake_message" class="form-control" rows="2" placeholder="Masukkan pesan"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="button" id="tambahKeranjang" class="btn btn-block btn-secondary">
                                    Tambah Keranjang
                                </button>
                                <button type="button" id="pesanSekarang" class="btn btn-block btn-primary">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </section>


    <section id="menu-6" class="bg-lightgrey wide-70 menu-section division">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="text-center section-title mb-60">

                        <!-- Title 	-->
                        <h3 class="h3-xl">Lihat cake sejenis</h3>

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

                                    <div class="ml-auto">
                                        <div class="add-to-cart bg-araya ico-10" style="cursor: pointer">
                                            <a class="add-to-cart-list"
                                                href="{{ route('detail.cake', $eachProduct->slug) }}" target="_blank">
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


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section>
    <!-- END MENU-6 -->
@endsection

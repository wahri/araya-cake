@extends('layouts.app')

@section('content')
    {{-- <div id="cart-page" class="page-hero-section division">
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
                                                <li class="breadcrumb-item"><a href="demo-1.html">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Title -->
                        <h2 class="h2-xl">Shopping Cart</h2>

                    </div>
                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </div> --}}




    <!-- CART PAGE
                                           ============================================= -->
    <section id="cart-1" class="wide-100 cart-page division">
        <div class="container">


            <!-- CART TABLE -->
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-table mb-70">
                        <table id="cartListTable">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 50%">Product</th>
                                    <th scope="col" class="text-center" style="width: 15%">Price</th>
                                    <th scope="col" class="text-center" style="width: 10%">Quantity</th>
                                    <th scope="col" class="text-center" style="width: 15%">Total</th>
                                    <th scope="col" class="text-center" style="width: 10%">Delete</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($carts as $cart)
                                    <tr>
                                        <td data-label="Product" class="product-name">

                                            <!-- Preview -->
                                            <div class="cart-product-img"><img
                                                    src="{{ asset('images/' . $cart->product->images->first()->name) }}"
                                                    alt="cart-preview"></div>

                                            <!-- Description -->
                                            <div class="cart-product-desc">
                                                <h5 class="h5-sm">{{ $cart->product->name }}</h5>
                                                <p class="p-sm">
                                                    {{ implode(' ', array_slice(str_word_count($cart->product->description, 2), 0, 10)) }}
                                                </p>
                                            </div>

                                        </td>

                                        <td class="text-center" data-label="Price" class="product-price">
                                            <h5 class="h6-md">Rp. {{ number_format($cart->product->price, 0, ',', '.') }}
                                            </h5>
                                        </td>
                                        <td class="text-center" data-label="Quantity" class="product-qty">
                                            <input class="qty" name="quantity" type="number" min="0"
                                                max="999" value="{{ $cart->quantity }}"
                                                data-cart-id="{{ $cart->id }}">
                                        </td>
                                        <td class="text-center" data-label="Total" class="product-price-total">
                                            <h5 class="h6-md" id="totalProduct-{{ $cart->id }}">Rp.
                                                {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}
                                            </h5>
                                        </td>
                                        <td class="text-center" data-label="Delete" class="td-trash"><i
                                                class="far fa-trash-alt"></i></td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div> <!-- END CART TABLE -->


            <!-- CART CHECKOUT -->
            <div class="row justify-content-center">

                <!-- DISCOUNT COUPON -->
                <div class="col-lg-7">
                    <div class="discount-coupon row pt-15">

                        <div class="col-md-8 col-lg-7">
                            <form class="discount-form">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Coupon Code" id="discount-code">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-salmon tra-salmon-hover">Apply Coupon</button>
                                    </span>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>

                <!-- CHECKOUT -->
                <div class="col-lg-5">
                    <div class="cart-checkout bg-lightgrey">

                        <!-- Title -->
                        <h5 class="h5-lg text-center">Ringkasan Pemesanan</h5>

                        <!-- Table -->
                        <table>
                            <tbody>
                                <tr>
                                    <td>Subtotal</td>
                                    <td> </td>
                                    <td class="text-right" id="subtotal">
                                        Rp. {{ number_format($totalPrice, 0, ',', '.') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Diskon</td>
                                    <td> </td>
                                    <td class="text-right">
                                        Rp. 0
                                    </td>
                                </tr>
                                <tr class="last-tr">
                                    <td>Total</td>
                                    <td> </td>
                                    <td class="text-right" id="total">
                                        Rp. {{ number_format($totalPrice, 0, ',', '.') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Button -->
                        <a href="{{ route('processOrder') }}" target="_blank"
                            class="btn btn-md btn-success tra-hover-success"><i class="fab fa-whatsapp"></i> Pesan
                            Sekarang</a>

                    </div>
                </div> <!-- END CHECKOUT -->

            </div>
            <!-- END CART CHECKOUT -->


        </div> <!-- End container -->
    </section> <!-- END CART PAGE -->
@endsection

@section('style')
@endsection

@section('script')
    <script>
        // $(document).ready(function() {
        //     $('.qty').on('change', function() {
        //         var cartId = $(this).data('cart-id');
        //         var qty = $(this).val();

        //         $("#loader").delay(100).fadeIn();
        //         $("#loader-wrapper").delay(100).fadeIn("fast");
        //         $.ajax({
        //             url: "{{ route('updateCart') }}",
        //             method: "POST",
        //             data: {
        //                 _token: '{{ csrf_token() }}',
        //                 cartId: cartId,
        //                 qty: qty
        //             },
        //             success: function(response) {
        //                 if ($('#cart-count').is(':hidden')) {
        //                     $('#cart-count').css('display', 'block');
        //                 }
        //                 $('#cart-count').text(response.cart_count);

        //                 if ($('#cart-count-mobile').is(':hidden')) {
        //                     $('#cart-count-mobile').css('display', 'block ');
        //                 }
        //                 $('#cart-count-mobile').text(response.cart_count);

        //                 $('#totalProduct-' + cartId).text(response.totalProduct);

        //                 $('#subtotal').text(response.totalPrice);
        //                 $('#total').text(response.totalPrice);

        //                 $("#loader").delay(100).fadeOut();
        //                 $("#loader-wrapper").delay(100).fadeOut("fast");
        //                 startBounceAnimation();
        //             },
        //             error: function(xhr, status, error) {
        //                 console.log(xhr.responseText);
        //             }
        //         });
        //     });
        // });
    </script>
@endsection

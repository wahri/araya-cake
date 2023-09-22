@extends('layouts.app')

@push('style')
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $(function() {
            $('#tes').click(function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'Do you want to continue',
                    icon: 'error',
                    confirmButtonText: 'Cool'
                })
            })
        })
    </script>
@endpush


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
                <div class="col-lg-8 col-md-12">

                    <div class="cart-table mb-70">
                        <table id="cartListTable">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col" class="text-center">Price</th>
                                    <th scope="col" class="text-center" style="width: 10%">Quantity</th>
                                    <th scope="col" class="text-center">Total</th>
                                    <th scope="col" class="text-center" style="width: 10%">Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($carts as $cart)
                                    <tr x-data="{
                                        quantity: {{ $cart->quantity ?? 0 }},
                                        cartId: {{ $cart->id ?? 0 }},
                                        loading: false,
                                    
                                        init() {
                                            if (this.quantity > 0) {
                                                this.open = true
                                            } else {
                                                this.open = false
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
                                                        } else {
                                                            this.quantity = {{ $cart->quantity }}
                                                        }
                                                    })
                                                }
                                            } finally {
                                                this.loading = false
                                            }
                                        },
                                    
                                    }">
                                        <td data-label="Product" class="product-name">

                                            <!-- Preview -->
                                            <div class="cart-product-img"><img
                                                    src="{{ asset('images/' . $cart->product->images->first()->name) }}"
                                                    alt="cart-preview"></div>

                                            <!-- Description -->
                                            <div class="cart-product-desc">
                                                <p class="font-weight-bold">{{ $cart->product->name }}</p>
                                            </div>

                                        </td>

                                        <td class="text-center" data-label="Price" class="product-price">
                                            <p>Rp. {{ number_format($cart->product->price, 0, ',', '.') }}
                                            </p>
                                        </td>
                                        <td class="text-center" data-label="Quantity" class="product-qty">
                                            <input class="qty" name="quantity" type="number" min="0"
                                                max="99" :disabled="loading" x-model="quantity"
                                                x-on:change="await updateCart()">
                                        </td>
                                        <td class="text-center" data-label="Total" class="product-price-total">
                                            <p id="totalProduct-{{ $cart->id }}">Rp.
                                                {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}
                                            </p>
                                        </td>
                                        <td data-label="Delete" class="td-trash text-center">
                                            <i class="far fa-trash-alt" x-on:click="deleteCart()"></i>
                                        </td>

                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <a href="{{ route('product') }}" class="btn btn-araya tra-araya-hover">
                                                Belanja Sekarang
                                            </a>
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 border p-4">
                    <form method="POST" action="{{ route('processOrder') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-12 text-center">
                                <h5 class="h5-sm mb-20">
                                    Informasi Pemesanan
                                </h5>
                                <input type="text" name="name" class="custom-input mb-3" placeholder="Nama Lengkap">
                                <input type="text" name="phone" class="custom-input mb-3" placeholder="No Whatsapp">
                                <input type="text" name="email" class="custom-input mb-3" placeholder="Email">
                                <input type="text" name="address" class="custom-input mb-3" placeholder="Alamat Lengkap">
                                <input type="text" name="notes" class="custom-input mb-3" placeholder="Catatan">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
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
                                    <button type="submit" class="btn btn-md btn-success tra-hover-success mb-3">
                                        <i class="fab fa-whatsapp"></i> Pesan Sekarang</button>
                                    <p class="text-center">
                                        Ayo!
                                        <a href="{{ route('register') }}" class="araya-color">
                                            Daftar Sebagai Member
                                        </a>
                                        untuk dapatkan promo menarik
                                    </p>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> <!-- END CART TABLE -->



        </div> <!-- End container -->
    </section> <!-- END CART PAGE -->
@endsection

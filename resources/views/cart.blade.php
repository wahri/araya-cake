@extends('layouts.app')

@push('style')
@endpush

@push('script')
    @if (session('success'))
        <script>
            $(function() {
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 1500
                })
            });
        </script>
    @endif

    <script>
        $(function() {

            $('.qty').change(function() {
                const cartId = $(this).data("cartid")
                const quantity = $(this).val()

                const totalItem = $('#totalProduct-' + cartId)

                if (quantity < 1) {
                    $(this).val(1)
                } else {
                    axios({
                            method: 'post',
                            url: '{{ route('updateCart') }}',
                            data: {
                                cartId: cartId,
                                qty: quantity,
                            }
                        }).then(function(response) {
                            totalItem.text(response.data.totalProduct)
                            $('#subtotal').text(response.data.totalPrice)
                            $('#total').text(response.data.totalPrice)
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                }
            })

            $('.deleteCartButton').click(function() {
                const cartId = $(this).data("cartid")

                Swal.fire({
                    title: 'Yakin mau menghapus?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios({
                                method: 'post',
                                url: '{{ route('deleteCart') }}',
                                data: {
                                    cartId: cartId,
                                }
                            }).then(function(response) {
                                location.reload()
                                Swal.fire(
                                    'Dihapus!',
                                    'Berhasil menghapus item dari cart.',
                                    'success'
                                )
                            })
                            .catch(function(error) {
                                console.log(error);
                            });
                    }
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
                    <div class="text-center hero-txt white-color">

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
                <div class="col-lg-8 col-sm-12">

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

                                @foreach ($carts as $cart)
                                    <tr>
                                        <td data-label="Product" class="product-name">

                                            <!-- Preview -->
                                            <div class="cart-product-img">
                                                <img class="lazyload" data-src="{{ asset('images/' . $cart->product->images->first()->name) }}"
                                                    alt="cart-preview">
                                            </div>

                                            <!-- Description -->
                                            <div class="cart-product-desc">
                                                <p class="font-weight-bold">{{ $cart->product->name }}</p>
                                                <p class="p-sm">
                                                    Rasa: {{ $cart->pilihan_type }}<br>
                                                    {{ $cart->cake_message }}
                                                </p>
                                            </div>

                                        </td>

                                        <td class="text-center" data-label="Price" class="product-price">
                                            <p>
                                                {{ 'Rp. ' . number_format($cart->product->price, 0, ',', '.') . ',-' }}
                                            </p>
                                        </td>
                                        <td class="text-center" data-label="Quantity" class="product-qty">
                                            <div>
                                                <input type="number" class="qty" name="quantity" id="quantity"
                                                    value="{{ $cart->quantity }}" min="1" max="99"
                                                    data-cartid="{{ $cart->id }}">
                                            </div>
                                        </td>
                                        <td class="text-center" data-label="Total" class="product-price-total">
                                            <p id="totalProduct-{{ $cart->id }}">
                                                {{ 'Rp. ' . number_format($cart->product->price * $cart->quantity, 0, ',', '.') . ',-' }}
                                            </p>
                                        </td>
                                        <td data-label="Delete" class="text-center td-trash">
                                            <i class="far fa-trash-alt deleteCartButton"
                                                data-cartid="{{ $cart->id }}"></i>
                                        </td>

                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <a href="{{ route('product') }}" class="btn btn-araya tra-araya-hover btn-sm">
                                            Cari Cake Lainnya
                                        </a>
                                    </td>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="p-4 border col-lg-4 col-sm-12">
                    <form method="POST" action="{{ route('processOrder') }}">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <h5 class="h5-lg">
                                    Total Harga
                                </h5>
                                <h5 class="mb-3 h5-sm" id="total">
                                    {{ $totalPriceFormat }}
                                </h5>
                                <textarea placeholder="Tambahkan notes untuk pesanan (optional)" name="notes" id="notes" rows="3"
                                    class="mb-3 form-control" style="font-weight: 300">{{ old('notes') }}</textarea>

                                <div class="row mb-30">
                                    <div class="col-12 d-flex justify-content-center">
                                        <ul class="radio-switch">
                                            <li class="radio-switch__item">
                                                <input class="radio-switch__input ri5-sr-only" type="radio"
                                                    name="order_type" id="radio-1" value="Delivery" checked>
                                                <label class="radio-switch__label" for="radio-1">Delivery</label>
                                            </li>

                                            <li class="radio-switch__item">
                                                <input class="radio-switch__input ri5-sr-only" type="radio"
                                                    name="order_type" id="radio-2" value="Pick Up">
                                                <label class="radio-switch__label" for="radio-2">Ambil di toko</label>
                                                <div aria-hidden="true" class="radio-switch__marker"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="row mb-30">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="delivery_date" style="font-weight: 500">Pilih tanggal</label>
                                            <input type="date" name="delivery_date" id="delivery_date"
                                                class="form-control"
                                                min="{{ \Carbon\Carbon::now()->addDays(3)->format('Y-m-d') }}">
                                            <small class="text-center" style="font-weight: 300">*Minimal pemesanan 3
                                                hari</small>
                                            @error('delivery_date')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="text-center col-12">
                                        <h5 class="mb-20 h5-sm">
                                            Informasi Pemesanan
                                        </h5>
                                        <div class="mb-3 input-group">
                                            <input type="text" name="name" class="custom-input"
                                                placeholder="Nama Lengkap" value="{{ old('name', $user->name ?? '') }}">
                                            @error('name')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="mb-3 input-group">
                                            <input type="text" name="phone" class="custom-input"
                                                placeholder="No Whatsapp"
                                                value="{{ old('phone', $user->profile->phone ?? '') }}">
                                            @error('phone')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="mb-3 input-group">
                                            <input type="text" name="email" class="custom-input"
                                                placeholder="Email" value="{{ old('email', $user->email ?? '') }}">
                                            @error('email')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="mb-3 input-group">
                                            <textarea placeholder="Tambahkan Alamat Lengkap" name="address" id="address" rows="3"
                                                class="mb-3 form-control" style="font-weight: 300">{{ old('address', $user->profile->address ?? '') }}</textarea>
                                            @error('address')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="text-center col-12">
                                        <button type="submit" class="mb-3 btn btn-md btn-success tra-hover-success">
                                            <i class="fab fa-whatsapp"></i> Pesan Sekarang</button>
                                    </div>
                                </div>
                                <p class="text-center">
                                    Ayo!
                                    <a href="{{ route('register') }}" class="araya-color">
                                        Daftar Sebagai Member
                                    </a>
                                    untuk dapatkan promo menarik
                                </p>

                            </div>
                        </div>
                    </form>
                </div>
            </div> <!-- END CART TABLE -->



        </div> <!-- End container -->
    </section> <!-- END CART PAGE -->
@endsection

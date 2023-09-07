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
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Delete</th>
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

                                        <td data-label="Price" class="product-price">
                                            <h5 class="h6-md">Rp. {{ number_format($cart->product->price, 0, ',', '.') }}</h5>
                                        </td>
                                        <td data-label="Quantity" class="product-qty">
                                            <input class="qty" type="number" min="1" max="20"
                                                value="{{ $cart->quantity }}">
                                        </td>
                                        <td data-label="Total" class="product-price-total">
                                            <h5 class="h6-md">Rp. {{ number_format(($cart->product->price * $cart->quantity), 0, ',', '.')   }}</h5>
                                        </td>
                                        <td data-label="Delete" class="td-trash"><i class="far fa-trash-alt"></i></td>

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

                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Coupon Code" id="discount-code">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-salmon tra-salmon-hover">Apply Coupon</button>
                                    </span>
                                </div>

                            </form>
                        </div>

{{-- 
                        <div class="col-md-4 col-lg-5 text-right">
                            <a onClick="window.location.reload()" class="btn btn-md btn-salmon tra-salmon-hover">Update
                                Cart</a>
                        </div> --}}

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
                                    <td class="text-right">
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
                                    <td class="text-right">
                                        Rp. {{ number_format($totalPrice, 0, ',', '.') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Button -->
                        <a href="#" class="btn btn-md btn-salmon tra-salmon-hover">Pesan Sekarang</a>

                    </div>
                </div> <!-- END CHECKOUT -->


            </div>
            <!-- END CART CHECKOUT -->


        </div> <!-- End container -->
    </section> <!-- END CART PAGE -->
@endsection

@section('style')
@endsection

@section('sript')
    {{-- <script>
        $(function() {
            let documentFormatListTable = $('#cartListTable').DataTable({
                searching: true,
                autoWidth: false,
                processing: true,
                serverSide: true,
                pageLength: 10,
                ajax: {
                    url: "{{ route('getCartList') }}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                },
                columns: [{
                        data: 'name',
                        name: 'name',
                        defaultContent: "-"
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        defaultContent: "-",
                        render: function(data, type, row) {
                            return moment(data).format("LLL");
                        }
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                        defaultContent: "-",
                        render: function(data, type, row) {
                            return moment(data).format("LLL");
                        }
                    },
                    {
                        render: function(data, type, row) {
                            var editUrl = '{{ route('dashboard.document-type.edit', ':id') }}';
                            editUrl = editUrl.replace(':id', row.id);

                            // <a data-id=${row.id} name="edit" href="${editUrl}"  class="btn btn-success">
                            //         <i class="fas fa-edit"></i>
                            //     </a>
                            return `
                            <div class="form-group">
                                <button data-id=${row.id} name="delete" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        `
                        }
                    },

                ],
            });
        })
    </script> --}}
@endsection

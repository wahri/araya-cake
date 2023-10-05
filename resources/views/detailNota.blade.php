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
@endpush


@section('content')




    <!-- CART PAGE
                                                                                                                                                                                                                                               ============================================= -->
    <section id="cart-1" class="wide-100 cart-page division">
        <div class="container">


            <!-- CART TABLE -->
            <div class="row">
                <div class="col-12 justify-content-center my-auto">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="h3-lg">
                                Terima kasih
                            </h3>
                            <p>
                                Pesanan telah diterima, silahkan lakukan konfirmasi pesanan dan pembayaran melalui Whatsapp dengan klik tombol di bawah
                            </p>
                            <a href="{{ route('confirmWhatsapp', $nota->nota_no) }}" target="_blank" class="mb-3 btn btn-md btn-success tra-hover-success">
                                <i class="fab fa-whatsapp"></i> Konfirmasi Pesanan</a>
                        </div>
                    </div>
                </div>
            </div> <!-- END CART TABLE -->



        </div> <!-- End container -->
    </section> <!-- END CART PAGE -->
@endsection

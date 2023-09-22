@extends('layouts.app')

@push('style')
@endpush

@push('script')
@endpush

@section('content')
    <!-- PAGE HERO
                       ============================================= -->
    <div id="about-page" class="page-hero-section division">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="text-center hero-txt white-color">

                        <!-- Title -->
                        <h2 class="h2-xl">Hubungi Kami</h2>

                    </div>
                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </div> <!-- END PAGE HERO -->


    <!-- ABOUT-4
                       ============================================= -->
    <section id="about-4" class="wide-60 about-section division">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset('home-assets/images/logo-araya-horizontal.png') }}" style="width: 300px" alt="footer-logo" />
                    <!-- Title -->
                    <h5 class="mt-3 h5-sm">Hubungi Kami</h5>

                    <!-- Address -->
                    <p>Jl. Soekarno - Hatta No.77, Sidomulyo Barat,</p>
                    <p>Kota Pekanbaru, Riau</p>

                    <!-- Contacts -->
                    <p class="foo-email txt-500 mt-15"><a href="mailto:admin@gmail.com">admin@arayacake.com</a></p>
                    <p>
                        <span class="">
                            <a href="tel:123456789">
                                <i class="fab -fa-whatsapp"></i>
                            </a>
                        </span>
                    </p>
                </div>

                <div class="col-6">
                    <form action="">
                        <input type="text" placeholder="Nama" class="mb-3 form-control">
                        <input type="text" placeholder="Email" class="mb-3 form-control">
                        <input type="text" placeholder="Whatsapp" class="mb-3 form-control">
                        <textarea name="" class="mb-3 form-control" placeholder="Pesan"></textarea>
                        <button class="btn btn-araya tra-araya-hover">Kirim</button>
                    </form>
                </div>


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END ABOUT-4 -->

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

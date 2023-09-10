@extends('layouts.app')

@push('style')
@endpush

@push('sript')
@endpush

@section('content')
    <!-- PAGE HERO
               ============================================= -->
    <div id="about-page" class="page-hero-section division">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="hero-txt text-center white-color">

                        <!-- Title -->
                        <h2 class="h2-xl">Tentang Araya</h2>

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
                <!-- ABOUT TEXT -->
                <div class="col-md-7 col-lg-6">
                    <div class="about-4-txt mb-40">

                        <!-- Title -->
                        <h2 class="h2-sm">Sejarah Araya Cake Pekanbaru</h2>

                        <!-- Text -->
                        <p class="p-md">
                            Araya cake berdiri pada September 2017 di Pekanbaru. Usaha ini dimulai dari produksi donat
                            rumahan dengan mini outlet pertama di pertigaan Jalan Balam, Sukajadi. Melihat antusias peminat
                            donat kala itu, pemilik Araya Cake kemudian memutuskan untuk menggeluti usaha ini dengan
                            mengembangkan ke produksi lain seperti cake dan roti
                        </p>

                        <p class="p-md">
                            Araya Cake berkomitmen untuk memberikan <strong>Best Product</strong> dengan harga terbaik untuk
                            konsumen setia kami
                        </p>

                        <!-- Image -->
                        <img class="img-fluid" src="{{ 'home-assets/images/img-10.jpg' }}" alt="about-image">

                    </div>
                </div> <!-- END ABOUT TEXT -->


                <!-- ABOUT IMAGE -->
                <div class="col-md-5 col-lg-6">
                    <div class="about-4-img mb-40">

                        <!-- Image -->
                        <img class="img-fluid mb-40" src="{{ 'home-assets/images/img-15.jpg' }}" alt="about-image">

                        <h5 class="h5-sm border-bottom">
                            Visi
                        </h5>
                        <ul class="txt-list">
                            <li class="list-item">
                                <p class="p-md">
                                    Menjadi toko kue pilihan utama konsumen dalam setiap moment
                                </p>
                            </li>
                        </ul>

                        <h5 class="h5-sm border-bottom">
                            Misi
                        </h5>
                        <ul class="txt-list">
                            <li class="list-item">
                                <p class="p-md">
                                    Memberi produk, cita rasa & pelayanan yang terbaik serta berkualitas
                                </p>
                            </li>
                            <li class="list-item">
                                <p class="p-md">
                                    Mengembangkan inovasi produk Araya Cake sesuai kebutuhan konsumen
                                </p>
                            </li>
                        </ul>

                    </div>
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



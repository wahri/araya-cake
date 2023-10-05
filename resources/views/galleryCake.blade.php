@extends('layouts.app')

@push('style')
@endpush

@push('sript')
@endpush

@section('content')
    <!-- PAGE HERO
                   ============================================= -->
    <div class="page-hero-section division">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="hero-txt text-center white-color">

                        <div id="breadcrumb">
                            <div class="row">
                                <div class="col">
                                    <div class="breadcrumb-nav">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#">Profil</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Galeri Cake</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Title -->
                        <h2 class="h2-xs">Galeri Cake Araya</h2>

                    </div>
                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </div> <!-- END PAGE HERO -->


    <!-- GALLERY-2
       ============================================= -->
    <section id="gallery-2" class="gallery-section division">
        <div class="container">
            <div class="row">


                @foreach ($products as $product)
                    <div class="col-sm-6 col-lg-3">
                        <div class="gallery-img">
                            <a href="{{ asset('images/' . $product->images->first()->name) }}" class="image-link">
                                <div class="hover-overlay">
                                    <img class="img-fluid" src="{{ asset('images/' . $product->images->first()->name) }}"
                                        alt="gallery-image" />
                                    <div class="item-overlay"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach



            </div> <!-- End row -->
        </div> <!-- End container -->
    </section>
    <!-- END GALLERY-2 -->
@endsection

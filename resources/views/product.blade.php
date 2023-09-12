@extends('layouts.app')

@section('content')
    <!-- PAGE HERO
                                                                                                                                                   ============================================= -->
    <div id="product-page" class="page-hero-section division">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="hero-txt text-center white-color">

                        <h2 class="h2-xl">{{ $categoryWithProduct->name }}</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="container-fluid">
        <div class="row wide-60">
            
            <livewire:filter-product />
            
            <div class="col-lg-9 col-md-12">
                <livewire:product-list :categoryProductId="$categoryWithProduct->id" />
            </div>
    
    
        </div>
    </div>

@endsection

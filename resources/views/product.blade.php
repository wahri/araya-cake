@extends('layouts.app')

@push('script')
@endpush

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search__container">
                        <h1 class="h1-lg araya-color text-center">
                            Cari cake kesukaan mu di Araya
                        </h1>
                        {{-- <div class="mb-3 d-flex justify-content-center">
                            <input class="search__input" type="text" name="search" placeholder="Cari nama kue"
                                value="{{ $_GET['search'] ?? '' }}">
                            <button type="submit" class="ml-3 btn btn-araya tra-araya-hover" style="border-radius: 25px">
                                Cari
                            </button>
                        </div> --}}
                    </div>
                </div>
            </div>

            {{-- <div class="row pt-50">

                <div class="col-lg col-sm" id="menu-6">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="bg-white menu-6-item">


                                    <div class="menu-6-img rel">
                                        <div class="text-center hover-overlay">

                                            <img class="img-fluid"
                                                src="{{ asset('images/' . $product->images->first()->name) }}"
                                                alt="menu-image" style="width: 300px" />

                                            <div class="menu-img-zoom ico-25">
                                                <a href="{{ asset('images/' . $product->images->first()->name) }}"
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

                                        <a href="{{ route('detail.cake', $product->slug) }}" target="_blank">
                                            <h5 class="h5-sm product-title">
                                                {{ $product->name }}
                                            </h5>
                                        </a>

                                        <div class="d-flex">
                                            <div class="menu-6-price bg-shadow">
                                                <h5 class="h5-xs araya-color">RP.
                                                    {{ $product->price / 1000 }}k</h5>
                                            </div>

                                            <div class="ml-auto">
                                                <div class="add-to-cart bg-araya ico-10" style="cursor: pointer">
                                                    <a target="_blank" class="add-to-cart-list" style="color:white"
                                                        href="{{ route('detail.cake', $product->slug) }}">
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
                    </div>
                </div>
            </div> --}}
        </div>

        <div id="promo-3" class="pt-50 promo-section division">
            <div class="container">
                <div class="row d-flex align-items-center">

                    @foreach ($categoryProduct as $category)
                    <div class="col-md-6">
                        @if ($category->image)
                        <a href="{{ route('categoryProduct', $category->slug) }}">
                            <div class="pbox-3 mb-30">
                                <div class="hover-overlay"> 
                                    <img class="img-fluid" src="{{ asset('images/' . $category->image->name) }}" alt="{{ $category->name }}" />
                                </div> 
                            </div>
                        </a>
                            
                        @endif
                    </div>
                        
                    @endforeach


                </div>    <!-- End row -->		
            </div>	   <!-- End container -->	
        </div>	

@endsection

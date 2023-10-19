@extends('layouts.app')

@push('script')
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="search__container">
                    <h1 class="text-center h1-lg araya-color">
                        Cari cake kesukaan mu di Araya
                    </h1>
                </div>
            </div>
        </div>

    </div>

    <div id="promo-3" class="pt-50 promo-section division">
        <div class="container">
            <div class="row d-flex align-items-center">

                @foreach ($categoryProduct as $category)
                    @if ($category->image)
                        <div class="col-md-4">
                            <a href="{{ route('categoryProduct', $category->slug) }}">
                                <div class="pbox-3 mb-30">
                                    <div class="hover-overlay">
                                        <img class="img-fluid lazyload"
                                            data-src="{{ asset('images/' . $category->image->name) }}"
                                            alt="{{ $category->name }}" />
                                    </div>
                                </div>
                            </a>

                        </div>
                    @endif
                @endforeach


            </div> <!-- End row -->
        </div> <!-- End container -->
    </div>
@endsection

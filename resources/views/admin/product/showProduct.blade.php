@extends('admin.layouts.app')

@section('content')
    <div class="page-content">

        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Detail Cake</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Cake Management</a></li>
                                <li class="breadcrumb-item active">Detail Cake</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="container-fluid">

            <div class="page-content-wrapper">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-5">
                                        <div class="product-detail">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                                        aria-orientation="vertical">
                                                        @foreach ($product->images as $i => $image)
                                                            <a class="nav-link {{ $i == 0 ? 'active' : '' }}"
                                                                id="product-{{ $image->id }}-tab" data-bs-toggle="pill"
                                                                href="#product-{{ $image->id }}" role="tab">
                                                                <img src="{{ asset('images/' . $image->name) }}"
                                                                    alt=""
                                                                    class="img-fluid mx-auto d-block tab-img rounded">
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-9">
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        @foreach ($product->images as $i => $image)
                                                            <div class="tab-pane fade show {{ $i == 0 ? 'active' : '' }}"
                                                                id="product-{{ $image->id }}" role="tabpanel">
                                                                <div class="product-img">
                                                                    <img src="{{ asset('images/' . $image->name) }}"
                                                                        alt="" class="img-fluid mx-auto d-block"
                                                                        data-zoom="{{ $i == 0 ? asset('images/' . $image->name) : '' }}">
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <!-- end product img -->
                                    </div>
                                    <div class="col-xl-7">
                                        <div class="mt-4 mt-xl-3">
                                            <a href="#" class="text-primary">{{ $product->category->name }}</a>
                                            <h5 class="mt-1 mb-3">{{ $product->name }}</h5>

                                            <div class="d-inline-flex">
                                                <div class="text-muted me-3">
                                                    <span class="mdi mdi-star text-warning"></span>
                                                    <span class="mdi mdi-star text-warning"></span>
                                                    <span class="mdi mdi-star text-warning"></span>
                                                    <span class="mdi mdi-star text-warning"></span>
                                                    <span class="mdi mdi-star text-warning"></span>
                                                </div>
                                            </div>

                                            <h5 class="mt-2">
                                                {{-- <del class="text-muted me-2">
                                                    $200
                                                </del> --}}
                                                Rp. {{ number_format($product->price, 0, ',', '.') }}
                                                {{-- <span class="text-danger font-size-12 ms-2">
                                                    25 % Off
                                                </span> --}}
                                            </h5>

                                            <hr class="my-4">

                                            <div class="mt-4">
                                                {{ $product->description }}
                                            </div>

                                            <div class="mt-4">
                                                <a href="{{ route('admin.product.edit', $product->id) }}"
                                                    class="btn btn-warning waves-effect waves-light mt-2">
                                                    <i class="fas fa-edit"></i> Edit Data
                                                </a>
                                            </div>





                                            {{-- <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <div class="product-color mt-3">
                                                        <h5 class="font-size-14">Variant :</h5>
                                                        <a href="#" class="active">
                                                            <div class="product-color-item">
                                                                <img src="{{ asset('assets/images/product/img-7.png') }}"
                                                                    alt="" class="avatar-md">
                                                            </div>
                                                            <p>Blue</p>
                                                        </a>
                                                        <a href="#">
                                                            <div class="product-color-item">
                                                                <img src="{{ asset('assets/images/product/img-8.png') }}"
                                                                    alt="" class="avatar-md">
                                                            </div>
                                                            <p>Cyan</p>
                                                        </a>
                                                        <a href="#">
                                                            <div class="product-color-item">
                                                                <img src="{{ asset('assets/images/product/img-9.png') }}"
                                                                    alt="" class="avatar-md">
                                                            </div>
                                                            <p>Green</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div> --}}

                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>


        </div> <!-- container-fluid -->
    </div>
@endsection

@section('style')
    <!-- twitter-bootstrap-wizard css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/twitter-bootstrap-wizard/prettify.css') }}">

    <!-- select2 css -->
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />


    <link href="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
@endsection

@section('script')
    <!-- twitter-bootstrap-wizard js -->
    <script src="{{ asset('assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>

    <script src="{{ asset('assets/libs/twitter-bootstrap-wizard/prettify.js') }}"></script>

    <!-- select 2 plugin -->
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets/js/pages/ecommerce-add-product.init.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script> --}}

    <script src="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
@endsection

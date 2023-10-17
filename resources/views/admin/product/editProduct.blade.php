@extends('admin.layouts.app')

@section('content')
    <div class="page-content">

        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Edit Cake</h4>
                            <ol class="m-0 breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Cake Management</a></li>
                                <li class="breadcrumb-item active">Edit Cake</li>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <div id="addproduct-nav-pills-wizard" class="twitter-bs-wizard">
                                    <ul class="twitter-bs-wizard-nav">
                                        <li class="nav-item">
                                            <a href="#product-img" class="nav-link" data-toggle="tab">
                                                <span class="step-number">01. Product Image</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#additional-data" class="nav-link" data-toggle="tab">
                                                <span class="step-number">02. Additional Data</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="#metadata" class="nav-link" data-toggle="tab">
                                                <span class="step-number">03. Meta Data</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- ebd ul -->
                                    <form action="{{ route('admin.product.update', $product->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="tab-content twitter-bs-wizard-tab-content">
                                            <div class="tab-pane" id="product-img">
                                                <h4 class="header-title">Choose Image</h4>
                                                <p class="card-title-desc">Choose all image for product</p>
                                                @error('id_images')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                                <ul id="check_image">
                                                    @foreach ($images as $image)
                                                        <li>
                                                            <input type="checkbox" name="id_images[]"
                                                                value="{{ $image->id }}"
                                                                id="myCheckbox{{ $image->id }}"
                                                                {{ in_array($image->id, old('id_images', $product->images->pluck('id')->toArray())) ? 'checked' : '' }} />
                                                            <label for="myCheckbox{{ $image->id }}">
                                                                <img class="lazyload" data-src="{{ asset('images/' . $image->name) }}" />
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                </ul>


                                                <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                    <li class="next"><a href="#"> Next <i
                                                                class="mdi mdi-arrow-right ms-1"></i></a></li>
                                                </ul>


                                            </div>
                                            <!-- end tabpane -->
                                            <div class="tab-pane" id="additional-data">
                                                <div class="divider"></div>
                                                <h4 class="header-title">Cake Information</h4>
                                                <p class="card-title-desc">Additional data for cake detail</p>

                                                <div class="mb-3">
                                                    <label class="form-label" for="name">Cake Name</label>
                                                    <input value="{{ old('name', $product->name) }}" id="name"
                                                        name="name" type="text" class="form-control"
                                                        placeholder="Enter cake name">
                                                    @error('name')
                                                        <small class="text-danger">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="length">Length Cake</label>
                                                            <input value="{{ old('length', $product->length) }}"
                                                                id="length" name="length" type="number"
                                                                class="form-control" placeholder="Enter length cake">
                                                            @error('length')
                                                                <small class="text-danger">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="width">Width Cake</label>
                                                            <input value="{{ old('width', $product->width) }}"
                                                                id="width" name="width" type="number"
                                                                class="form-control" placeholder="Enter width cake">
                                                            @error('width')
                                                                <small class="text-danger">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="height">Height Cake</label>
                                                            <input value="{{ old('height', $product->height) }}"
                                                                id="height" name="height" type="number"
                                                                class="form-control" placeholder="Enter height cake">
                                                            @error('height')
                                                                <small class="text-danger">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="price">Price</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">Rp.</span>
                                                        <input type="number" value="{{ old('price', $product->price) }}"
                                                            id="price" name="price" class="form-control"
                                                            placeholder="Enter cake price">
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                    @error('price')
                                                        <small class="text-danger">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                                <!-- end row -->
                                                <div class="row" x-data="{
                                                    kategori: {{ $product->category_product_id }},
                                                    subkategori: '',
                                                    currentSubCategory: {{ $product->sub_category_product_id }},
                                                    subkategoriOptions: [],
                                                    loading: false,
                                                    init(){
                                                        axios.get(`/admin/get-subcategories/${this.kategori}`)
                                                        .then(response => {
                                                            this.subkategoriOptions = response.data;
                                                            this.loading = false
                                                        })
                                                        .catch(error => {
                                                            console.error(error);
                                                            this.loading = false
                                                        });
                                                    },
                                                    updateSubkategori() {
                                                        // Lakukan permintaan Axios ke server untuk mengambil sub-kategori berdasarkan kategori yang dipilih.
                                                        this.loading = true
                                                        axios.get(`/admin/get-subcategories/${this.kategori}`)
                                                            .then(response => {
                                                                this.subkategoriOptions = response.data;
                                                                this.loading = false
                                                            })
                                                            .catch(error => {
                                                                console.error(error);
                                                                this.loading = false
                                                            });
                                                    }
                                                }">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="control-label">Category</label>
                                                            <select class="form-control" name="category_product_id"
                                                                x-model="kategori" @change="updateSubkategori()">
                                                                <option value="">Pilih Product Category</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}"
                                                                        {{ $product->category_product_id == $category->id ? 'selected' : '' }}>
                                                                        {{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('category_product_id')
                                                                <small class="text-danger">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="control-label">Sub Category</label>
                                                            <select class="form-control" name="sub_category_product_id"
                                                                x:disabled="loading">
                                                                <option value="">Pilih Sub Category</option>
                                                                <template x-for="option in subkategoriOptions"
                                                                    :key="option.id">
                                                                    <option :value="option.id" x-text="option.name" x-bind:selected="option.id === currentSubCategory">
                                                                    </option>
                                                                </template>
                                                            </select>
                                                            @error('sub_category_product_id')
                                                                <small class="text-danger">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->

                                                <div class="mb-3 row">
                                                    <div class="col-md-4">
                                                        <label class="control-label">Pilihan Varian</label>
                                                        <select class="form-control" name="pilihan_type_id">
                                                            <option value="">Pilihan varian cake</option>
                                                            @foreach ($pilihan_type as $type)
                                                                <option value="{{ $type->id }}" {{ $product->pilihan_type_id == $type->id ? 'selected' : '' }}>
                                                                    {{ $type->nama_pilihan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label">Pilihan Warna</label>
                                                        <select class="form-control" name="pilihan_color_id">
                                                            <option value="">Pilihan untuk warna cake</option>
                                                            @foreach ($pilihan_color as $color)
                                                                <option value="{{ $color->id }}" {{ $product->pilihan_color_id == $color->id ? 'selected' : '' }}>
                                                                    {{ $color->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 my-auto">
                                                        <div class="form-group form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="has_message" name="has_message" value="1" {{ $product->has_message ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="has_message">
                                                                Has Custom Message?
                                                            </label>
                                                        </div>
                                                        <div class="form-group form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="has_decoration" name="has_decoration" value="1" {{ $product->has_decoration ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="has_decoration">
                                                                Has Decoration?
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="description">Product
                                                        Description</label>
                                                    <textarea class="form-control" id="description" name="description" rows="5" placeholder="Enter Description">{{ old('description', $product->description) }}</textarea>
                                                </div>
                                                @error('description')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                                <div class="mb-3">
                                                    <label class="form-label" for="information">Informasi Pemesanan</label>
                                                    <textarea class="form-control" id="information" name="information" rows="3" placeholder="Enter information">{{ old('information') }}</textarea>
                                                </div>
                                                <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                    <li class="previous"><a href="#"><i
                                                                class="mdi mdi-arrow-left me-1"></i> Back</a></li>
                                                    <li class="next"><a href="#">Next <i
                                                                class="mdi mdi-arrow-right ms-1"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" id="metadata">
                                                <h4 class="header-title">Meta Data</h4>
                                                <p class="card-title-desc">Fill all information below</p>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="meta_title">Meta
                                                                title</label>
                                                            <input value="{{ old('meta_title', $product->meta_title) }}"
                                                                id="meta_title" name="meta_title" type="text"
                                                                class="form-control" placeholder="Enter meta title">
                                                            @error('meta_title')
                                                                <small class="text-danger">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>
                                                    </div><!-- end col -->
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="meta_keyword">Meta
                                                                Keywords</label>
                                                            <input
                                                                value="{{ old('meta_keyword', $product->meta_keyword) }}"
                                                                id="meta_keyword" name="meta_keyword" type="text"
                                                                class="form-control" placeholder="Enter keywords">
                                                            @error('meta_keyword')
                                                                <small class="text-danger">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>
                                                    </div><!-- end col -->
                                                </div>
                                                <!-- end row -->
                                                <div class="mb-3">
                                                    <label class="form-label" for="meta_description">Meta
                                                        Description</label>
                                                    <textarea class="form-control" id="meta_description" name="meta_description" rows="5"
                                                        placeholder="Enter Description">{{ old('meta_description', $product->meta_description) }}</textarea>
                                                    @error('meta_description')
                                                        <small class="text-danger">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                                <!-- end form -->
                                                <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                    <li class="previous"><a href="#"><i
                                                                class="mdi mdi-arrow-left me-1"></i> Back</a></li>
                                                    <li class="float-end">
                                                        <button type="submit" class="btn btn-primary">
                                                            Update Product <i class="mdi mdi-arrow-right ms-1"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                                <!-- end ul -->
                                            </div>
                                            <!-- end tabpane -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>


        </div> <!-- container-fluid -->
    </div>
@endsection

@push('style')
    <!-- twitter-bootstrap-wizard css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/twitter-bootstrap-wizard/prettify.css') }}">

    <!-- select2 css -->
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />


    <link href="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
@endpush

@push('script')
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
@endpush

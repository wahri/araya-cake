@extends('admin.layouts.app')

@section('content')
    <div class="page-content">

        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Add Review</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Review Management</a></li>
                                <li class="breadcrumb-item active">Add Review</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-end d-none d-sm-block">
                            <!-- Small modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target=".bs-example-modal-center"><i class="fa fa-plus"></i> Upload New
                                Image</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0">Upload New Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.uploadImages') }}" method="POST" class="dropzone"
                            enctype="multipart/form-data" id="dropzone-images">
                            @csrf
                            <div class="fallback">
                                <input name="images" type="file" multiple>
                            </div>
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted mdi mdi-cloud-upload-outline"></i>
                                </div>

                                <h4>Drop files here to upload</h4>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>


        <div class="container-fluid">

            <div class="page-content-wrapper">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <div id="addproduct-nav-pills-wizard" class="twitter-bs-wizard">
                                    <ul class="twitter-bs-wizard-nav">
                                        <li class="nav-item add-product-border">
                                            <a href="#product-img" class="nav-link" data-toggle="tab">
                                                <span class="step-number">01. Choose Image</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#additional-data" class="nav-link" data-toggle="tab">
                                                <span class="step-number">02. Additional Data</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- ebd ul -->
                                    <form action="{{ route('admin.review.store') }}" method="POST">
                                        @csrf
                                        <div class="tab-content twitter-bs-wizard-tab-content">
                                            <div class="tab-pane" id="product-img">
                                                <h4 class="header-title">Choose Image</h4>
                                                <p class="card-title-desc">Choose reviewer photo profile</p>
                                                @error('image_storage_id')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                                <ul id="check_image">
                                                    @foreach ($images as $image)
                                                        <li>
                                                            <input type="radio" name="image_storage_id"
                                                                value="{{ $image->id }}"
                                                                id="myCheckbox{{ $image->id }}"
                                                                {{ $image->id, old('image_storage_id') ? 'checked' : '' }} />
                                                            <label for="myCheckbox{{ $image->id }}">
                                                                <img src="{{ asset('images/' . $image->name) }}" />
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
                                                <h4 class="header-title">Review Information</h4>
                                                <p class="card-title-desc">Additional data for Review detail</p>

                                                <div class="mb-3">
                                                    <label class="form-label" for="name">Reviewer Name</label>
                                                    <input value="{{ old('name') }}" id="name" name="name"
                                                        type="text" class="form-control"
                                                        placeholder="Enter reviewer name">
                                                    @error('name')
                                                        <small class="text-danger">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="reviews">
                                                        Review
                                                    </label>
                                                    <textarea class="form-control" id="reviews" name="reviews" rows="5" placeholder="Enter Review">{{ old('reviews') }}</textarea>
                                                </div>
                                                @error('reviews')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="alt_image">Alt for
                                                                Image</label>
                                                            <input value="{{ old('alt_image') }}" id="alt_image"
                                                                name="alt_image" type="text" class="form-control"
                                                                placeholder="Enter Alt for Image">
                                                            @error('alt_image')
                                                                <small class="text-danger">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="link_to_review">Link to
                                                                Review</label>
                                                            <input value="{{ old('link_to_review') }}"
                                                                id="link_to_review" name="link_to_review" type="text"
                                                                class="form-control"
                                                                placeholder="Enter Link to Review">
                                                            @error('link_to_review')
                                                                <small class="text-danger">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                    <li class="previous"><a href="#"><i
                                                                class="mdi mdi-arrow-left me-1"></i> Back</a></li>
                                                    <li class="float-end">
                                                        <button type="submit" class="btn btn-primary">
                                                            Add Review <i class="mdi mdi-arrow-right ms-1"></i>
                                                        </button>
                                                    </li>
                                                </ul>
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

@section('style')
    <!-- twitter-bootstrap-wizard css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/twitter-bootstrap-wizard/prettify.css') }}">

    <!-- select2 css -->
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <link href="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
@endsection

@section('script')
    <!-- twitter-bootstrap-wizard js -->
    <script src="{{ asset('assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>

    <script src="{{ asset('assets/libs/twitter-bootstrap-wizard/prettify.js') }}"></script>

    {{-- Dropzone --}}
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <!-- select 2 plugin -->
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets/js/pages/ecommerce-add-product.init.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script> --}}

    <script src="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>



    <script type="text/javascript">
        Dropzone.options.dropzoneImages = {
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            success: function(file, response) {
                console.log(response);
            },
            error: function(file, response) {
                console.log(response);
            },
            queuecomplete: function() {
                location.reload();
            }
        };
    </script>
@endsection

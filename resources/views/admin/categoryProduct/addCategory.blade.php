@extends('admin.layouts.app')

@section('content')
    <div class="page-content">

        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Add Category</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                                <li class="breadcrumb-item active">Add Category</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="container-fluid">

            <div class="page-content-wrapper">

                @if (session('success'))
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                                </button>
                                <strong>Berhasil!</strong> {{ session('success') }}
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <h5 class="card-header bg-secondary text-light">Data Category</h5>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">

                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Category Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $i => $eachCategory)
                                                <tr>
                                                    <th scope="row">{{ $i+1 }}</th>
                                                    <td>{{ $eachCategory->name }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.categoryProduct.edit', $eachCategory->id) }}" class="btn btn-warning btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form
                                                            action="{{ route('admin.categoryProduct.destroy', $eachCategory->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <h5 class="card-header bg-secondary text-light">Add New Category</h5>
                            <div class="card-body">

                                <form method="POST" class="custom-validation"
                                    action="{{ route('admin.categoryProduct.store') }}" novalidate="">
                                    @csrf
                                    <div class="mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" required
                                            placeholder="Category name">
                                    </div>
                                    <div class="mb-3">
                                        <label>Big Icon</label>
                                        <input type="text" name="big_icon" class="form-control"
                                            placeholder="Icon for homepage">
                                    </div>
                                    <div class="mb-3">
                                        <label>Small Icon</label>
                                        <input type="text" name="small_icon" class="form-control"
                                            placeholder="Icon for sidebar">
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" name="is_primary" type="checkbox" value="1"
                                            id="is_primary">
                                        <label class="form-check-label" for="is_primary">
                                            Primary Category
                                        </label>
                                    </div>

                                    <div class="mb-0">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect">
                                                Reset
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div> <!-- container-fluid -->
    </div>
@endsection

@push('style')
@endpush

@push('script')
@endpush

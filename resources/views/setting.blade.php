@extends('layouts.app')

@push('style')
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $(function() {
            $('#tes').click(function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'Do you want to continue',
                    icon: 'error',
                    confirmButtonText: 'Cool'
                })
            })
        })
    </script>
@endpush


@section('content')
    <section id="settingPage" class="pt-50 wide-100">
        <div class="container">
            <div class="mb-10 row">
                <div class="col-12">
                    <h5 class="h5-sm">
                        Hi, {{ $user->name }}
                    </h5>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{ session('success') }}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="mb-10 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-3 h5-sm">
                                Update Profile
                            </h5>
                            <form action="{{ route('member.updateProfile') }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input type="email" class="form-control" disabled value="{{ $user->email }}">
                                    @error('email')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Nama Lengkap" value="{{ $user->name }}">
                                    @error('name')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        placeholder="Nomor Whatsapp" value="{{ $user->profile->phone }}">
                                    @error('phone')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="birthdate" style="color: #495057">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="birthdate" id="birthdate"
                                        placeholder="Tanggal Ulang Tahun" value="{{ $user->profile->birthdate }}">
                                    @error('birthdate')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea name="address" id="address" class="form-control" placeholder="Alamat lengkap">{{ $user->profile->address }}</textarea>
                                    @error('address')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-sm btn-araya tra-araya-hover">
                                    Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-3 h5-sm">
                                Change Password
                            </h5>
                            <form action="{{ route('password.update') }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 input-group">
                                    <input type="password" class="custom-input" placeholder="Password saat ini"
                                        name="current_password">
                                    @if ($errors->updatePassword->has('current_password'))
                                        <small class="text-danger">
                                            {{ $errors->updatePassword->first('current_password') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="mb-3 input-group">
                                    <input type="password" class="custom-input" placeholder="Password baru" name="password">
                                    @if ($errors->updatePassword->has('password'))
                                        <small class="text-danger">
                                            {{ $errors->updatePassword->first('password') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="mb-3 input-group">
                                    <input type="password" class="custom-input" placeholder="Konfirmasi Password"
                                        name="password_confirmation">
                                    @if ($errors->updatePassword->has('password_confirmation'))
                                        <small class="text-danger">
                                            {{ $errors->updatePassword->first('password_confirmation') }}
                                        </small>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-sm btn-araya tra-araya-hover">
                                    Ganti Password
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

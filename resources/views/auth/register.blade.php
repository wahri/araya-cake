@extends('layouts.app')

@section('content')
    <section id="register-form" class="pt-80 pb-100">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-12">
                    <div class="card">
                        <div class="card-body" style="color: #212121">
                            <div class="text-center">
                                <h4 class="h4-xl">
                                    Hai! Sobat Araya
                                </h4>
                                <p class="p-md">
                                    Ayo daftar sebagai member untuk mendapatkan promo menarik di Araya
                                </p>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Email" value="{{ old('email') }}">
                                    @error('email')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Nama Lengkap" value="{{ old('name') }}">
                                    @error('name')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        placeholder="Nomor Whatsapp" value="{{ old('phone') }}">
                                    @error('phone')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                  <label for="birthdate" style="color: #495057">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="birthdate" id="birthdate"
                                        placeholder="Tanggal Ulang Tahun" value="{{ old('birthdate') }}">
                                    @error('birthdate')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                  <textarea name="address" id="address" class="form-control" placeholder="Alamat lengkap">{{ old('address') }}</textarea>
                                  @error('address')
                                      <small class="text-danger">
                                          {{ $message }}
                                      </small>
                                  @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Password Baru">
                                    @error('password')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                                        placeholder="Konfirmasi Password">
                                    @error('password_confirmation')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="tos" id="tos"
                                        {{ old('tos') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="tos">
                                        I accept the
                                        <strong>
                                            terms of services & privacy policy
                                        </strong>
                                    </label>
                                  </div>
                                  @error('tos')
                                      <small class="text-danger">
                                          {{ $message }}
                                      </small>
                                  @enderror
                                <button type="submit" class="btn btn-lg btn-red btn-block">Daftar</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section>
@endsection

@section('style')
@endsection

@section('sript')
@endsection

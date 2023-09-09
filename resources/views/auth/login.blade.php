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
                                    Ayo! login untuk mendapatkan promo menarik di Araya
                                </p>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Email" value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-lg btn-red btn-block">Login</button>
                            </form>
                            <p class="p-md">
                                Belum punya akun? <a href="{{{ route('register') }}}">Daftar</a> sekarang
                            </p>
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

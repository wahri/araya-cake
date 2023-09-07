@extends('layouts.app')

@section('content')
    <section id="register-form" class="pt-80 pb-100">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-12">
                    <div class="card">
                        <div class="card-body" style="color: #FF4F3F">
                            <div class="text-center">
                                <h4 class="h4-xl">
                                    Hai Sobat Araya
                                </h4>
                                <p class="p-md">
                                    Ayo! daftar sebagai member untuk mendapatkan promo menarik di Araya
                                </p>
                            </div>
                            
                            <form>
                                <div class="form-group">
                                  {{-- <label for="exampleInputEmail1">Email</label> --}}
                                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                  {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                </div>
                                <div class="form-group">
                                  {{-- <label for="name">Nama Lengkap</label> --}}
                                  <input type="text" class="form-control" id="name" placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                  {{-- <label for="phone">Nomor Whatsapp</label> --}}
                                  <input type="text" class="form-control" id="phone" placeholder="Nomor Whatsapp">
                                </div>
                                <div class="form-group">
                                  {{-- <label for="password">Password</label> --}}
                                  <input type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                                <div class="form-group form-check">
                                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                  <label class="form-check-label" for="exampleCheck1">
                                    I accept the 
                                    <strong>
                                        terms of services & privacy policy
                                    </strong>
                                  </label>
                                </div>
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

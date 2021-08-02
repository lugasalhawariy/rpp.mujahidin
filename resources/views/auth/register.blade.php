@extends('layouts.auth')

@section('content')
    <div class="content">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6 d-none d-md-block">
                    <div class="mb-4">
                        <h4 style="">E-RPP</h4>
                        <p class="mb-4">Registrasi Akun Sistem Informasi Rancangan Pelaksanaan Pembelajaran.</p>
                    </div>
                    <img src="{{ asset('auth/img/sapiens.png') }}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                            <h3 style="font-weight: bold;">Register</h3>
                        </div>
                        
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="mb-2 form-group first">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nama">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2 form-group first">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2 form-group last">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4 form-group last">
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Konfirmasi Password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-block btn-success">
                                {{ __('Register') }}
                            </button>
                            <a class="align-items-center btn btn-block btn-dark d-flex justify-content-center" href="/login" style="text-decoration: none;">
                                {{ __('Saya sudah punya Akun') }}
                            </a>

                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection

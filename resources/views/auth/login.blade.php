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
                            <h3 style="font-weight: bold;">Login</h3>
                        </div>
                        
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-2 form-group first">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            @error('email')
                                <span class="text-danger" role="alert">
                                    <small>Email tidak ditemukan</small>
                                </span>
                            @enderror
                            <div class="mb-2 form-group last">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            @error('password')
                                <span class="text-danger" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                            <button type="submit" class="mb-2 btn btn-block btn-success">
                                {{ __('Login') }}
                            </button>
                            <a class="align-items-center btn btn-block btn-dark d-flex justify-content-center" href="/register" style="text-decoration: none;">
                                Belum punya akun
                            </a>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection

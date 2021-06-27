@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh" id="login">
        <div class="card bg-transparent text-white p-0 mb-5 border-0 justify-content-center" style="width: 80vw">
            <div class="card-header text-white text-center fs-3"><i class="fa fa-key"></i> Reset Password</div>
            
            <div class="row">
                <div class="col-md-6 col-12 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('img/forgotpassword.png') }}" class="w-100" alt="Forgot Password">
                </div>

                <div class="col-md-6 col-12 d-flex justify-content-center align-items-center">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-form-label ms-2"><i class="fa fa-envelope"></i> {{ __('Email Address') }}</label>

                                <input id="email" type="email" class="bg-transparent text-white mx-auto mb-2 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="width: 95%">

                                @error('email')
                                    <span class="invalid-feedback bg-danger text-white rounded mx-auto py-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <button type="submit" class="btn btn-info text-white mt-2 w-100">
                                        <i class="fa fa-send"></i> {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <a href="/login" class="btn btn-primary mt-2 w-100"><i class="fa fa-times"></i> Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh" id="login">
        <div class="card bg-transparent text-white p-0 mb-5 border-0 justify-content-center" style="width: 80vw">
            <div class="card-header text-white text-center fs-3"><i class="fa fa-globe"></i> Register Page</div>
            
            <div class="row">
                <div class="col-md-6 col-12 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('img/register.png') }}" class="w-100" alt="Register">
                </div>

                <div class="col-md-6 col-12 d-flex justify-content-center align-items-center">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-form-label ms-2"><i class="fa fa-user"></i> {{ __('Name') }}</label>

                                <input id="name" type="text" class="bg-transparent text-white mx-auto mb-2 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter your name" autocomplete="name" autofocus style="width: 95%">

                                @error('name')
                                    <span class="invalid-feedback bg-danger text-white rounded mx-auto py-2" role="alert" style="width: 95%">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-form-label ms-2"><i class="fa fa-envelope"></i> {{ __('Email Address') }}</label>

                                <input id="email" type="email" class="bg-transparent text-white mx-auto mb-2 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email address" autocomplete="email" autofocus style="width: 95%">

                                @error('email')
                                    <span class="invalid-feedback bg-danger text-white rounded mx-auto py-2" role="alert" style="width: 95%">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-form-label ms-2"><i class="fa fa-lock"></i> {{ __('Password') }}</label>

                                <input id="password" type="password" class="bg-transparent text-white mx-auto mb-2 form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password" autocomplete="current-password" style="width: 95%">

                                @error('password')
                                    <span class="invalid-feedback bg-danger text-white rounded mx-auto py-2" role="alert" style="width: 95%">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-form-label ms-2"><i class="fa fa-lock"></i> {{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="bg-transparent text-white mx-auto mb-2 form-control" name="password_confirmation" placeholder="Confirm your password" autocomplete="new-password" style="width: 95%">
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <button type="submit" class="btn btn-info text-white mt-2 w-100">
                                        <i class="fa fa-user-plus"></i> {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col">
                                    <a href="/" class="btn btn-primary mt-2 w-100"><i class="fa fa-times"></i> Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
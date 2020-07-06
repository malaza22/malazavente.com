@extends('layouts.master')

@section('content')
<style>
    #or {
        background: #d33b33;
        border-radius: 50px;
        color: #FFFFFF;
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        height: 50px;
        line-height: 50px;
        /* margin-top: 75px; */
        text-align: center;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-sm-12">
            <div class="card">
                <div class="card-header text-center">{{ __('S\'inscrire') }}</div>
                <div class="card-body">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <div class="form-group">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
    
                            <div class="form-group">
    
                                
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>
    
                            <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            
                            </div>
                            <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
    
                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary col-sm-12">
                                        {{ __('S\'inscrire') }}
                                    </button>                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-1 col-4" id="or">
            OR
        </div>
        <div class="col-lg-5 col-sm-12">
            <div class="card">
                <div class="card-header text-center">{{ __('Connecter') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group md-1">

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group md-1">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                            <button type="submit" class="btn btn-primary col-sm-12">
                                {{ __('Connecter') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
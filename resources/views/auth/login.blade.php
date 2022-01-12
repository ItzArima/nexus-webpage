@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">

@section('content')
<main>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Login</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mail">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  placeholder="Inserisci la tua mail">
                        <img src="{{asset('img/user-regular.svg')}}" alt="">
                    </div>

                    <div class="password">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Inserisci la tua password">
                        <img src="{{asset('img/unlock-alt-solid.svg')}}" alt="">
                    </div>

                    <div class="remember-me">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    Mantieni Accesso
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="login-button">
                        <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                        </button>
                    </div>

                    <div class="reset">
                        <div class="col-md-8 offset-md-4">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Password Dimenticata? 
                                </a>
                            @endif
                        </div>
                    </div>

                </form>
            </div>
            <div class="errors-container">
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <p class="alert alert-{{ $msg }}"><strong>{{ Session::get('alert-' . $msg) }}</strong></p>
                        @endif
                    @endforeach
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>Questa mail non risulta registrata</strong>
                    </span>
                @enderror

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>Password errata</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</main>
@endsection

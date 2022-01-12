@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">

@section('content')
<main>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Register</h1>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mail name">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>
                        <img src="{{asset('img/user-regular.svg')}}" alt="">
                    </div>

                    <div class="mail">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        </div>
                        <img src="{{asset('img/user-regular.svg')}}" alt="">
                    </div>

                    <div class="password">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        </div>
                        <img src="{{asset('img/unlock-alt-solid.svg')}}" alt="">
                    </div>

                    <div class="password">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <img src="{{asset('img/unlock-alt-solid.svg')}}" alt="">
                    </div>

                    <div class="login-button">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
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
            </div>
        </div>
    </div>
</main>
@endsection

@extends('layouts.public')

@section('content')
  <main>
    <div class="login">
      <div class="login-container">
        <h2 class="login-header">Log In</h2>
        <div class="container">
          <a class="google-button" href="{{route('google.auth')}}">
            <img src="{{asset('img/google-icon.svg')}}" alt="google logo"/>
            Log in with Google
          </a>
          <div class="login-divider">
            <h4>or log in with mail</h4>
            <div class="login-divider__background"></div>
          </div>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form class="login-form" method="post" action="{{route('public.login.post')}}">
            @csrf
            <label class="form-label">Email
              <input type="email" name="email" placeholder="Enter your email..." value="" autocomplete="off"/>
            </label>
            <label class="form-label">Password
              <input type="password" name="password" placeholder="••••••••••" value="" autocomplete="off"/>
            </label>
            <button class="form-button">
              Log In
            </button>
          </form>
          <div class="login-footer">
            <div>
              <a class="link">Forgot a password?</a>
            </div>
            <div class="login-footer__text-container">
              <p class="login-footer__text">Don’t have account?</p>
              <a class="link-sing-up" href="{{route('public.register')}}">Sign Up</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection

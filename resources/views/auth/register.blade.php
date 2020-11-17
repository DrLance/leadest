@extends('layouts.public')

@section('content')
  <div class="modal">
    <div class="modal-wrapper">
      <div class="modal-close">
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M6.99999 5.58599L11.95 0.635986L13.364 2.04999L8.41399 6.99999L13.364 11.95L11.95 13.364L6.99999 8.41399L2.04999 13.364L0.635986 11.95L5.58599 6.99999L0.635986 2.04999L2.04999 0.635986L6.99999 5.58599Z" fill="#2A3196"/>
        </svg>
      </div>

      <div class="modal-container">
        <p class="modal-text">Please check your mail to verify registration on Leadest.pro</p>
      </div>

    </div>
  </div>
  <main>
    <div class="login">
      <div class="login-container">
        <h2 class="login-header">Sign up for Leadest</h2>
        <div class="container">
          <a class="google-button" href="{{route('google.auth')}}">
            <img src="{{asset('img/google-icon.svg')}}" alt="google logo"/>
            Sign up with Google
          </a>
          <div class="login-divider">
            <h4>or sign up with mail</h4>
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
          <form class="login-form" method="post" action="{{route('public.register.store')}}">
            @csrf
            <label class="form-label">Email
              <input type="email" name="email" placeholder="Enter your email..." value="" autocomplete="off"/>
            </label>
            <label class="form-label">Password
              <input type="password" name="password" placeholder="••••••••••" value="" autocomplete="off"/>
            </label>
            <button class="form-button" type="submit">
              Sign In
            </button>
          </form>
        </div>
      </div>
    </div>
  </main>

@endsection

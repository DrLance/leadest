@extends('layouts.public')

@section('content')
  <x-modal>
    <p class="modal-text">Please check your mail to verify registration on Leadest.pro</p>
  </x-modal>
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
@endsection

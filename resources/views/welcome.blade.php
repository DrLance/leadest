<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{config('app.name')}}</title>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <script src="{{ mix('js/app.js') }}" defer></script>

</head>
<body>
<header class="container-fluid header">
  <div class="container header-logo">
    <a href="{{route('home')}}">
      <img src="{{asset('img/leadest-logo.svg')}}" alt="logo"/>
    </a>
  </div>
</header>
<main>
  <div class="login">
    <div class="login-container">
      <h2 class="login-header">Log In</h2>
      <a class="google-button" href="{{route('google.auth')}}">
        <img src="{{asset('img/google-icon.svg')}}"  alt="google logo"/>
        Log in with Google
      </a>
      <div class="login-divider">
        <p>or log in with mail</p>
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
      <form class="login-form" method="post" action="{{route('public.login')}}">
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
          <a class="link-sing-up">Sign Up</a>
        </div>
      </div>
    </div>
  </div>
</main>
</body>
</html>

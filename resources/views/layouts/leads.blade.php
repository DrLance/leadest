<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="robots" content="noindex, nofollow"/>

  <title>{{config('app.name')}}</title>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <script src="{{ mix('js/app.js') }}" defer></script>

</head>
<body>
<header class="container-fluid header">
    <div class="leads-header__container">
      <a href="{{route('home')}}">
        <img src="{{asset('img/leadest-logo.svg')}}" alt="logo"/>
      </a>
      <div class="dashboard-link__container">
        <a class="dashboard-link" href="/logout">
          <img src="/img/support-icon.svg"  alt="settings"/>
          Support
        </a>
        <span class="dashboard-divider">|</span>
        <a class="lead-link" href="/logout">Welcome, {{auth()->user()->name}} <img src="/img/lead-avatar.svg" alt="exit" /></a>
      </div>
    </div>
</header>
<main id="app" class="dashboard-container">
  @yield('content')
</main>
</body>
</html>


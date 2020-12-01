<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height: 100%;">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="robots" content="noindex, nofollow"/>

  <title>{{config('app.name')}}</title>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body style="height: 100%; display: flex; flex-direction: column; ">
<div class="public-content">
<header class="container-fluid header">
  <div class="container header-logo">
    <a href="{{route('home')}}">
      <img src="{{asset('img/leadest-logo.svg')}}" alt="logo"/>
    </a>
  </div>
</header>
<main id="app" >
@yield('content')
</main>
</div>
<footer class="footer container">
  <div class="footer-container">
    <a href="https://www.facebook.com/leadestpro/" target="_blank"><img src="/img/fb-icon.svg" alt="Facebook"></a>
    <a href="https://twitter.com/Leadestpro" target="_blank"><img src="/img/tw-icon.svg" alt="Twitter"></a>
    <a href="https://medium.com/@leadest" target="_blank"><img src="/img/hz-icon.svg" alt="Medium"></a>
  </div>
</footer>
</body>
</html>

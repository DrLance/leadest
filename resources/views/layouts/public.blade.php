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
@yield('content')

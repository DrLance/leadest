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
<header class="container-fluid header header-dashboard">
  <div class="dashboard-container">
    <div class="dashboard-header__container">
      <a href="{{route('home')}}">
        <img src="{{asset('img/leadest-logo.svg')}}" alt="logo"/>
      </a>
      <div class="dashboard-link__container">

        <div class="dashboard-header__socials">

        <a href="https://www.linkedin.com/company/leadestpro" target="_blank">

          <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4.93994 2.00002C4.93968 2.53046 4.72871 3.03906 4.35345 3.41394C3.97819 3.78883 3.46937 3.99929 2.93894 3.99902C2.40851 3.99876 1.89991 3.78779 1.52502 3.41253C1.15014 3.03727 0.939676 2.52846 0.939942 1.99802C0.940207 1.46759 1.15117 0.958988 1.52644 0.584103C1.9017 0.209218 2.41051 -0.00124153 2.94094 -0.000976312C3.47137 -0.000711096 3.97998 0.210257 4.35486 0.585517C4.72975 0.960777 4.94021 1.46959 4.93994 2.00002ZM4.99994 5.48002H0.999942V18H4.99994V5.48002ZM11.3199 5.48002H7.33994V18H11.2799V11.43C11.2799 7.77002 16.0499 7.43002 16.0499 11.43V18H19.9999V10.07C19.9999 3.90002 12.9399 4.13002 11.2799 7.16002L11.3199 5.48002Z" />
          </svg>

        </a>

        <a href="https://www.facebook.com/leadestpro/" target="_blank">

          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 0C4.477 0 0 4.50425 0 10.0609C0 15.0822 3.657 19.2444 8.438 20V12.9685H5.898V10.0609H8.438V7.84446C8.438 5.32321 9.93 3.93078 12.215 3.93078C13.309 3.93078 14.453 4.12697 14.453 4.12697V6.60194H13.193C11.95 6.60194 11.563 7.37764 11.563 8.17345V10.0609H14.336L13.893 12.9685H11.563V20C16.343 19.2454 20 15.0812 20 10.0609C20 4.50425 15.523 0 10 0Z" />
          </svg>

        </a>

        <a href="https://medium.com/@leadest" target="_blank">

          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 20C15.5228 20 20 15.5228 20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20ZM6.88621 13.8276C9.11127 13.8276 10.9151 12.0114 10.9151 9.771C10.9151 7.5306 9.11141 5.71428 6.88621 5.71428C4.66101 5.71428 2.85714 7.5306 2.85714 9.771C2.85714 12.0114 4.66115 13.8276 6.88621 13.8276ZM13.3205 13.5901C14.4331 13.5901 15.335 11.8798 15.335 9.77098H15.3349C15.3349 7.66159 14.433 5.95189 13.3204 5.95189C12.2078 5.95189 11.306 7.66213 11.306 9.77098C11.306 11.8798 12.2079 13.5901 13.3205 13.5901ZM17.1429 9.77097C17.1429 11.66 16.8257 13.1923 16.4343 13.1923C16.043 13.1923 15.726 11.6604 15.726 9.77097C15.726 7.88154 16.0431 6.34967 16.4343 6.34967C16.8256 6.34967 17.1429 7.88141 17.1429 9.77097Z" />
          </svg>

        </a>

        <a href="https://twitter.com/Leadestpro" target="_blank">

          <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.1621 2.65599C20.3986 2.99368 19.589 3.21546 18.76 3.31399C19.6338 2.79142 20.2878 1.969 20.6 0.999988C19.7801 1.48799 18.8811 1.82999 17.944 2.01499C17.3147 1.34157 16.4804 0.894951 15.571 0.744572C14.6616 0.594194 13.728 0.748479 12.9153 1.18344C12.1026 1.6184 11.4564 2.30967 11.0772 3.14978C10.6979 3.98989 10.6068 4.93177 10.8181 5.82899C9.15516 5.74564 7.52838 5.31351 6.04334 4.56065C4.55829 3.80779 3.24818 2.75104 2.19805 1.45899C1.82634 2.09744 1.63101 2.82321 1.63205 3.56199C1.63205 5.01199 2.37005 6.29299 3.49205 7.04299C2.82806 7.02209 2.17868 6.84277 1.59805 6.51999V6.57199C1.59825 7.53769 1.93242 8.47361 2.5439 9.22105C3.15538 9.96849 4.00653 10.4815 4.95305 10.673C4.33667 10.84 3.69036 10.8646 3.06305 10.745C3.32992 11.5762 3.85006 12.3032 4.55064 12.8241C5.25123 13.345 6.09718 13.6338 6.97005 13.65C6.10253 14.3313 5.10923 14.835 4.04693 15.1322C2.98464 15.4294 1.87418 15.5142 0.779053 15.382C2.69075 16.6114 4.91615 17.2641 7.18905 17.262C14.882 17.262 19.0891 10.889 19.0891 5.36199C19.0891 5.18199 19.0841 4.99999 19.076 4.82199C19.8949 4.23016 20.6016 3.49701 21.163 2.65699L21.1621 2.65599Z" />
          </svg>

        </a>

        <a href="https://t.me/leadest" target="_blank">

          <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM6.89 11.17L6.903 11.163L7.773 14.033C7.885 14.344 8.039 14.4 8.226 14.374C8.414 14.349 8.513 14.248 8.636 14.13L9.824 12.982L12.374 14.87C12.84 15.127 13.175 14.994 13.291 14.438L14.948 6.616C15.131 5.888 14.811 5.596 14.246 5.828L4.513 9.588C3.849 9.854 3.853 10.226 4.393 10.391L6.89 11.171V11.17Z" />
          </svg>

        </a>
        </div>

        <span class="dashboard-divider">|</span>
        <a class="dashboard-link" href="/logout">
          <img src="/img/support-icon.svg"  alt="settings"/>
          Support
        </a>
        <span class="dashboard-divider">|</span>
        <a class="dashboard-link" href="/logout"><img src="/img/settings-icon.svg"  alt="settings"/>Settings</a>
        <span class="dashboard-divider">|</span>
        <a class="dashboard-link" href="/logout"><img src="/img/exit-icon.svg" alt="exit" />Exit</a>
      </div>
    </div>
  </div>
</header>
<main id="app" class="dashboard-container">
  @yield('content')
</main>
</body>
</html>


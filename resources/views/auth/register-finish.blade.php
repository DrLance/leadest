@extends('layouts.public')

@section('content')
  <div class="login">
    <div class="login-container verify-container">
      <h2 class="verify-title">Please verify your email</h2>
      <p>You’re almost there! We sent an email to <a href="mailto:{{$email}}" class="link-sing-up">{{$email}}</a></p>
      <p>Just click on the link in that email to complete your signup. If you don’t see it, you may need to <strong>check your spam</strong> folder.</p>
      <p>Still can’t find the email?</p>
      @if(Session::has('status'))
        <p class="alert-success">{{ Session::get('status') }}</p>
      @endif
      <div class="container">
        <form class="login-form" method="post" action="{{route('public.register.resend')}}">
          @csrf
          <button class="form-button" >
            Resend Email
          </button>
        </form>
        <div class="login-footer">
        </div>
      </div>
    </div>
  </div>
@endsection

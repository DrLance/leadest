@extends('layouts.public')

@section('content')
  <div class="login">
    <div class="login-container">
      <h2 class="login-header">Reset Password</h2>
      <div class="alert alert-danger">

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

      </div>
      <div class="container">
        <form class="login-form" method="post" action="{{route('password.reset.store')}}">
          @csrf
          <label class="form-label">New Password
            <input type="password" name="password" placeholder="Enter new password" value="" autocomplete="off"/>
          </label>
          <button class="form-button" >
            Save
          </button>
          <input type="hidden" name="token" value="{{$token}}" />
          <input type="hidden" name="email" value="{{$email}}" />
        </form>
        <div class="login-footer">
        </div>
      </div>
    </div>
  </div>
@endsection

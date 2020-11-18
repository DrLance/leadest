@extends('layouts.dashboard')

@section('content')
    <h1>
      {{auth()->user()->email}}
    </h1>
@endsection

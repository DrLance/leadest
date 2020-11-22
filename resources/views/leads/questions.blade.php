@extends('layouts.leads')

@section('content')
<lead-question-component answer-path="{{route('leads.questions.store')}}"></lead-question-component>
@endsection

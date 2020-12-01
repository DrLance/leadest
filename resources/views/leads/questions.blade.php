@extends('layouts.leads')

@section('content')
<lead-question-component
  answer-path="{{route('leads.questions.store')}}"
  :questions='@json($questions)'
  :current-step="{{$currentStep}}"
></lead-question-component>
@endsection

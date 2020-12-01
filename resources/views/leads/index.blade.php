@extends('layouts.leads')

@section('content')
  <div class="lead-container">
    <div class="lead-progress">

      <div class="lead-progress__item active-start">
        <span class="lead-progress__title">Start</span>
        <div class="lead-progress__item-container">
          <div class="lead-progress__circle"></div>
        </div>
        <div class="lead-progress__line"></div>
      </div>

      <div class="lead-progress__item ">
        <span class="lead-progress__title">I am</span>
        <div class="lead-progress__item-container">
          <div class="lead-progress__circle"></div>
        </div>
        <div class="lead-progress__line"></div>
      </div>

      <div class="lead-progress__item">
        <span class="lead-progress__title">General info</span>
        <div class="lead-progress__item-container">
          <div class="lead-progress__circle"></div>
        </div>
        <div class="lead-progress__line"></div>
      </div>

      <div class="lead-progress__item">
        <span class="lead-progress__title">I want to</span>
        <div class="lead-progress__item-container">
          <div class="lead-progress__circle"></div>
        </div>
        <div class="lead-progress__line"></div>
      </div>

      <div class="lead-progress__item">
        <span class="lead-progress__title">Sales</span>
        <div class="lead-progress__item-container">
          <div class="lead-progress__circle"></div>
        </div>
        <div class="lead-progress__line"></div>
      </div>

      <div class="lead-progress__item">
        <span class="lead-progress__title">I want</span>
        <div class="lead-progress__item-container">
          <div class="lead-progress__circle"></div>
        </div>
      </div>

    </div>
    <div class="lead-container__start">
      <h2 class="lead-title">Please, fill in this questionaire to let us understand your business</h2>
      <p>It may take up to 30 minutes to fill it up completely, but it will worth it! New clients!</p>

      <button class="form-button lead-button" onclick="window.location='{{route('leads.questions')}}'">Start</button>

    </div>

  </div>
@endsection

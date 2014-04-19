@extends('layout')

@section('content')
<div class="row centered-form">
  <div class="col-xs-12 col-sm-12 col-md-4 col-sm-offset-2 col-md-offset-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Results</h3>
      </div>
      <div class="panel-body">
        You have chosen: {{ $date }}<br>

        Previously chosen dates:<br>
        @foreach($dates as $entry)
          {{ $entry->date }}</br>
        @endforeach
        <br>

        <a href="{{ url('/') }}" class="btn btn-default btn-block">Go back to the date picker</a>
      </div>
    </div>
  </div>
</div>
@stop

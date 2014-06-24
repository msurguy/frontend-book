@extends('layout')

@section('content')
<div class="row centered-form">
  <div class="col-xs-12 col-sm-12 col-md-4 col-sm-offset-2 col-md-offset-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Integrating AJAX file uploads</h3>
      </div>
      <div class="panel-body">
        <p>Please choose a demo:</p>
        
        <ul>
          <li><a href="{{ url('basic')}}">Basic File Uploader</a></li>
          <li><a href="{{ url('multi')}}">Multi File Uploader</a></li>
          <li><a href="{{ url('crop')}}">Crop and upload</a></li>
        </ul>

      </div>
    </div>
  </div>
</div>
@stop
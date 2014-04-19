@extends('layout')

@section('styles')
  {{ HTML::style('vendor/pickadate/compressed/themes/classic.css') }}
  {{ HTML::style('vendor/pickadate/compressed/themes/classic.date.css') }}
@endsection

@section('content')
<div class="row centered-form">
  <div class="col-xs-12 col-sm-12 col-md-4 col-sm-offset-2 col-md-offset-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Integrating a date picker</h3>
      </div>
      <div class="panel-body">
        
        @if(Session::has('invalid_date'))
          <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            You have not chosen a date or have entered invalid input. Please try picking a date again.
          </div>
        @endif

        {{ Form::open() }}

          <div class="form-group">
            <label for="date">Please choose your favorite date</label>
            
            <input id="date" name="date" type="text" data-value="2014-05-01 00:00:00" class="form-control" placeholder="Pick one...">
          </div>
           
          <input type="submit" value="Submit" class="btn btn-info btn-block">

        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>
@stop

@section('scripts')
  {{ HTML::script('vendor/pickadate/compressed/picker.js') }}
  {{ HTML::script('vendor/pickadate/compressed/picker.date.js') }}
  <script type="text/javascript">
    $( '#date' ).pickadate({
      formatSubmit : 'yyyy-mm-dd 00:00:00',
      hiddenName: true
    });
  </script>
@stop
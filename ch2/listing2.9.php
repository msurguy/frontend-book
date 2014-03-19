@extends('layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4 col-sm-4 col-md-offset-4">
      <button class="btn btn-primary btn-lg btn-block" id="btn-send">Send a request!</button>
      <div class="spin-area" id="spin-area"></div>
    </div>
  </div>
</div>
@stop

@section('scripts')
{{ HTML::script('js/spin.min.js') }}
{{ HTML::script('js/jquery.spin.js') }}

<script type="text/javascript">
$(function() {

  $('#btn-send').click(function(e){
    e.preventDefault();

    // Run the spinner
    $('#spin-area').spin('large');

    // Send a POST AJAX request to the "/data" URL of the application
    $.ajax({
        type: "POST",
        url: "/data"
        // If sending data, add this: data: { name: 'some Name' }
      })
      .done(function() {
        alert( "Processed!" );
      })
      .fail(function() {
        alert( "Error processing request" );
      })
      .always(function() {
        $('#spin-area').spin(false);
      });
  });

});
</script>
@stop

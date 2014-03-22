@extends('layout')

@section('scripts')
  {{ HTML::script('vendor/parsley/parsley.min.js')}}
  {{ HTML::script('vendor/humanejs/humane.min.js') }}
  {{ HTML::script('vendor/spin/spin.min.js') }}
  {{ HTML::script('vendor/spin/jquery.spin.js') }}
  <script type="text/javascript">
  $(function() {

    var registrationForm= $('#registration-form');
    var spinArea        = $('#spin-area');

    registrationForm.submit(function(e){
      e.preventDefault();

      if(registrationForm.parsley().isValid()){
        // Run the spinner
        spinArea.spin('large');

        // Send a POST AJAX request to the URL of the application
        $.ajax({
            type: "POST",
            url: registrationForm.attr('action'),
            data: registrationForm.serialize(),
            dataType: "json"
          })
          .done(function(response) {
            if (response.success) {
              humane.log(response.success.message, 
                { addnCls: 'humane-flatty-success'}, 
                function(){
                  window.location = response.success.url;
                } 
              );
            } else {
              humane.log(response.errors,{ addnCls: 'humane-flatty-error'})
            }
          })
          .fail(function () {
            humane.log('An error has occured, please try again',{ addnCls: 'humane-flatty-error'});
          })
          .always(function() {
            spinArea.spin(false);
          });
      }
      
    });

  });
  </script>
@stop

@section('styles')
  {{ HTML::style('vendor/parsley/parsley.css')}}
  {{ HTML::style('vendor/humanejs/themes/flatty.css') }}
@stop

@section('content')

<div class="row centered-form">
  <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Please sign up <small>It's free!</small></h3>
      </div>
      <div class="panel-body" id="spin-area">
        {{ Form::open(['data-parsley-validate' => true, 'id'=>'registration-form','url' => 'register']) }}
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                {{ Form::text('first_name', null, array('class'=>'form-control input-sm','placeholder'=>'First Name', 'required'=>true)) }}
              </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                {{ Form::text('last_name', null, array('class'=>'form-control input-sm','placeholder'=>'Last Name')) }}
              </div>
            </div>
          </div>

          <div class="form-group">
            {{ Form::email('email', null, array('class'=>'form-control input-sm','placeholder'=>'Email Address', 'required'=>true, 'data-parsley-trigger'=>'change')) }}
          </div>

          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                {{ Form::password('password', array('id' => 'password', 'class'=>'form-control input-sm','placeholder'=>'Password', 'required'=>true)) }}
              </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                {{ Form::password('password_confirmation', array('class'=>'form-control input-sm','placeholder'=>'Confirm Password', 'required'=>true, 'data-parsley-equalto'=>'#password')) }}
              </div>
            </div>
          </div>
          
          {{ Form::submit('Register', array('class'=>'btn btn-info btn-block')) }}

        {{ Form::close() }}
      </div>
    </div>
    <div class="text-center">
      Have an account?  <a href="{{url('login')}}" >Login</a>
    </div>
  </div>
</div>

@stop
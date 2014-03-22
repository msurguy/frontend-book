@extends('layout')

@section('scripts')
  {{ HTML::script('vendor/parsley/parsley.min.js')}}
  {{ HTML::script('vendor/humanejs/humane.min.js') }}
  {{ HTML::script('vendor/spin/spin.min.js') }}
  {{ HTML::script('vendor/spin/jquery.spin.js') }}
  <script type="text/javascript">
  $(function() {

    var loginForm = $('#login-form');
    var spinArea  = $('#spin-area');

    loginForm.submit(function(e){
      e.preventDefault();

      if(loginForm.parsley().isValid()){
        // Run the spinner
        spinArea.spin('large');

        // Send a POST AJAX request to a URL of the application
        $.ajax({
            type: "POST",
            url: loginForm.attr('action'),
            data: loginForm.serialize(),
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
    <div id="spin-area" class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Please Log in</h3>
      </div>
      <div class="panel-body">
        {{ Form::open(['data-parsley-validate' => true, 'id'=>'login-form','url' => 'login']) }}
          <div class="form-group">
            {{ Form::email('email', null, array('class'=>'form-control input-sm','placeholder'=>'Email Address', 'required'=>true, 'data-parsley-trigger'=>'change')) }}
          </div>
          
          <div class="form-group">
            {{ Form::password('password', array('id' => 'password', 'class'=>'form-control input-sm','placeholder'=>'Password', 'required'=>true)) }}
          </div>
            
          <div class="checkbox">
            <label>
              {{ Form::checkbox('remember')}} Remember Me
              <a href="forgot" class="pull-right">Forgot Password?</a>
            </label>
          </div>

          {{ Form::submit('Login', array('class'=>'btn btn-info btn-block')) }}

        {{ Form::close() }}
      </div>
    </div>
    <div class="text-center">
      Don&#39;t have an account?  <a href="{{url('frontend/ch5/register')}}" >Register</a>
    </div>

  </div>
</div>

@stop
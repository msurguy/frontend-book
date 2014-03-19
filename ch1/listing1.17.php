...
@if(Session::get('errors'))
  <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5>There were errors during registration:</h5>
    @foreach($errors->all('<li>:message</li>') as $message)
      {{$message}}
    @endforeach
  </div>
@endif

{{ Form::open() }}
...

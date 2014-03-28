@extends('layout')

@section('styles')
  {{ HTML::style('vendor/selectize/css/selectize.css') }}
  {{ HTML::style('vendor/selectize/css/selectize.default.css') }}
@endsection

@section('content')
<div class="row centered-form">
  <div class="col-xs-12 col-sm-12 col-md-6 col-sm-offset-2 col-md-offset-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Editing blog post</h3>
      </div>
      <div class="panel-body">

        @if(Session::has('message'))
          <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('message') }}
          </div>
        @endif

        {{ Form::open() }}

          <div class="form-group">
            <label for="name">Post Name</label>
            {{ Form::text('name', $post->name, array('class'=>'form-control')) }}
          </div>

          <div class="form-group">
            <label for="body">Post Body</label>
            {{ Form::textarea('body', $post->body, array('class'=>'form-control')) }}
          </div>

          <div class="form-group">
            <label for="tags">Post Tags</label>
            <select id="tags-menu" name="tags[]" multiple="multiple">
              <option value="">Add tags to this post...</option>
              @foreach($allTags as $tag)
                <option value="{{ $tag }}" @if(in_array($tag,$chosenTags))selected="selected"@endif>{{ $tag }}</option>
              @endforeach
            </select>
          </div>
           
          <input type="submit" value="Submit" class="btn btn-info btn-block">

        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>
@stop

@section('scripts')
  {{ HTML::script('vendor/selectize/js/standalone/selectize.min.js') }}
  <script type="text/javascript">
    $(function() {
      // Enable Selectize with an option to create new tags and add the remove button for tags
      $('#tags-menu').selectize({ create: true, plugins: ['remove_button']});
    });  
  </script>
@stop

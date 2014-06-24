@extends('layout')

@section('styles')
  <style>
    #uploader .btn {
      cursor: pointer;
      display: inline-block;
      position: relative;
      overflow: hidden;
    }

    #uploader .btn input
    {
      top: -10px;
      right: -40px;
      z-index: 2;
      position: absolute;
      cursor: pointer;
      opacity: 0;
      filter: alpha(opacity=0);
      font-size: 50px;
    }
  </style>
@endsection

@section('content')
<div class="row centered-form">
  <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Demo of multi AJAX file upload</h3>
      </div>
      <div class="panel-body">
        
        <div id="uploader">
          
          <div class="js-upload" style="display: none">
            <div class="progress" style="margin-bottom:0;">
              <div class="js-progress progress-bar progress-bar-info"></div>
            </div>
            <span class="btn-txt">Uploading (<span class="js-size"></span>)</span>
          </div>

          <div class="js-browse btn btn-success">
            <span class="btn-txt">Browse</span>
            <input type="file" name="filedata" >
          </div>

        </div>
        
      </div>
    </div>
  </div>
</div>
@stop

@section('scripts')
<script>
  window.FileAPI = {
    debug:true,
    staticPath: '{{url("vendor/fileapi/FileAPI")}}', // path to '*.swf' files necessary for fallbacks
  };
</script>

  {{ HTML::script('vendor/fileapi/FileAPI/FileAPI.min.js') }}
  {{ HTML::script('vendor/fileapi/jquery.fileapi.min.js') }}
  <script>
  $(function() {
    $('#uploader').fileapi({
      url: '{{ url("upload")}}',
      autoUpload : true,
      multiple: true, // Add this to allow uploading more than one file
      elements: {
        size: '.js-size',
        active: { show: '.js-upload', hide: '.js-browse' },
        progress: '.js-progress'
      }
    });
  });
  </script>
@stop
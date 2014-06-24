@extends('layout')

@section('styles')
  {{ HTML::style('vendor/fileapi/jcrop/jquery.Jcrop.min.css');}}

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
  <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Crop and upload</h3>
      </div>
      <div class="panel-body">
        
        <div id="uploader">

          <div id="js-preview"></div>

          <div id="crop-preview" style="display: none"></div>
          
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

          <button class="js-send btn-small btn btn-primary" type="submit">Send</button>
          <button class="js-reset btn-small btn btn-warning" type="reset">Reset</button>

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
  {{ HTML::script('vendor/fileapi/jcrop/jquery.Jcrop.min.js') }}
  <script>
  $(function() {
    $('#uploader').fileapi({
      multiple: false,
      accept: 'image/*',
      url: '{{ url("upload") }}',
      elements: {
        size: '.js-size',
        active: { show: '.js-upload', hide: '.js-browse' },
        progress: '.js-progress',
        ctrl: { upload: '.js-send', reset: '.js-reset' },
        empty: { hide: '.js-upload' },
        preview: {
          el: '#js-preview', 
          width: 150, 
          height: 150
        }
      },
      onSelect: function (evt, data){
        var file = data.files[0]; // Select the file 
        if( !FileAPI.support.transform ) {
          alert('Sorry, your browser does not support cropping');
        }
        // Only if the image is valid, crop it
        if( file ){
          $('#crop-preview').show(); // Show the cropper element
          
          // Upload cropped image when "Send" button is pressed
          $('.js-send')
            .unbind('fileapi')
            .bind('click.fileapi', function (){
              $('#crop-preview').hide();
              $('#uploader').fileapi('upload');
            });
          
          // Attach the cropper
          $('#crop-preview').cropper({
            file: file, // Use the selected image
            bgColor: '#fff',
            maxSize: [$('#crop-preview').width()], // Make the cropper fit inside the preview
            onSelect: function (coords){
              $('#uploader').fileapi('crop', file, coords);
            }
          });
        }
      }
    });
  });
  </script>
@stop
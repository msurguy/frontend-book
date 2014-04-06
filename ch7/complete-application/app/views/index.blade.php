@extends('layout')

@section('styles')
  {{ HTML::style('vendor/selectize/css/selectize.css') }}
  {{ HTML::style('vendor/selectize/css/selectize.default.css') }}
@endsection

@section('content')
<div class="row centered-form">
  <div class="col-xs-12 col-sm-12 col-md-4 col-sm-offset-2 col-md-offset-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Searching for a city</h3>
      </div>
      <div class="panel-body">

        {{ Form::open() }}

          <div class="form-group">
            <label for="city">Please choose your city</label>
            <select id="city" name="city">
              <option value="">Choose a city...</option>
            </select>
          </div>

          @if(isset($city))
            <p><strong>You have chosen:</strong><br>
            City name: {{ $city->name }}<br>
            Country: {{ $city->country }}<br>
            Latitude: {{ $city->lat }}<br>
            Longitude: {{ $city->lng }}<br>
            Want a google map? Click <a target="_blank" href="https://www.google.com/maps/search/{{ $city->lat.',+'.$city->lng}}">here</a><br>
            </p>
          @endif
           
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
    var root = '{{ url("/")}}';
    
    $(function() {
      $('#city').selectize({
        valueField: 'id',
        labelField: 'name',
        searchField: ['name'],
        render: {
          option: function(item, escape) {
            return '<div>' + escape(item.name) + ', ' + escape(item.country) + '</div>';
          }
        },
        load: function(query, callback) {
          if (!query.length) return callback();
          $.ajax({
            url: root + '/api',
            type: 'GET',
            dataType: 'json',
            data: {
              q: query
            },
            success: function(res) {
              callback(res.data);
            }
          });
        }
      });
    });  
  </script>
@stop
@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('Test') ::
    @parent
@stop

{{-- Page content --}}
@section('map-content')
   
    <script>
        $( document ).ready(function() {
            $('#pad-wrapper').hide();
        });
    </script>
    <div id="map" style="height: 500px">
        
    </div>
@stop


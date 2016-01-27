@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('general.Map') ::
    @parent
@stop

{{-- Page content --}}
@section('map-content')


    <link rel="stylesheet" href="assets/css/mapping/leaflet.css" />
    <link rel="stylesheet" href="assets/css/mapping/leafletmap.css" />
    <link rel="stylesheet" href="assets/css/mapping/Leaflet.NavBar.css" />
    <link rel="stylesheet" href="assets/css/mapping/styledLayerControl.css" />


    <script src="assets/js/mapping/leaflet.js"></script>
    <script src="assets/js/mapping/Leaflet.NavBar.js" type="text/javascript"></script>
    <script src="assets/js/mapping/styledLayerControl.js"></script>
    <script src="http://maps.google.com/maps/api/js?v=3.2&sensor=false"></script>
    <script src="assets/js/mapping/leaflet-google.js" type="text/javascript"></script>

    {{--<div class="col-md-12">--}}
    <div id="map" style="height: 500px">
    <script src="assets/js/mapping/map.js" type="text/javascript"></script>

    </div>
    {{--</div>--}}


   @stop


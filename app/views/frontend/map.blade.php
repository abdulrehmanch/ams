@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('Map') ::
    @parent
@stop

{{-- Page content --}}
@section('map-content')

     <!-- Mapping -->
    <link rel="stylesheet" href="assets/css/mapping/leaflet.css" />
    <link rel="stylesheet" href="assets/css/mapping/Leaflet.NavBar.css" />
    <link rel="stylesheet" href="assets/css/mapping/styledLayerControl.css" />
    <link rel="stylesheet" href="assets/css/mapping/leaflet.label.css" />
    <link rel="stylesheet" href="assets/css/mapping/leafletmap.css" />

    <!-- Load Leaflet from CDN-->
    <script src="assets/js/mapping/leaflet.js"></script>
    <script src="http://maps.google.com/maps/api/js?v=3.2&sensor=false"></script>
    <script src="assets/js/mapping/Leaflet.NavBar.js" type="text/javascript"></script>
    <script src="assets/js/mapping/styledLayerControl.js"></script>
    <script src="assets/js/mapping/leaflet-google.js" type="text/javascript"></script>
    <script src="assets/js/mapping/leaflet.label.js"></script>
    <!-- Load Esri Leaflet from CDN -->
    <script src="assets/js/mapping/esri-leaflet.js"></script>
    <!-- Mapping END -->


    <div id="map" style="height: 500px">
        <script src="assets/js/mapping/map_main.js" type="text/javascript"></script>
    </div>

    <style type="text/css">

    .radio{
        float: left; 
        display: block;
        min-height: 10px;
        margin-top: -2px;
        margin-bottom: 7px;
        padding-left: 22px;
        vertical-align: middle;       
    }
    .leaflet-control-layers-base >label >span{
        position: relative;
        margin-top: 10px;

    }
     .mapNavigation {
        padding: 6px 8px;
        font: 14px/16px Arial, Helvetica, sans-serif;
        background: white;
        background: rgba(255,255,255,0.8);
        box-shadow: 0 0 15px rgba(0,0,0,0.2);
        border-radius: 5px;
  }


    </style>
    
@stop


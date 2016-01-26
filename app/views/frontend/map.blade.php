@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('general.Map') ::
    @parent
@stop

{{-- Page content --}}
@section('map-content')

    <link rel="stylesheet" href="http://libs.cartocdn.com/cartodb.js/v3/3.15/themes/css/cartodb.css" />
    <script src="http://libs.cartocdn.com/cartodb.js/v3/3.15/cartodb.js"></script>
    {{--<div class="col-md-12">--}}
    <div id="map" style="height: 500px">
        <script>
                var map = new L.Map('map', {
                    zoomControl: false,
                    center: [43, 0],
                    zoom: 3
                });
                L.tileLayer('http://tile.stamen.com/toner/{z}/{x}/{y}.png', {
                    attribution: 'Stamen'
                }).addTo(map);
                cartodb.createLayer(map, 'http://documentation.cartodb.com/api/v2/viz/2b13c956-e7c1-11e2-806b-5404a6a683d5/viz.json')
                        .addTo(map)
                        .on('done', function(layer) {
                            layer.setInteraction(true);
                            layer.on('featureOver', function(e, latlng, pos, data) {
                                cartodb.log.log(e, latlng, pos, data);
                            });
                            layer.on('error', function(err) {
                                cartodb.log.log('error: ' + err);
                            });
                        }).on('error', function() {
                    cartodb.log.log("some error occurred");
                });

        </script>
    </div>
    {{--</div>--}}


   @stop


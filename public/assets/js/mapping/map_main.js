    // map
    mapCenter = new L.LatLng(31.579006, 73.402031);
    var map = new L.Map('map', {
        center: mapCenter,
        zoom: 6,
        zoomControl: false
    });
    // Zoom Control
    map.addControl(new L.Control.Zoom({
        position: 'topleft'
    }));
    L.control.navbar().addTo(map);

    var esriTopo = L.esri.basemapLayer("Topographic");
    var esriImagery = L.esri.basemapLayer('Imagery');
    //map.addLayer(esriTopo);

    var waterQualityLyer = L.esri.dynamicMapLayer({
        url: 'http://202.166.168.188/arcgis/rest/services/Punjab/PB_Saffpani_WQ_layers_v_08042016/MapServer'
    });


    var gTerrain = new L.Google('TERRAIN');
    var gSatellite = new L.Google('SATELLITE');
    var gHybrid = new L.Google('HYBRID');
    var gStreet = new L.Google('ROADMAP');
    map.addLayer(gTerrain);



    var geoJsonData = $.getJSON('map/mapdata');
    //console.log(geoJsonData);
    var schschemesPoints;
    geoJsonData.then(function(data)
          {
          schemesPoints =   L.geoJson(data,
                {
                     onEachFeature: onEachFeature
                }).addTo(map);
          });
    // on each feature

    function onEachFeature(feature, layer) {
        // does this feature have a property named popupContent?
        if (feature.properties) {
            if (feature.properties.count > 0) {
                var popupContent = '';
                layer.bindLabel('' + feature.properties.count,
                    {
                        noHide: true,
                        className: "my-label",
                        offset: [-15, -45]
                    });
            }

                popupContent += "Scheme Name: "+ feature.properties.scheme_name + "<br>"
                + "No. of Assets Deplyed: "+ feature.properties.count + "<br>";

            layer.bindPopup(popupContent);
        }
    }

    // Layer controller
    var baseLayers =
    {
        "TOPOGRPHIC": gTerrain,
        "ESRI TOPOGRPHIC":esriTopo,
        "Satellite": gSatellite,
        "STREET MAP":gStreet,
        "HYBRID MAP":gHybrid,
        "ESRI EMAGERY":esriImagery
    };
    var overlays = {
        "Water Quality": waterQualityLyer
    };
    L.control.layers(baseLayers, overlays).addTo(map);

    //Zoom to location
    function zoomToCoord(lat, lon){

        // map.panTo([lat, lon]);
        map.setView([lat, lon], 16)
        console.log(lat);
        console.log(lon);

    }
    //
    ////  Navgation pan on Map
    ////var Navgation = L.control({position: 'bottomleft'});
    ////Navgation.onAdd = function (map) {
    ////    this._div = L.DomUtil.create('div', 'mapNavigation'); // create a div with a class "info"
    ////    this.update();
    ////    return this._div;
    ////};
    //
    ////Navgation.update = function () {
    ////
    ////    this._div.innerHTML = "";
    ////
    ////};
    //// Navgation.addTo(map);
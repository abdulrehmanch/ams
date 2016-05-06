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



var url = '';
//water quality layers
// TDS Layer

var TDS_Countours = L.esri.dynamicMapLayer({
    url: 'http://202.166.167.119:6080/arcgis/rest/services/saafpani/WQ_TDS/MapServer'
});
map.addLayer(TDS_Countours);

var Nitrate = L.esri.dynamicMapLayer({
    url: 'http://202.166.167.119:6080/arcgis/rest/services/saafpani/WQ_Nitrate/MapServer'
});
//map.addLayer(Nitrate);

var Iron = L.esri.dynamicMapLayer({
    url: 'http://202.166.167.119:6080/arcgis/rest/services/saafpani/WQ_Iron/MapServer'
});
//map.addLayer(Iron);

var Fluoride = L.esri.dynamicMapLayer({
    url: 'http://202.166.167.119:6080/arcgis/rest/services/saafpani/WQ_Fluride/MapServer'
});

var Arsenic = L.esri.dynamicMapLayer({
    url: 'http://202.166.167.119:6080/arcgis/rest/services/saafpani/WQ_Arsenic/MapServer'
});
//map.addLayer(Arsenic);
//map.addLayer(Fluoride);
// base Map Layers
//ESRI
// google
var esriTopo = L.esri.basemapLayer("Topographic");
var esriImagery = L.esri.basemapLayer('Imagery');
var gTerrain = new L.Google('TERRAIN');
var gSatellite = new L.Google('SATELLITE');
var gHybrid = new L.Google('HYBRID');
var gStreet = new L.Google('ROADMAP');
map.addLayer(gTerrain);

//Scheme Locations Layer
var geoJsonData = $.getJSON('map/mapdata');
//console.log(geoJsonData);
geoJsonData.then(function(data)
{
    L.geoJson(data,
        {
            onEachFeature: onEachFeature
        }).addTo(map);
});
// on each feature

function onEachFeature(feature, layer) {
    // does this feature have a property named popupContent?
    var popupContent = '';
    if (feature.properties) {
        if (feature.properties.count > 0) {
            layer.bindLabel('' + feature.properties.count,
                {
                    noHide: true,
                    className: "my-label",
                    offset: [-15, -45]
                });
        }

        popupContent += "<strong>Scheme Name: </strong>"+ feature.properties.scheme_name + "<br>"
            + "<strong>No. of Assets Deplyed: </strong>"+ feature.properties.count + "<br>"
            +"<strong>Capacity: </strong>" + "Data Not Provided <br>"
            +"<strong>No. of People Served: </strong>" + "Data Not Provided <br>" ;

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
    "TDS": TDS_Countours,
    "Nitrate": Nitrate,
    "Iron":Iron,
    "Fluoride":Fluoride,
    "Arsenic": Arsenic
};
L.control.layers(baseLayers, overlays).addTo(map);

//Zoom to location
function zoomToCoord(lat, lon){

    // map.panTo([lat, lon]);
    map.setView([lat, lon], 16)
    console.log(lat);
    console.log(lon);

}

var legend = L.control({position: 'bottomleft'});

legend.onAdd = function (map) {
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML = '<div>' +
        '<h3>Legend</h3>' +
        '</div> <div class= "legend-internal">'+
        '<img src="assets/js/mapping/images/marker-icon.png" alt="Location ICON" height="20" width="15">'+
        '<label for="img">Schemes Locations</label><br>'+
        '<h4>TDS</h4>'+
        '<i style="background:#2491C7"></i> 226 - 500<br>' +
        '<i style="background:#A0C29C"></i> 500 - 1000<br>' +
        '<i style="background:#FAFA63"></i> 1000 - 1500<br>' +
        '<i style="background:#FA8D33"></i> 1500 - 2000<br>' +
        '<i style="background:#E80712"></i> 2000 - 2930<br>' +
        '<h4>Nitrite (mg/l)</h4>' +
            '<i style="background:#2491C7"></i> <=10<br>' +
            '<i style="background:#A0C29C"></i> 10 - 15<br>' +
            '<i style="background:#FAFA63"></i> 15 - 20<br>' +
            '<i style="background:#FA8D33"></i> 20 - 25<br>' +
            '<i style="background:#E80712"></i> >25<br>' +
            '<h4>Iron (mg/l)</h4>' +
            '<i style="background:#2491C7"></i> <=0.02<br>' +
            '<i style="background:#BFD389"></i> 0.02 - 0.1<br>' +
            '<i style="background:#FDB445"></i> 0.1 - 0.3<br>' +
            '<i style="background:#E81212"></i> >0.3<br>' +
            '<h4>Flouride (mg/l)</h4>' +
            '<i style="background:#2491C7"></i> <=0.5<br>' +
            '<i style="background:#BFD389"></i> 0.5-1<br>' +
            '<i style="background:#FDB445"></i> 1-1.5<br>' +
            '<i style="background:#E81212"></i> >1.5<br>' +
            '<h4>Arsenic (mg/l)</h4>' +
            '<i style="background:#2491C7"></i> <=0.5<br>' +
            '<i style="background:#BFD389"></i> 0.5-1<br>' +
            '<i style="background:#FDB445"></i> 1-1.5<br>' +
            '<i style="background:#E81212"></i> >1.5<br>' +
            '</div>';

    return div;
};

legend.addTo(map);


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
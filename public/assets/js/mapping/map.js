// map



mapCenter = new L.LatLng(31.579006, 73.402031);
var map = new L.Map('map', {
    center: mapCenter,
    zoom: 6,
    zoomControl: false
});


////  Title of Map
//var title = L.control({
//    position: 'topleft'
//});
//title.onAdd = function(map) {
//    this._div = L.DomUtil.create('div', 'nav'); // create a div with a class "info"
//    this.update();
//    return this._div;
//};
//title.update = function() {
//
//    // '<!-- background-image: url('images/header-back.jpg'); -->'+
//    this._div.innerHTML = '<div id="header" class="title_box" style="height:10%; width: 100%; ' +
//        'float:left;text-align:left; margin-left: 1%" >' +
//        '<h1> <b>خريطة البلدی</b></h1>' +
//        '</div>'
//};
//title.addTo(map);

map.addControl(new L.Control.Zoom({
    position: 'topleft'
}));
L.control.navbar().addTo(map);

// Layer Switcher
var googleLayer = new L.Google('ROADMAP'), googleLayerh = new L.Google('HYBRID');
map.addLayer(googleLayer);
var baseLayers = {
    "ROADMAP": googleLayer,
    "HYBRID": googleLayerh
};
L.control.layers(baseLayers).addTo(map);
map.addLayer(googleLayer);


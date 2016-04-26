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

// Layer Switcher
var googleLayer = new L.Google('ROADMAP'), googleLayerh = new L.Google('HYBRID');
map.addLayer(googleLayer);
var baseLayers = {
    "ROADMAP": googleLayer,
    "HYBRID": googleLayerh
};
L.control.layers(baseLayers).addTo(map);
map.addLayer(googleLayer);

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
    if (feature.properties) {
    	var popupContent = '';
      layer.bindLabel('' +feature.properties.count, 
        {
          noHide:true,
          className: "my-label",
          offset: [-15, -42] 
        });
      popupContent += "Scheme Name: "+ feature.properties.scheme_name + "<br>"
      + "No. of Assets Deplyed: "+ feature.properties.count + "<br>";
      
        layer.bindPopup(popupContent);
    }
}

//  Navgation pan on Map
 var Navgation = L.control({position: 'bottomleft'});

  Navgation.onAdd = function (map) {
  this._div = L.DomUtil.create('div', 'mapNavigation'); // create a div with a class "info"
  this.update();
  return this._div;
  };
  
  Navgation.update = function () {
    
  this._div.innerHTML = '<h4> <b>Navigation Pan</b></h4>' + 
  
  '<h4> Select District </h4>' +
  '<select id="dist" >' +
      '<option id="pk" value="default">Default</option>' +
      '<option id="CKL" value="CKL">Chakwal</option>' +
      '<option id="Jhelum" value="JLM">Jhelum</option>  ' +
  '</select>' + 
  '<h4>Select Mineral </h4>' +
  '<select id="mineral" >' +
      '<option id="noData" value="default">Default</option>' +
      '<option id="Coal" value="Coal">Coal</option>' +
      '<option id="LimeStone" value="Lime Stone">Lime Stone</option>  '+
  '</select>' +
  
  '<h4>Select by Production </h4>' +
  '<select id="Production" >'+
      '<option id="noData" value="default">Default</option>'+
      '<option id="Highest" value="High">High</option>'+
      '<option id="Medium" value="Medium">Medium</option>'+
      '<option id="Low" value="Low">Low</option>'+
  '</select>' 
  
  };
   // Navgation.addTo(map);

function zoomToCoord(lat, lon){

  // map.panTo([lat, lon]);
  map.setView([lat, lon], 16)
  console.log(lat);
  console.log(lon);

}
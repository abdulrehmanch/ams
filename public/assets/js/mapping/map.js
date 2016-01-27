// map
mapCenter = new L.LatLng(23.19611, 45.80997);
var map = new L.Map('map', {
    center: mapCenter,
    zoom: 6,
    zoomControl: false
});


//  Title of Map
var title = L.control({
    position: 'topleft'
});
title.onAdd = function(map) {
    this._div = L.DomUtil.create('div', 'nav'); // create a div with a class "info"
    this.update();
    return this._div;
};
title.update = function() {

    // '<!-- background-image: url('images/header-back.jpg'); -->'+
    this._div.innerHTML = '<div id="header" class="title_box" style="height:10%; width: 100%; ' +
        'float:left;text-align:left; margin-left: 1%" >' +
        '<h1> <b>خريطة البلدی</b></h1>' +
        '</div>'
};
title.addTo(map);

map.addControl(new L.Control.Zoom({
    position: 'topleft'
}));
L.control.navbar().addTo(map);
//  poweredby 
var header = L.control({
    position: 'bottomright'
});
header.onAdd = function(map) {
    this._div = L.DomUtil.create('div', 'header'); // create a div with a class "header"
    this.update();
    return this._div;
};
header.update = function() {
    // '<!-- background-image: url('images/header-back.jpg'); -->'+
    this._div.innerHTML = '<a><b>Copyright &copy; <a href = "http://geosouls.com/">Geosouls</a> 2015</b></a>'
};
header.addTo(map);
L.control.scale({
    position: 'bottomright'
}).addTo(map);

// Data Loding
var searchControl;
var proLayer;
var activeLayer;

//  method data loading
var region = new L.GeoJSON.AJAX('Data/Region.json', {
    style: Region,
    onEachFeature: onEachFeature
});
// region.addTo(map);

var governorates = new L.GeoJSON.AJAX('Data/Governorates.json', {
    style: Governorates,
    onEachFeature: onEachFeature
});

var subDvisionsPlans = new L.GeoJSON.AJAX('Data/SubDvisionsPlans.json', {
    style: SubDvisionsPlans,
    onEachFeature: onEachFeature
});
var planParcels = new L.GeoJSON.AJAX('Data/PlanParcels.json', {
    style: PlanParcels,
    onEachFeature: onEachFeature
});
var roadPolygon = new L.GeoJSON.AJAX('Data/RoadPolygon.json', {
    style: RoadPolygon,
    onEachFeature: onEachFeature
});
var pavement = new L.GeoJSON.AJAX('Data/Pavement.json', {
    style: Pavement,
    onEachFeature: onEachFeature
});
var roadCenterLine = new L.GeoJSON.AJAX('Data/RoadCenterLine.json', {
    style: RoadCenterLine,
    onEachFeature: onEachFeature
});

//  the method creating point featurs from json
function pointToLayer(feature, latlng) {
    return L.circleMarker(latlng);
};
var religiousServices = new L.GeoJSON.AJAX('Data/ReligiousServices.json', {
    pointToLayer: pointToLayer,
    style: ReligiousServices,
    onEachFeature: onEachFeature
});
var parksAndRecreation = new L.GeoJSON.AJAX('Data/ParksAndRecreation.json', {
    pointToLayer: pointToLayer,
    style: ParksAndRecreation,
    onEachFeature: onEachFeature
});
var municipalityServices = new L.GeoJSON.AJAX('Data/MunicipalityServices.json', {
    pointToLayer: pointToLayer,
    style: MunicipalityServices,
    onEachFeature: onEachFeature
});

// governorates.addTo(map);
var soybeans_sp = L.layerGroup(
    [
        region, governorates, subDvisionsPlans, planParcels, roadPolygon, pavement,
        roadCenterLine, religiousServices, parksAndRecreation, municipalityServices



    ]);
// Search 

function search(dataLayer) {

    var searchControl = new L.Control.Search({
        layer: dataLayer,
        propertyName: 'ML_No',
        circleLocation: false
    });
    searchControl.on('search_locationfound', function(e) {
        e.layer.setStyle({
            fillColor: '#3f0',
            color: '#0f0'
        });
        e.target.getBounds();
        if (e.layer._popup)
            e.layer.openPopup();
    }).on('search_collapsed', function(e) {
        dataLayer.eachLayer(function(layer) { //restore feature color
            dataLayer.resetStyle(layer);
        });
    });
    map.addControl(searchControl);
    return searchControl
};
// map.addControl( searchControl );  //inizialize search control

// Layer Switcher
var googleLayer = new L.Google('ROADMAP'),
    googleLayerh = new L.Google('HYBRID');
map.addLayer(googleLayer);
map.addLayer(region);

var baseMaps = [{
    groupName: "Base Layers",
    expanded: true,
    layers: {
        "Satellite": googleLayerh,
        "Road Map": googleLayer
    }
}];

var overlays = [{
    groupName: "Administratvie Boundries",
    expanded: true,
    layers: {

        "Region": region,
        "Governorates": governorates,
    }
}, {
    groupName: "WadiAldwasir",
    expanded: true,
    layers: {
        "Sub Dvisions Plans": subDvisionsPlans,
        "Plan Parcels": planParcels,
        "Road Polygon": roadPolygon,
        "Pavement": pavement,
        "Road CenterLine": roadCenterLine,
        "Religious Services": religiousServices,
        "Parks And Recreation": parksAndRecreation,
        "Municipality Services": municipalityServices
    }
}];

// configure StyledLayerControl options for the layer soybeans_sp
soybeans_sp.StyledLayerControl = {
    removable: true
}

var options = {
    container_width: "300px",
    container_maxHeight: "350px",
    group_maxHeight: "1000px",
    exclusive: true

};

var control = L.Control.styledLayerControl(baseMaps, overlays, {
    collapsed: false
}, options);
map.addControl(control);
// Loader ICON
var controlLoader = L.control.loader().addTo(map).show();
setTimeout(function() {
    controlLoader.hide();
}, 5000);

// Popup

// HighLight clicked feature
function highlightFeature(e) {
    var layer = e.target;

    // info.update(layer.feature.properties);
    layer.setStyle({
        weight: 1,
        color: 'red',
        dashArray: '',
        fillOpacity: 0.7
    });

    if (!L.Browser.ie && !L.Browser.opera) {
        layer.bringToFront();
    }
}
// Reset all styles of selected 
function resetHighlight(e) {
    if (lastClicked != null) {
        var layer = lastClicked.target;
        var feature = layer.feature;
        layer.setStyle({
            fillColor: '#99FF33',
            weight: 2,
            opacity: 1,
            color: 'white',
            dashArray: '3',
            fillOpacity: 0.7
        });
    }
    // info.update();
}

// ZoomTo clicked feature
var lastClicked;

function zoomToFeature(e) {
    resetHighlight(lastClicked)
    lastClicked = e;
    map.fitBounds(e.target.getBounds());
    highlightFeature(e)
}

function onEachFeature(feature, layer) {


    // var popupContent = "<p>I started out as a GeoJSON " +
    //     feature.geometry.type + ", but now I'm a Leaflet vector!</p>";

    // // if (feature.properties && feature.properties.popupContent) {
    // //   popupContent += feature.properties.popupContent;
    // // }

    // layer.bindPopup(popupContent);

    layer.on({
        // mouseover: highlightFeature, 
        // mouseout: resetHighlight,
        click: zoomToFeature,


    });
}

// Info box
// var info = L.control({position: 'bottomleft'});

// info.onAdd = function (map) {
// this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
// this.update();
// return this._div;
// };

// // method that we will use to update the control based on feature properties passed
// info.update = function (props) {

// this._div.innerHTML = '<h2>Information</h2>' +  
//     (props ?
//                         props.ML_No + "<br />"+
//                         props.Lessee+ "<br />"+
//                         "Mining Lease"+ "<br />"+
//                         "Date Grant: " + props.Grant_date+ "<br />"+
//                         "Expire Date "  + props.end_date + "<br />"+
//                         "Mineral: " +  props.Mineral +"<br />"+
//                         "Area: " +  props.area+ "<br />"+
//                         "Production: " +  props.Production 
//     : 'Design by Abdul Rehman');
// };

// info.addTo(map);

// // Get colour for legend
// function getColor(d) {
//         return d > 20000 ? '#800026' :
//         d > 15000  ? '#BD0026' :
//         d > 10000  ? '#E31A1C' :
//         d > 5000  ? '#FC4E2A' :
//         d > 2500   ? '#FD8D3C' :
//         d > 1000   ? '#FEB24C' :
//         d > 100   ? '#FED976' :
//         '#FFEDA0';
// }



// legend.open();
// var legend = L.control({position: 'bottomleft'});

// legend.onAdd = function (map) {
//       var div = L.DomUtil.create('div', 'legend');

// return div;
// };

// legend.addTo(map);

// subDvisionsPlans.onAdd = function(map){
//   alert("working")
//   // map.fitBounds(subDvisionsPlans);
// }

// dataLayer.once("load", function(){
// console.log("finished loaded shapefile");
// });
//  Header of map
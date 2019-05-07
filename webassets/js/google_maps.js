// function initMap() {

// 	map = new google.maps.Map(document.getElementById('map_validasi'), {
// 		center: {
// 			lat: -7.0512269,
// 			lng: 110.3893301
// 		},
// 		zoom: 12
// 	});

// 	var marker = new google.maps.Marker({
// 		position: {
// 			lat: -7.0512269,
// 			lng: 110.3893301
// 		},
// 		map: map,
// 		draggable: true,
// 	});

// 	google.maps.event.addDomListener(marker, 'dragend', function (evt) {
// 		//document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
// 		document.getElementById("lat").value = evt.latLng.lat().toFixed(3);
// 		document.getElementById("lng").value = evt.latLng.lng().toFixed(3);
// 	});

// }

// var map = new ol.Map({
// 	target: 'map_validasi',
// 	layers: [
// 		new ol.layer.Tile({
// 			source: new ol.source.OSM()
// 		})
// 	],
// 	view: new ol.View({
// 		center: ol.proj.fromLonLat([110.32, -7.43]),
// 		zoom: 14
// 	})
// });

// import Map from 'ol/Map.js';
// import View from 'ol/View.js';
// import {
// 	defaults as defaultControls
// } from 'ol/control.js';
// import MousePosition from 'ol/control/MousePosition.js';
// import {
// 	createStringXY
// } from 'ol/coordinate.js';
// import TileLayer from 'ol/layer/Tile.js';
// import OSM from 'ol/source/OSM.js';

var mousePositionControl = new MousePosition({
	coordinateFormat: createStringXY(4),
	projection: 'EPSG:4326',
	// comment the following two lines to have the mouse position
	// be placed within the map.
	className: 'custom-mouse-position',
	target: document.getElementById('mouse-position'),
	undefinedHTML: '&nbsp;'
});

var map = new Map({
	controls: defaultControls().extend([mousePositionControl]),
	layers: [
		new TileLayer({
			source: new OSM()
		})
	],
	target: 'map_validasi',
	view: new View({
		center: [0, 0],
		zoom: 2
	})
});

var projectionSelect = document.getElementById('projection');
projectionSelect.addEventListener('change', function (event) {
	mousePositionControl.setProjection(event.target.value);
});

var precisionInput = document.getElementById('precision');
precisionInput.addEventListener('change', function (event) {
	var format = createStringXY(event.target.valueAsNumber);
	mousePositionControl.setCoordinateFormat(format);
});

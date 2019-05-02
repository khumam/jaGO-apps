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

var map = new ol.Map({
	target: 'map',
	layers: [
		new ol.layer.Tile({
			source: new ol.source.OSM()
		})
	],
	view: new ol.View({
		center: ol.proj.fromLonLat([110.32, -7.43]),
		zoom: 14
	})
});

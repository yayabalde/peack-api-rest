import './styles/global.scss';
import $ from 'jquery';
global.$ = global.jQuery = $;
import 'bootstrap';
import 'leaflet/dist/leaflet';
import './bootstrap';

$(function() {
    $('[data-toggle="popover"]').popover();
});

$(function() {
    const baseUrl = $('#map').attr('data-url');
    if(baseUrl){
        var map = L.map('map',{
            dragging: true
        }).setView([39.61, -105.02], 10);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        var icon = L.icon({
            iconUrl: baseUrl + '/images/peak.png',
            iconSize:     [50, 50], // size of the icon
            shadowSize:   [50, 64], // size of the shadow
            iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        $.ajax({
            type: "GET",
            url: baseUrl + '/api/peaks',
            cache: false,
            dataType    : 'json',
            success: function(data){
                $.each( data, function( key, peak ) {
                    var popup = '<strong>Peack info</strong><br/>Name: ' + peak.name + '<br/>Altitude: ' + parseFloat(peak.altitude) + '<br/>Latitude: ' + parseFloat(peak.lat) + '<br/>Longitude: ' + parseFloat(peak.lon);
                    L.marker([parseFloat(peak.lat), parseFloat(peak.lon)], {icon: icon}).bindPopup(popup).addTo(map);
                });
            },
            error: function(data)
            {
            }
        });
    }
});

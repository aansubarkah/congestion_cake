<style>
#map {
    width: 100%;
    height: 300px;
    margin: 0;
    padding: 0;
}
</style>
<!-- Panel Peta -->
<div class="panel panel-default">
    <div class="panel-heading">
        <form>
        <div class="input-group custom-search-form">
            <input name="search" class="form-control" placeholder="Jump to a place..." type="text" autocomplete="off" id="jumpToPlace">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit" disabled>
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
        <!-- /.custom-search-form -->
        </form>
    </div>
    <div class="panel-body">
        <div id="map"></div>
    </div>
</div>
<!-- ./Panel Peta -->
<!-- Raws Panel -->
<?php
$placeId = 0;
$placeName = '';
$placeLat = 0;
$placeLng = 0;
if ($piece->place_id != null || $piece->place_id == 0)
{
    $placeId = $piece->place_id;
    $placeName = $piece->place_name;
    $placeLat = $piece->place_lat;
    $placeLng = $piece->place_lng;
}
/*if ()
if (count($data->label_spot) > 0) {
    if ($data->label_spot[0]->place_id != null || $data->label_spot[0])
    {
        $placeId = $data->label_spot[0]->place_id;
        $placeName = $data->label_spot[0]->place_name;
    }
}*/
?>
<div class="panel panel-default">
    <div class="panel-heading">Twitter</div>
    <div class="panel-body">
    <div class="container-fluid">
<?php
echo $this->Form->create(null, [
    'url' => ['controller' => 'LabelSpot', 'action' => 'view'],
    'id' => 'addPlaceForm'
]);
?>
        <form id="addPlaceForm">
            <div class="form-group">
                <input name="space_id" type="hidden" id="spaceId" value=<?php echo $piece->space_id; ?>>
                <input name="piece_id" type="hidden" id="pieceId" value=<?php echo $piece->piece_id; ?>>
                <input name="place_id" type="hidden" id="addPlaceId" value=<?php echo $placeId; ?>>
                <input name="place_lat" type="hidden" id="addPlaceLat" value=<?php echo $placeLat; ?>>
                <input name="place_lng" type="hidden" id="addPlaceLng" value=<?php echo $placeLng; ?>>
                <p id="addPlaceInfo"><?php echo $data->info; ?></p>
                <span class="label label-default"><i class="fa fa-map-marker fa-fw"></i><?php echo $piece->place; ?></span> <span class="label label-default"><i class="fa fa-bullhorn fa-fw"></i><?php echo $piece->condition; ?></span> <span class="label label-default"><i class="fa fa-cloud fa-fw"></i><?php echo $piece->weather; ?></span>
                <!--<textarea class="form-control" rows="3" id="addPlaceInfo" disabled></textarea>-->
            </div>
            <div class="form-group">
                <div id="typeahead">
<?php
echo $this->Form->text('place', [
    'label' => false,
    'class' => 'form-control typeahead',
    'placeholder' => 'Tempat',
    'autocomplete' => 'off',
    'id' => 'addPlace',
]);
?>
</div>
                <!--<input type="text" class="form-control" id="addPlaceName" placeholder="Tempat">-->
            </div>
            <div class="form-group">
<?php
$options = [];
foreach ($categories as $value)
{
    $options[$value['id']] = $value['name'];
}

echo $this->Form->select('category_id', $options, ['class' => 'form-control', 'id' => 'addPlaceCategory', 'default' => $piece->category_id]);
?>
            </div>
            <div class="form-group">
<?php
$options = [];
foreach ($weather as $value)
{
    $options[$value['id']] = $value['name'];
}
echo $this->Form->select('weather_id', $options, ['class' => 'form-control', 'id' => 'addPlaceWeather', 'default' => $piece->weather_id]);
?>
            </div>
        </form>
        <div class="row pull-right">
            <div class="col-md-10 col-md-offset-2">
<?php
echo $this->Html->link(
    'Kembali',
    ['controller' => 'LabelSpot', 'action' => 'index'],
    ['class' => 'btn btn-default']
);
?>
                <button id="btn-save" type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        <!-- /.row -->

    </div><!-- ./container-fluid -->
    </div><!-- ./panel-body -->
</div>
<!-- ./Raws Panel -->
<?php
echo $this->Html->script(['bloodhound.min', 'typeahead.jquery.min']);
echo $this->Html->css(['typeahead']);
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTjjNCrAno7LpLbbRXXA4yqH1yBYemPfY&libraries=places&callback=initMap" async defer></script>
<script>
var map = null;
var gMarkers = [];

function clearOverlays() {
    for (var i = 0; i < gMarkers.length; i++) {
        gMarkers[i].setMap(null);
    }
    gMarkers.length = 0;
}

function addMarker(map, title, lat, lng, draggable = false) {
    var marker = new google.maps.Marker({
        draggable: draggable,
        position: {lat: lat, lng: lng},
        map: map,
        title: title
    });

    return marker;
}

function initMap() {
    var markers = [];
<?php

if ($piece->place_id != null || $piece->place_id != 0)
{
echo 'markers.push(["' . $piece->place_name . '", ' . $piece->lat . ', ' . $piece->lng . ']);';
}
?>
    if(markers.length > 0) {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: {lat: markers[0][1], lng: markers[0][2]}
        });

        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        for(i=0; i<markers.length; i++) {
            marker = addMarker(map, markers[i][0], markers[i][1], markers[i][2]);
            gMarkers.push(marker);
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(markers[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    } else {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: {lat: -7.391175, lng: 112.735432}
        });
    }

    // do not show save button before google maps fully loaded
    google.maps.event.addListenerOnce(map, 'idle', function(){
        document.getElementById("btn-save").disabled = false;
    });
}

$(document).ready(function(){
    // disable until google maps loaded
    $('#btn-save').prop('disabled', true);
    var places = new Bloodhound({
        datumTokenizer: function(datum) {
            return Bloodhound.tokenizers.whitespace(datum.value);
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            url: '<?php echo $this->Url->build(['controller' => 'SuggestionSpot', 'action' => 'view']);?>' + '/%QUERY',
            wildcard: '%QUERY',
            filter: function(place) {
                if (place) {
                    return $.map(place.data, function(datum) {
                        return {
                            id: datum.id,
                            value: datum.value,
                            lat: datum.lat,
                            lng: datum.lng
                        }
                    });
                } else {
                    return {};
                }
            }
        }
    });

    $('#addPlace').typeahead({
        hint: true,
        highlight: true,
        minLength: 3
    }, {
        display: 'value',
        source: places,
        templates: {
            empty: function() {
                $('#addPlaceId').val(0);
            }
        }
    });
    $('#addPlace').on('typeahead:selected', function(e, datum) {
        $('#addPlaceId').val(datum.id);
        $('#addPlaceLat').val(datum.lat);
        $('#addPlaceLng').val(datum.lng);
        createNewMarkerFromSuggestion(datum.value, datum.lat, datum.lng);
    });

    function createNewMarkerFromSuggestion(name, lat, lng) {
        clearOverlays();
        var infowindow = new google.maps.InfoWindow();
        map.setCenter({lat: lat, lng: lng});
        map.setZoom(16);
        var marker = addMarker(map, name, lat, lng);
        gMarkers = [];
        gMarkers.push(marker);
        google.maps.event.addListener(marker, 'click', (function(marker) {
            return function() {
                infowindow.setContent(name);
                infowindow.open(map, marker);
            }
        })(marker));
    }

    google.maps.event.addListener(map, 'click', function(event) {
        placeMarker(event.latLng, map);
    });

    function placeMarker(location, map) {
        // clear all markers
        clearOverlays();
        var marker = addMarker(map, '', location.lat(), location.lng(), true);
        gMarkers = [];
        gMarkers.push(marker);

        // set place_id to 0
        $('#addPlaceId').val(0);
        $('#addPlaceLat').val(location.lat());
        $('#addPlaceLng').val(location.lng());

        google.maps.event.addListener(marker, 'dragend', function(event) {
            $('#addPlaceLat').val(event.latLng.lat());
            $('#addPlaceLng').val(event.latLng.lng());
            console.log(event.latLng.lat());
            console.log(event.latLng.lng());
        });
    }
    // autocomplete for google maps to jump to other city
    autocomplete = new google.maps.places.Autocomplete((
        document.getElementById('jumpToPlace')), {
            types: ['(cities)'],
            componentRestrictions: {'country': 'id'}
    });
    places = new google.maps.places.PlacesService(map);
    autocomplete.addListener('place_changed', onPlaceChanged);

    function onPlaceChanged() {
        var place = autocomplete.getPlace();
        if (place.geometry) {
            map.panTo(place.geometry.location);
            map.setZoom(14);
        } else {
            document.getElementById('jumpToPlace').placeholder = 'Jump to a place...';
        }
    }

    $('#btn-save').click(function() {
        var space_id = parseInt($('#spaceId').val());
        var place_id = parseInt($('#addPlaceId').val());
        var piece_id = parseInt($('#pieceId').val());
        var category_id = parseInt($('#addPlaceCategory').val());
        var weather_id = parseInt($('#addPlaceWeather').val());
        var place_name = $('#addPlace').val();
        var place_lat = $('#addPlaceLat').val();
        var place_lng = $('#addPlaceLng').val();
        if (space_id > 0 && place_id >= 0 && piece_id > 0 && category_id > 0 && weather_id > 0) {
            if (place_id == 0 && place_name && place_lat && place_lng) {
                //console.log('test...');
                $('#addPlaceForm').submit();
            }
            if (place_id > 0) {
                $('#addPlaceForm').submit();
            }
        }
    });
});
</script>

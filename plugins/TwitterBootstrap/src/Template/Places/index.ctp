<style>
body, .modal-open .page-container, .modal-open .page-container .navbar-fixed-top, .modal-open .modal-container {
    overflow-y: scroll;
}

@media (max-width: 979px) {
    .modal-open .page-container .navbar-fixed-top {
        overflow-y: visible;
    }
}

#map {
    width: 100%;
    height: 300px;
    margin: 0;
    padding: 0;
}
</style>

<div class="panel panel-default">
    <div class="panel-heading">
<?php
echo $this->Form->create(null, [
    'url' => ['controller' => 'Places', 'action' => 'index'],
    'type' => 'get'
]);
?>
        <div class="input-group custom-search-form">
            <input name="search" class="form-control" placeholder="Pencarian Lokasi..." type="text" autocomplete="off">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
        <!-- /.custom-search-form -->
<?php
echo $this->Form->end();
?>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">
        <table width="100%" class="table table-striped" id="dataTables-letters">
            <thead>
                <tr>
                    <th class="col-sm-1">#</th>
                    <th class="col-sm-2">
<?php
echo $this->Paginator->sort('regency_fullname', 'Kab/Kota');
?>
                    </th>
                    <th class="col-sm-9">
<?php
echo $this->Paginator->sort('place_name', 'Lokasi');
?>
                    </th>
                </tr>
            </thead>
            <tbody>
<?php
// get current page
$numberPage = $this->Paginator->counter('{{page}}');
$sequence = ($numberPage - 1) * $limit;
foreach($data as $datum)
{
?>
                <tr>
                    <td>
<?php
    $sequence++;
    echo $sequence;
?>
                    </td>
                    <td>
<?php
    echo $datum->regency_fullname;
?>
                    </td>
                    <td>
<?php
    echo $this->Html->link(
        $datum->place_name,
        '#',
        [
            'escape' => false,
            'class' => 'view-place',
            'lat' => $datum->lat,
            'lng' => $datum->lng,
            'place_id' => $datum->place_id,
            'place_name' => $datum->place_name,
            'hierarcy_name' => $datum->hierarchy_name,
            'regency_name' => $datum->regency_name,
            'place_fullname' => $datum->place_fullname
        ]
    );
    //echo $datum->place_name;
?>
                    </td>
                </tr>
<?php
}
?>
            </tbody>
        </table>
    </div>
    <!--<div class="row pull-right">
        <div class="col-md-10 col-md-offset-2">
            <button id="btn-save" type="button" class="btn btn-primary">Simpan</button>
        </div>
    </div>-->
    <!-- /.row -->
    <div class="row"></div>
    <div class="row pull-right">
        <div class="col-md-10 col-md-offset-2">
        <ul class="pagination">
<?php
echo $this->Paginator->first('&laquo;',['escape' => false]);
echo $this->Paginator->prev('&lsaquo;',['escape' => false]);
echo $this->Paginator->numbers();
echo $this->Paginator->next('&rsaquo;',['escape' => false]);
echo $this->Paginator->last('&raquo;',['escape' => false]);
?>
        </ul>
        </div>
    </div>
    <!-- /.row -->
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel-default-->
<!-- Modal -->
<div class="modal fade" id="viewPlace" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editModalLabel">Lokasi</h4>
    </div>
        <div class="modal-body">
            <div id="map"></div>
            <center><strong><p id="placeFullname"></p></strong></center>
        </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div><!--/.Modal-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTjjNCrAno7LpLbbRXXA4yqH1yBYemPfY&libraries=places&callback=initMap" async defer></script>
<script type="text/javascript">
var gMapLoad = false;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: {lat: -7.391175, lng: 112.735432}
    });

    // do not show save button before google maps fully loaded
    google.maps.event.addListenerOnce(map, 'idle', function(){
        gMapLoad = true;
    });
}

$(document).ready(function(){
    var map = null;
    var myLatlng = null;
    $('.view-place').click(function(){
        if (gMapLoad) {
            var coordinates = {'lat': $(this).attr('lat'), 'lng': $(this).attr('lng')};
            myLatlng = new google.maps.LatLng(coordinates.lat, coordinates.lng);
            console.log(myLatlng);
            var title = $(this).attr('place_name');
            var fullname = $(this).attr('place_fullname');
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: myLatlng,
            });

            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: title
            });
            $('#placeFullname').text(fullname);
            $('#viewPlace').modal('show');
        }
    });

    $('#viewPlace').on('shown.bs.modal', function(){
        google.maps.event.trigger(map, 'resize');
        return map.setCenter(myLatlng);
    });
});
</script>

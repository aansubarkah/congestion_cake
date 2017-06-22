<div class="panel panel-default">
    <div class="panel-heading">
<?php
echo $this->Form->create(null, [
    'url' => ['controller' => 'DataTwitter', 'action' => 'index'],
    'type' => 'get'
]);
?>
        <div class="input-group custom-search-form">
            <input name="search" class="form-control" placeholder="Pencarian Info..." type="text" autocomplete="off">
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
echo $this->Paginator->sort('t_time', 'Waktu');
?>
                    </th>
                    <th class="col-sm-9">
<?php
echo $this->Paginator->sort('t_time', 'Tweet');
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
                        <script>
                            moment.locale('id');
                            letterDate = moment('<?php echo $this->Time->format($datum->t_time, 'yyyy-MM-dd HH:mm:ss'); ?>').format('D MMMM YYYY HH:mm:ss');
                            document.write(letterDate);
                        </script><br>
<?php
    echo $this->Html->link($datum->respondent_name, ['controller' => 'Respondents', 'action' => 'view', $datum->respondent_id]);
?>
                    </td>
                    <td id="<?php echo $datum->raw_id; ?>">
<?php
    echo $datum->info;
    echo '<br>';
    echo '<kbd>Classifying</kbd> ';
    if ($datum->classification_id  == 1) {
        echo '<span class="label label-success">Relevan</span>';
    } else {
        echo '<span class="label label-danger">Tidak Relevan</span>';
    }
    if ($datum->classification_id == 1) echo '<br><br><kbd>Chunking</kbd> ';
    if (!empty($datum->data_chunk))
    {
        foreach ($datum->data_chunk as $value)
        {
            echo '<span class="label label-default">';
            echo '<i class="fa fa-map-marker fa-fw">';
            echo '</i> ';
            echo $value->place;
            echo '</span> ';
            echo '<span class="label label-default">';
            echo '<i class="fa fa-bullhorn fa-fw">';
            echo '</i>';
            echo $value->condition;
            echo '</span> ';
            echo '<span class="label label-default">';
            echo '<i class="fa fa-cloud fa-fw">';
            echo '</i> ';
            echo $value->weather;
            echo '</span> ';
        }
    } else {
        if ($datum->classification_id  == 1) echo '<span class="label label-danger"><i class="fa fa-meh-o fa-fw"></i>Fail!</span>';
    }
    if ($datum->classification_id == 1) echo '<br><br><kbd>Locating</kbd> ';
    /*echo $this->Html->link(
        'Perbaiki',
        '#',
        [
            'escape' => false,
            'class' => 'add-chunk btn btn-primary btn-xs',
            'data-toggle' => 'modal',
            'data-target' => '#addModal',
            'raw-id' => $datum->raw_id,
            'info' => $datum->info
        ]
    );*/
    echo ' ';
    if (!empty($datum->data_spot))
    {
        foreach ($datum->data_spot as $value)
        {
            echo '<span class="label label-success">';
            echo '<i class="fa fa-map-marker fa-fw">';
            echo '</i> ';
            echo $value->place_name;
            echo '</span> ';
            echo '<span class="label label-success">';
            echo '<i class="fa fa-institution fa-fw">';
            echo '</i> ';
            echo $value->hierarchy_name;
            echo ' ';
            echo $value->regency_name;
            echo '</span> ';

            // Macet Kecelakaan
            if ($value->category_id == 1 || $value->category_id == 4) {
                echo '<span class="label label-danger">';
            }
            // Padat Waspada
            if ($value->category_id == 2 || $value->category_id == 5) {
                echo '<span class="label label-warning">';
            }
            // Lancar Ramai Lancar
            if ($value->category_id == 3 || $value->category_id == 6) {
                echo '<span class="label label-primary">';
            }

            echo '<i class="fa fa-bullhorn fa-fw">';
            echo '</i>';
            echo $value->category_name;
            echo '</span> ';
            echo '<span class="label label-success">';
            echo '<i class="fa fa-cloud fa-fw">';
            echo '</i> ';
            echo $value->weather_name;
            echo '</span> ';
        }
    } else {
        if ($datum->classification_id  == 1) echo '<span class="label label-danger"><i class="fa fa-meh-o fa-fw"></i>Fail!</span>';
    }
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
echo $this->Paginator->numbers(['modulus' => 3]);
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
<?php
echo $this->Form->create(null, [
    'url' => ['controller' => 'DataSpot', 'action' => 'index'],
    'id' => 'formSpot'
]);

echo $this->Form->hidden('all_raw', [
    'id' => 'all_raw'
]);
echo $this->Form->hidden('all_place', [
    'id' => 'all_place'
]);

echo $this->Form->hidden('all_condition', [
    'id' => 'all_condition'
]);

echo $this->Form->hidden('all_weather', [
    'id' => 'all_weather'
]);

?>
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalChunk">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addModalChunk">Perbaiki Tempat dan Kondisi</h4>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <textarea class="form-control" rows="3" id="addChunkInfo" disabled></textarea>
            </div>
            <div class="form-group">
                <input type="hidden" id="addChunkRawId">
                <input type="hidden" id="addChunkTempId">
                <input type="text" class="form-control" id="addPlaceName" placeholder="Tempat">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="addConditionName" placeholder="Kondisi">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="addWeatherName" placeholder="Cuaca" value="cerah">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" id="addChunkSave">Simpan</button>
      </div>
    </div>
  </div>
</div><!--/.Modal-->

<script type="text/javascript">
    $(function(){
        raws = {};
        places = {};
        conditions = {};
        weathers = {};

        function IDGenerator() {
            this.length = 8;
            this.timestamp = +new Date;
            var _getRandomInt = function( min, max ) {
                return Math.floor( Math.random() * ( max - min + 1 ) ) + min;
            }
            this.generate = function() {
                var ts = this.timestamp.toString();
                var parts = ts.split( "" ).reverse();
                var id = "";
                for( var i = 0; i < this.length; ++i ) {
                    var index = _getRandomInt( 0, parts.length - 1 );
                    id += parts[index];
                }
                return id;
            }
        }

        $('.add-chunk').click(function(){
            $('#addChunkInfo').val($(this).attr('info'));
            $('#addChunkRawId').val($(this).attr('raw-id'));
            $('#addPlaceName').val('');
            $('#addConditionName').val('');
            $('#addWeatherName').val('cerah');
            // generate random id
            var generator = new IDGenerator()
            $('#addChunkTempId').val(generator.generate());
        });

        $('#addChunkSave').click(function(){
            var rawId = $('#addChunkRawId').val();
            var placeName = $('#addPlaceName').val();
            var conditionName = $('#addConditionName').val();
            var weatherName = $('#addWeatherName').val();
            var tempId = $('#addChunkTempId').val();
            raws[tempId] = rawId;
            places[tempId] = placeName;
            conditions[tempId] = conditionName;
            weathers[tempId] = weatherName;
            var newSpan = "<span class='label label-success' id='newPlace-" + tempId + "'>";
            newSpan += "<i class='fa fa-map-marker fa-fw'></i>";
            newSpan += " " + placeName;
            newSpan += "</span> ";
            newSpan += "<span class='label label-success' id='newCondition-" + tempId + "'>";
            newSpan += "<i class='fa fa-bullhorn fa-fw'></i>";
            newSpan += " " + conditionName;
            newSpan += "</span> ";
            newSpan += "<span class='label label-success' id='newWeather-" + tempId + "'>";
            newSpan += "<i class='fa fa-cloud fa-fw'></i>";
            newSpan += " " + weatherName;
            newSpan += "</span> ";

            $('td#' + rawId).append(newSpan);
            $('#addModal').modal('hide');
        });

        $('#btn-save').click(function(){
            if (Object.keys(places).length > 0)
            {
                $('#all_raw').val(Object.values(raws).join());
                $('#all_place').val(Object.values(places).join());
                $('#all_condition').val(Object.values(conditions).join());
                $('#all_weather').val(Object.values(weathers).join());
                $('#formChunk').submit();
            }
        });
    });
</script>


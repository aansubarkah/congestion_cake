<div class="panel panel-default">
    <div class="panel-heading">
<?php
echo $this->Form->create(null, [
    'url' => ['controller' => 'TrainKind', 'action' => 'index'],
    'type' => 'get',
    'class' => 'form-inline'
]);
?>
        <div class="form-group">
        <input type="text" class="form-control datepicker" id="startDate" name="start" placeholder="Start" value="<?php echo $start; ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control datepicker" id="endDate" name="end" placeholder="End" value="<?php echo $end; ?>">
        </div>
<?php
$options = [0 => 'All Respondents'];
foreach ($respondents as $respondent)
{
    if ($respondent->id != 11) $options[$respondent->id] = $respondent->name;
}
echo '<div class="form-group">';
echo $this->Form->select('field', $options, ['class' => 'form-control', 'id' => 'respondent', 'name' => 'respondent', 'value' => $respondent_id]);
echo '</div>';
?>
        <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $count . ' rows ' . $countHam . '(Rel) ' . $countSpam . '(Irr)';?>" disabled>
        </div>
        <div class="form-group pull-right">
            <button type="submit" class="btn btn-default">Search</button>
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
    if ($datum->classification_id == 1)
    {
        echo '<span class="label label-success">Relevan</span>';
    } else if ($datum->classification_id == 2)
    {
        echo '<span class="label label-danger">Tidak Relevan</span>';
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
    <div class="row pull-right">
        <div class="col-md-10 col-md-offset-2">
            <button id="btn-train" type="button" class="btn btn-primary">Train This</button>
        </div>
    </div>
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
<!-- Modal -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="addModalChunk">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addModalChunk">Data to Train</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-4 control-label">Responden</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="respondentForm" value="<?php echo $respondent_name;?>" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Dari</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="startForm" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Sampai</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="endForm" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Banyak Data</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="dataForm" value="<?php echo $count;?>" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Data Relevan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="hamForm" value="<?php echo $countHam;?>" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Data Tidak Relevan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="spamForm" value="<?php echo $countSpam;?>" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Banyak Data Digunakan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="limitForm" value="50">
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" id="saveForm">Train</button>
      </div>
    </div>
  </div>
</div><!--/.Modal-->
<?php
echo $this->Form->create(null, [
    'url' => ['controller' => 'TrainKind', 'action' => 'index'],
    'id' => 'trainingForm'
]);

if ($firstData != null)
{
    echo $this->Form->hidden('start_train', [
        'value' => $firstData->denomination_id
    ]);
}
if ($lastData != null)
{
    echo $this->Form->hidden('end_train', [
        'value' => $lastData->denomination_id
    ]);
}

echo $this->Form->hidden('respondent_train', [
    'value' => $respondent_id
]);

echo $this->Form->hidden('limit_train', [
    'id' => 'limit_train',
    'value' => 50
]);

echo $this->Form->end();

echo $this->Html->script(['bootstrap-datepicker.min', 'bootstrap-datepicker.id.min']);
echo $this->Html->css(['bootstrap-datepicker3.min']);
?>
<script type="text/javascript">
    $(function(){
        var startDate = moment('<?php echo $this->Time->format($firstData->t_time, 'yyyy-MM-dd HH:mm:ss'); ?>').format('D MMMM YYYY HH:mm:ss');
        $('#startForm').val(startDate);
        var endDate = moment('<?php echo $this->Time->format($lastData->t_time, 'yyyy-MM-dd HH:mm:ss'); ?>').format('D MMMM YYYY HH:mm:ss');
        $('#endForm').val(endDate);

        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            language: 'id',
            startDate: 0,
            todayHighlight: true
        });

        $('#btn-train').click(function(){
            $('#defaultModal').modal('show');
        });

        $('#saveForm').click(function(){
            $('#limit_train').val(parseInt($('#limitForm').val()));
            $('#trainingForm').submit();
        });
    });
</script>

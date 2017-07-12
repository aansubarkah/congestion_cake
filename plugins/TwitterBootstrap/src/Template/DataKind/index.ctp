<div class="panel panel-default">
    <div class="panel-heading">
<?php
echo $this->Form->create(null, [
    'url' => ['controller' => 'DataKind', 'action' => 'index'],
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
            <input type="text" class="form-control" value="Contain <?php echo $count; ?> rows" disabled>
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
                    <th>#</th>
                    <th>
<?php
echo $this->Paginator->sort('t_time', 'Waktu');
?>
                    </th>
                    <th>
<?php
echo $this->Paginator->sort('t_time', 'Tweet');
?>
                    </th>
                    <th colspan="3">
                        Relevan
                    </th>
                </tr>
                <tr>
                    <th colspan="3"></th>
                    <th>AT</th>
                    <th>MT</th>
                    <th>Simp</th>
                </tr>
            </thead>
            <tbody>
<?php
// get current page
$numberPage = $this->Paginator->counter('{{page}}');
$sequence = ($numberPage - 1) * $limit;
$falseFind = 0;
$trueFind = 0;
$totalFind = 0;
$spamAt = 0;
$hamAt = 0;
$spamMt = 0;
$hamMt = 0;
foreach($data as $datum)
{
    $totalFind++;
?>
                <tr>
                    <td width="5%">
<?php
    $sequence++;
    echo $sequence;
?>
                    </td>
                    <td width="20%">
                        <script>
                            moment.locale('id');
                            letterDate = moment('<?php echo $this->Time->format($datum->t_time, 'yyyy-MM-dd HH:mm:ss'); ?>').format('D MMMM YYYY HH:mm:ss');
                            document.write(letterDate);
                        </script><br>
<?php
    echo $this->Html->link($datum->respondent_name, ['controller' => 'Respondents', 'action' => 'view', $datum->respondent_id]);
?>
                    </td>
                    <td width="50%">
<?php
    echo $datum->info;
    /*echo $this->Html->link(
        '<i class="fa fa-folder-open-o fa-fw"></i>',
        ['controller' => 'Raws', 'action' => 'view', $datum->raw_id],
        ['escape' => false]
    );

    echo $this->Html->link(
        '<i class="fa fa-pencil fa-fw"></i>',
        ['controller' => 'Raws', 'action' => 'edit', $datum->raw_id],
        ['escape' => false]
    );
    echo $this->Html->link(
        '<i class="fa fa-trash fa-fw"></i>',
        ['controller' => 'Raws', 'action' => 'delete', $datum->raw_id],
        ['escape' => false, 'confirm' => 'Ingin Menghapus Tweet ' . $datum->info . '?']
    );*/

?>
                    </td>
                    <td width="10%">
<?php
    if ($datum->classification_id == 1)
    {
        echo '<span class="label label-success">Ya</span>';
        $hamAt++;
    } else if ($datum->classification_id == 2)
    {
        echo '<span class="label label-danger">Tidak</span>';
        $spamAt++;
    } else {
        echo '<span class="label label-default">Belum</span>';
    }
?>
                    </td>
                    <td width="15%">
<?php
    $checked = "";
    if ($datum->mt_classification_id == 1)
    {
        echo '<span class="label label-success">Ya</span>';
        $hamMt++;
        //$checked = " checked";
    } else if ($datum->mt_classification_id == 2)
    {
        echo '<span class="label label-danger">Tidak</span>';
        $spamMt++;
    }

    /*if ($datum->mt_classification_id == null)
    {

        //echo '<i class="fa fa-coffee fa-fw"></i>';
    }*/
?>
    <!--<input class="relevant" sequence="<?php echo $datum->raw_id; ?>" type="checkbox" data-group-cls="btn-group-sm" data-switch-always <?php echo $checked; ?>>-->
                    </td>
                    <td>
<?php
    if ($datum->at_classification_id == $datum->mt_classification_id)
    {
        $trueFind++;
        echo '<span class="label label-success">Benar</span>';
    } else {
        $falseFind++;
        echo '<span class="label label-danger">Salah</span>';
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
    <div class="row">
        <div class="col-md-12">
        <p>Dari <strong><?php echo $totalFind;?></strong> ditemukan <strong><?php echo $trueFind;?></strong> benar dan <strong><?php echo $falseFind;?></strong> salah, sehingga tingkat kesalahan adalah <strong><?php echo round(($falseFind/$totalFind) * 100, 2);?>%</strong>.</p>
        <p>Auto: <strong><?php echo $hamAt; ?></strong> Relevan dan <strong><?php echo $spamAt; ?></strong> Tidak Relevan.</p>
        <p>Manual: <strong><?php echo $hamMt; ?></strong> Relevan dan <strong><?php echo $spamMt; ?></strong> Tidak Relevan.</p>
        </div>
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
<?php
echo $this->Form->create(null, [
    'url' => ['controller' => 'DataTwitter', 'action' => 'index'],
    'id' => 'relevancy'
]);

echo $this->Form->hidden('all_relevant', [
    'id' => 'all_relevant'
]);

echo $this->Form->hidden('all_not_relevant', [
    'id' => 'all_not_relevant'
]);
echo $this->Html->script(['bootstrap-datepicker.min', 'bootstrap-datepicker.id.min']);
echo $this->Html->css(['bootstrap-datepicker3.min']);
?>
<script type="text/javascript">
    $(function(){
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            language: 'id',
            startDate: 0,
            todayHighlight: true
        });

        $(':checkbox').checkboxpicker({
            offLabel: 'Tidak',
            onLabel: 'Ya'
        });

        $('#btn-save').click(function(){
            var allYes = [];
            var allNo = [];
            $('.table :checked').each(function(){
                allYes.push($(this).attr('sequence'));
            });
            $('input:checkbox:not(:checked)').each(function(){
                allNo.push($(this).attr('sequence'));
            });
            $('#all_relevant').val(allYes.join());
            $('#all_not_relevant').val(allNo.join());
            $('#relevancy').submit();
        });
    });
</script>


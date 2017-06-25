<div class="panel panel-default">
    <div class="panel-heading">
<?php
echo $this->Form->create(null, [
    'url' => ['controller' => 'LabelKind', 'action' => 'index'],
    'type' => 'get',
    'class' => 'form-inline'
]);
?>
        <div class="form-group">
            <input type="text" class="form-control datepicker" id="startDate" name="start" placeholder="Start">
        </div>
        <div class="form-group">
            <input type="text" class="form-control datepicker" id="endDate" name="end" placeholder="End">
        </div>
<?php
$options = [0 => 'All Respondents'];
foreach ($respondents as $respondent)
{
    $options[$respondent->id] = $respondent->name;
}
echo '<div class="form-group">';
echo $this->Form->select('field', $options, ['class' => 'form-control', 'id' => 'respondent', 'name' => 'respondent']);
echo '</div>';
?>
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
    echo '<br><br>';
    $checked = "";
    if ($datum->at_classification_id == 1)
    {
        $checked = " checked";
    }
?>
                        <input class="relevant" sequence="<?php echo $datum->raw_id; ?>" type="checkbox" data-group-cls="btn-group-sm" data-switch-always <?php echo $checked; ?>>
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
            <button id="btn-save" type="button" class="btn btn-primary">Simpan</button>
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
<?php
echo $this->Form->create(null, [
    'url' => ['controller' => 'LabelKind', 'action' => 'index'],
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
            offLabel: 'Tidak Relevan',
            onLabel: 'Relevan'
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

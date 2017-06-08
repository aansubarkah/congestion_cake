<div class="panel panel-default">
    <div class="panel-heading">
<?php
echo $this->Form->create(null, [
    'url' => ['controller' => 'raws', 'action' => 'index'],
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
                    <th>#</th>
                    <th>
<?php
echo $this->Paginator->sort('respondent_id', 'Responden');
?>
                    </th>
                    <th>
<?php
echo $this->Paginator->sort('info', 'Tweet');
?>
                    </th>
                    <th>
                        Relevan
                    </th>
                </tr>
            </thead>
            <tbody>
<?php
// get current page
$numberPage = $this->Paginator->counter('{{page}}');
$sequence = ($numberPage - 1) * $limit;
foreach($raws as $raw)
{
?>
                <tr>
                    <td width="10%">
<?php
    $sequence++;
    echo $sequence;
?>
                    </td>
                    <td width="20%">
<?php
    echo $raw->has('respondent') ? $this->Html->link($raw->respondent->name, ['controller' => 'Respondents', 'action' => 'view', $raw->respondent->id]) : '';
?>
                    </td>
                    <td width="55%">
<?php
    echo $raw->info;
    echo $this->Html->link(
        '<i class="fa fa-folder-open-o fa-fw"></i>',
        ['controller' => 'Raws', 'action' => 'view', $raw->id],
        ['escape' => false]
    );

    echo $this->Html->link(
        '<i class="fa fa-pencil fa-fw"></i>',
        ['controller' => 'Raws', 'action' => 'edit', $raw->id],
        ['escape' => false]
    );
    echo $this->Html->link(
        '<i class="fa fa-trash fa-fw"></i>',
        ['controller' => 'Raws', 'action' => 'delete', $raw->id],
        ['escape' => false, 'confirm' => 'Ingin Menghapus Tweet ' . $raw->info . '?']
    );


?>
                    </td>
                    <td width="15%">
<?php
    $checked = "";
    if (!empty($raw['kinds']) && $raw['kinds'][0]['classification_id'] == 1)
    {
        $checked = " checked";
    }
?>
    <input class="relevant" sequence="<?php echo $raw->id; ?>" type="checkbox" data-group-cls="btn-group-sm" data-switch-always <?php echo $checked; ?>>
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
    'url' => ['controller' => 'Raws', 'action' => 'label'],
    'id' => 'relevancy'
]);

echo $this->Form->hidden('all_relevant', [
    'id' => 'all_relevant'
]);

echo $this->Form->hidden('all_not_relevant', [
    'id' => 'all_not_relevant'
]);

?>
<script type="text/javascript">
    $(function(){
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
            console.log(allYes);
            $('input:checkbox:not(:checked)').each(function(){
                allNo.push($(this).attr('sequence'));
            });
            console.log(allNo);
            $('#all_relevant').val(allYes.join());
            $('#all_not_relevant').val(allNo.join());
            $('#relevancy').submit();
        });
    });
</script>


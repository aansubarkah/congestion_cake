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
                    <td width="5%">
<?php
    $sequence++;
    echo $sequence;
?>
                    </td>
                    <td width="10%">
                        <script>
                            moment.locale('id');
                            letterDate = moment('<?php echo $this->Time->format($datum->raw->t_time, 'yyyy-MM-dd HH:mm:ss'); ?>').format('D MMMM YYYY HH:mm:ss');
                            document.write(letterDate);
                        </script>

                    </td>
                    <td width="45%">
<?php
    echo $datum->raw->info;
    echo $this->Html->link(
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
    );
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
    'url' => ['controller' => 'DataTwitter', 'action' => 'index'],
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
            $('input:checkbox:not(:checked)').each(function(){
                allNo.push($(this).attr('sequence'));
            });
            $('#all_relevant').val(allYes.join());
            $('#all_not_relevant').val(allNo.join());
            $('#relevancy').submit();
        });
    });
</script>


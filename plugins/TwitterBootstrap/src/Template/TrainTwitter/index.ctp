<div class="panel panel-default">
    <div class="panel-heading">
<?php
echo $this->Form->create(null, [
    'url' => ['controller' => 'TrainTwitter', 'action' => 'index'],
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
echo $this->Paginator->sort('respondent_name', 'Responden');
?>
                    </th>
                    <th>
<?php
echo $this->Paginator->sort('t_time', 'Tweet');
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
                            letterDate = moment('<?php echo $this->Time->format($datum->t_time, 'yyyy-MM-dd HH:mm:ss'); ?>').format('D MMMM YYYY HH:mm:ss');
                            document.write(letterDate);
                        </script>

                    </td>
                    <td width="15%">
<?php
    echo $this->Html->link($datum->respondent_name, ['controller' => 'Respondents', 'action' => 'view', $datum->respondent_id]);
?>
                    </td>
                    <td width="55%">
<?php
    echo $datum->info;
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
                    <td width="15%">
<?php
    if ($datum->classification_id == 1)
    {
        echo '<span class="label label-success">Ya</span>';
    } else if ($datum->classification_id == 2)
    {
        echo '<span class="label label-danger">Tidak</span>';
    } else {
        echo '<span class="label label-default">Belum</span>';
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
<script type="text/javascript">
$(document).ready(function(){
});
</script>


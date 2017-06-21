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
                            letterDate = moment('<?php echo $this->Time->format($datum->raw->t_time, 'yyyy-MM-dd HH:mm:ss'); ?>').format('D MMMM YYYY HH:mm:ss');
                            document.write(letterDate);
                        </script><br>
<?php
echo $this->Html->link(
    '<i class="fa fa-quora fa-fw"></i>',
    '#',
    [
        'escape' => false,
        'class' => 'quora',
        'data-toggle' => 'modal',
        'data-target' => '#tagModal'
    ]
);
?>
                    </td>
                    <td>
<?php
    echo $datum->raw->info;
    if (!empty($datum->raw->data_word))
    {
        echo '<br>';
        foreach ($datum->raw->data_word as $value)
        {
            echo '<span class="label label-default">';
            echo $value['word_name'];
            echo ' | ';
            echo $value['tag_name'];
            echo '</span>';
            echo ' ';
        }
    }
    if (!empty($datum->raw->data_syllable))
    {
        echo '<br><br>';
        if (!$datum->raw->data_syllable[0]['verified'])
        {
            echo '<i class="fa fa-coffee fa-fw"></i>';
            echo ' ';
        }
        foreach ($datum->raw->data_syllable as $value)
        {
            $label = '<span class="label label-success">';
            $label = $label . '<span class="syllable-name">' . $value['syllable_name'] . '</span>';
            $label = $label . ' | ';
            $label = $label . '<i class="i-' . $value['syllable_id'] . '">' . $value['tag_name'] . '</i>';
            $label = $label . '</span>';
            echo $this->Html->link(
                $label,
                '#',
                [
                    'escape' => false,
                    'data-toggle' => 'modal',
                    'data-target' => '#editModal',
                    'class' => 'edit-syllable',
                    'syllable-name' => $value['syllable_name'],
                    'syllable-id' => $value['syllable_id'],
                    'tag-id' => $value['tag_id'],
                ]
            );
            echo ' ';
        }
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
    'url' => ['controller' => 'DataWord', 'action' => 'index'],
    'id' => 'syllable'
]);

echo $this->Form->hidden('new_syllable_ids', [
    'id' => 'new_syllable_ids'
]);

echo $this->Form->hidden('new_tag_ids', [
    'id' => 'new_tag_ids'
]);

?>
<!-- Modal -->
<div class="modal fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="tagModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="tagModalLabel">Penggunaan Label</h4>
      </div>
      <div class="modal-body">
<table width="100%" class="table table-striped" id="dataTables-letters">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Label</th>
                    <th>Deskripsi</th>
                    <th>Contoh</th>
                </tr>
            </thead>
            <tbody>
<?php
// get current page
$sequence = 0;
foreach($tags as $datum)
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
                        <?php echo $datum->name; ?>
                    </td>
                    <td width="40%">
<?php echo $datum->description; ?>
                    </td>
                    <td width="45%">
<?php echo $datum->example; ?>
                    </td>
                </tr>
<?php
}
?>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div><!--/.Modal-->
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editModalLabel">Ubah Label</h4>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <input type="hidden" id="editSyllableId">
                <input type="text" class="form-control" id="editSyllableName" placeholder="Kata" disabled>
            </div>
            <div class="form-group">
<?php
$options = [];
foreach ($tags as $value)
{
    $options[$value['id']] = $value['name'];
}
echo $this->Form->select('field', $options, ['class' => 'form-control', 'id' => 'editSyllableTag']);
?>
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="3" id="editSyllableDescription" disabled></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" id="editSyllableSave">Simpan</button>
      </div>
    </div>
  </div>
</div><!--/.Modal-->
<script type="text/javascript">
    $(function(){
        var syllables = {};
<?php
echo 'var tags = {';
foreach ($tags as $value)
{
    echo $value['id'];
    echo ":";
    //echo "'" . $value['example'] . "'";
    echo "'" . $value['description'] . "'";
    echo ",";
}
echo '};';
?>

        $('.edit-syllable').click(function(){
            $('#editSyllableId').val($(this).attr('syllable-id'));
            $('#editSyllableName').val($(this).attr('syllable-name'));
            $('#editSyllableTag').val($(this).attr('tag-id'));
        });

        $('#editSyllableTag').change(function(){
            $('#editSyllableDescription').val(tags[$(this).val()]);
            //console.log(tags[$(this).val()]);
        });

        $('#editSyllableSave').click(function(){
            var syllableId = $('#editSyllableId').val();
            var syllableTagNameNew = $('#editSyllableTag option[value="' + $('#editSyllableTag').val() + '"]').text();
            var syllableTagIdNew = $('#editSyllableTag').val();
            syllables[syllableId] = syllableTagIdNew;
            $('.i-' + $('#editSyllableId').val()).html(syllableTagNameNew);
            $('.edit-syllable[syllable-id="' + syllableId + '"]').attr('tag-id', syllableTagIdNew);
            // change label color
            $('.edit-syllable[syllable-id="' + syllableId + '"] > span').removeClass('label-success');
            $('.edit-syllable[syllable-id="' + syllableId + '"] > span').addClass('label-primary');

            $('#editModal').modal('hide');
        });

        $('#btn-save').click(function(){
            if (Object.keys(syllables).length > 0)
            {
                var allSyllableIds = Object.keys(syllables);
                var allTagIds = Object.values(syllables);
                $('#new_syllable_ids').val(allSyllableIds.join());
                $('#new_tag_ids').val(allTagIds.join());
                $('#syllable').submit();
            }
        });
    });
</script>

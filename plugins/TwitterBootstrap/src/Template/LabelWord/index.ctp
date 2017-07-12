<div class="panel panel-default">
    <div class="panel-heading">
<?php
echo $this->Form->create(null, [
    'url' => ['controller' => 'LabelWord', 'action' => 'index'],
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
echo '<br>';
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
    echo $datum->info;
    echo '<br><br>';
    foreach ($datum->label_word as $value)
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
                'raw-id' => $datum->raw_id,
            ]
        );
        echo ' ';
    }
    echo '<br><br>';
    ?>
                        <input class="relevant" sequence="<?php echo $datum->raw_id; ?>" type="checkbox" data-group-cls="btn-group-sm" data-switch-always id="checkbox-<?php echo $datum->raw_id;?>">
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
    'url' => ['controller' => 'LabelWord', 'action' => 'index'],
    'id' => 'syllable'
]);

echo $this->Form->hidden('new_syllable_ids', [
    'id' => 'new_syllable_ids'
]);

echo $this->Form->hidden('new_tag_ids', [
    'id' => 'new_tag_ids'
]);

echo $this->Form->hidden('all_oks', [
    'id' => 'all_oks_ids'
]);

echo $this->Form->end();
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
                <input type="hidden" id="editSyllableRawId">
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
<?php
foreach ($tags as $value)
{
    echo '<input id="example-' . $value['id'] . '" value="' . $value['description'] . ' contoh: ' . $value['example'] . '" hidden="true">';
}
?>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" id="editSyllableSave">Simpan</button>
      </div>
    </div>
  </div>
</div><!--/.Modal-->
<?php
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

        var syllables = {};
        $('#btn-save').hide();

        $('.edit-syllable').click(function(){
            $('#editSyllableId').val($(this).attr('syllable-id'));
            $('#editSyllableName').val($(this).attr('syllable-name'));
            $('#editSyllableTag').val($(this).attr('tag-id'));
            $('#editSyllableRawId').val($(this).attr('raw-id'));
        });

        $('#editSyllableTag').change(function(){
            $('#editSyllableDescription').val($('#example-' + $(this).val()).val());
        });

        $('#editSyllableSave').click(function(){
            $('#btn-save').show();
            var syllableId = $('#editSyllableId').val();
            var syllableTagNameNew = $('#editSyllableTag option[value="' + $('#editSyllableTag').val() + '"]').text();
            var syllableTagIdNew = $('#editSyllableTag').val();
            var syllableRawId = $('#editSyllableRawId').val();
            syllables[syllableId] = syllableTagIdNew;
            $('.i-' + $('#editSyllableId').val()).html(syllableTagNameNew);
            $('.edit-syllable[syllable-id="' + syllableId + '"]').attr('tag-id', syllableTagIdNew);
            // change label color
            $('.edit-syllable[syllable-id="' + syllableId + '"] > span').removeClass('label-success');
            $('.edit-syllable[syllable-id="' + syllableId + '"] > span').addClass('label-primary');
            // edit checkbox to Not Checked
            $('.table :checked').each(function(){
                if ($(this).attr('sequence') == syllableRawId){
                    $(this).prop('checked', false);
                }
            });
            $('#checkbox-' + syllableRawId).prop('disabled', true);

            $('#editModal').modal('hide');
        });

        $(':checkbox').checkboxpicker({
            offLabel: 'Tidak Semua Label Sesuai',
            onLabel: 'Semua Label Sesuai'
        });

        $(':checkbox').change(function(){
            $('#btn-save').show();
        });

        $('#btn-save').click(function(){
            var allYes = [];
            $('.table :checked').each(function(){
                allYes.push($(this).attr('sequence'));
            });

            if (Object.keys(syllables).length > 0 || allYes.length > 0)
            {
                var allSyllableIds = Object.keys(syllables);
                var allTagIds = Object.values(syllables);
                $('#new_syllable_ids').val(allSyllableIds.join());
                $('#new_tag_ids').val(allTagIds.join());
                $('#all_oks_ids').val(allYes.join());
                $('#syllable').submit();
            }
        });
    });
</script>

<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Respondent'), ['action' => 'edit', $respondent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Respondent'), ['action' => 'delete', $respondent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $respondent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Respondents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Respondent'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Markers'), ['controller' => 'Markers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Marker'), ['controller' => 'Markers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Raws'), ['controller' => 'Raws', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Raw'), ['controller' => 'Raws', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="respondents view large-9 medium-8 columns content">
    <h3><?= h($respondent->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Region') ?></th>
            <td><?= $respondent->has('region') ? $this->Html->link($respondent->region->name, ['controller' => 'Regions', 'action' => 'view', $respondent->region->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($respondent->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T User Screen Name') ?></th>
            <td><?= h($respondent->t_user_screen_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($respondent->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T User Id') ?></th>
            <td><?= $this->Number->format($respondent->t_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Official') ?></th>
            <td><?= $respondent->official ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $respondent->active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tmc') ?></th>
            <td><?= $respondent->tmc ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Markers') ?></h4>
        <?php if (!empty($respondent->markers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Respondent Id') ?></th>
                <th scope="col"><?= __('Weather Id') ?></th>
                <th scope="col"><?= __('Raw Id') ?></th>
                <th scope="col"><?= __('Lat') ?></th>
                <th scope="col"><?= __('Lng') ?></th>
                <th scope="col"><?= __('Info') ?></th>
                <th scope="col"><?= __('IsPinned') ?></th>
                <th scope="col"><?= __('IsCleared') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('IsExported') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($respondent->markers as $markers): ?>
            <tr>
                <td><?= h($markers->id) ?></td>
                <td><?= h($markers->category_id) ?></td>
                <td><?= h($markers->user_id) ?></td>
                <td><?= h($markers->respondent_id) ?></td>
                <td><?= h($markers->weather_id) ?></td>
                <td><?= h($markers->raw_id) ?></td>
                <td><?= h($markers->lat) ?></td>
                <td><?= h($markers->lng) ?></td>
                <td><?= h($markers->info) ?></td>
                <td><?= h($markers->isPinned) ?></td>
                <td><?= h($markers->isCleared) ?></td>
                <td><?= h($markers->created) ?></td>
                <td><?= h($markers->modified) ?></td>
                <td><?= h($markers->active) ?></td>
                <td><?= h($markers->isExported) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Markers', 'action' => 'view', $markers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Markers', 'action' => 'edit', $markers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Markers', 'action' => 'delete', $markers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $markers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Raws') ?></h4>
        <?php if (!empty($respondent->raws)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Respondent Id') ?></th>
                <th scope="col"><?= __('T Id') ?></th>
                <th scope="col"><?= __('T Time') ?></th>
                <th scope="col"><?= __('Info') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Media') ?></th>
                <th scope="col"><?= __('Width') ?></th>
                <th scope="col"><?= __('Height') ?></th>
                <th scope="col"><?= __('Processed') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($respondent->raws as $raws): ?>
            <tr>
                <td><?= h($raws->id) ?></td>
                <td><?= h($raws->respondent_id) ?></td>
                <td><?= h($raws->t_id) ?></td>
                <td><?= h($raws->t_time) ?></td>
                <td><?= h($raws->info) ?></td>
                <td><?= h($raws->url) ?></td>
                <td><?= h($raws->media) ?></td>
                <td><?= h($raws->width) ?></td>
                <td><?= h($raws->height) ?></td>
                <td><?= h($raws->processed) ?></td>
                <td><?= h($raws->created) ?></td>
                <td><?= h($raws->modified) ?></td>
                <td><?= h($raws->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Raws', 'action' => 'view', $raws->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Raws', 'action' => 'edit', $raws->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Raws', 'action' => 'delete', $raws->id], ['confirm' => __('Are you sure you want to delete # {0}?', $raws->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

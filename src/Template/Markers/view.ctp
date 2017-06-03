<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Marker'), ['action' => 'edit', $marker->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Marker'), ['action' => 'delete', $marker->id], ['confirm' => __('Are you sure you want to delete # {0}?', $marker->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Markers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Marker'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Respondents'), ['controller' => 'Respondents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Respondent'), ['controller' => 'Respondents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Weather'), ['controller' => 'Weather', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Weather'), ['controller' => 'Weather', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Raws'), ['controller' => 'Raws', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Raw'), ['controller' => 'Raws', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="markers view large-9 medium-8 columns content">
    <h3><?= h($marker->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $marker->has('category') ? $this->Html->link($marker->category->name, ['controller' => 'Categories', 'action' => 'view', $marker->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $marker->has('user') ? $this->Html->link($marker->user->id, ['controller' => 'Users', 'action' => 'view', $marker->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Respondent') ?></th>
            <td><?= $marker->has('respondent') ? $this->Html->link($marker->respondent->name, ['controller' => 'Respondents', 'action' => 'view', $marker->respondent->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weather') ?></th>
            <td><?= $marker->has('weather') ? $this->Html->link($marker->weather->name, ['controller' => 'Weather', 'action' => 'view', $marker->weather->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Raw') ?></th>
            <td><?= $marker->has('raw') ? $this->Html->link($marker->raw->id, ['controller' => 'Raws', 'action' => 'view', $marker->raw->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($marker->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lat') ?></th>
            <td><?= $this->Number->format($marker->lat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lng') ?></th>
            <td><?= $this->Number->format($marker->lng) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($marker->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($marker->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IsPinned') ?></th>
            <td><?= $marker->isPinned ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IsCleared') ?></th>
            <td><?= $marker->isCleared ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $marker->active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IsExported') ?></th>
            <td><?= $marker->isExported ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Info') ?></h4>
        <?= $this->Text->autoParagraph(h($marker->info)); ?>
    </div>
</div>

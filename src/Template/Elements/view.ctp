<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Element'), ['action' => 'edit', $element->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Element'), ['action' => 'delete', $element->id], ['confirm' => __('Are you sure you want to delete # {0}?', $element->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Elements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Element'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Raws'), ['controller' => 'Raws', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Raw'), ['controller' => 'Raws', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Weather'), ['controller' => 'Weather', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Weather'), ['controller' => 'Weather', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="elements view large-9 medium-8 columns content">
    <h3><?= h($element->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Raw') ?></th>
            <td><?= $element->has('raw') ? $this->Html->link($element->raw->id, ['controller' => 'Raws', 'action' => 'view', $element->raw->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $element->has('user') ? $this->Html->link($element->user->id, ['controller' => 'Users', 'action' => 'view', $element->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weather') ?></th>
            <td><?= $element->has('weather') ? $this->Html->link($element->weather->name, ['controller' => 'Weather', 'action' => 'view', $element->weather->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($element->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $element->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

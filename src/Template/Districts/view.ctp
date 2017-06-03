<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit District'), ['action' => 'edit', $district->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete District'), ['action' => 'delete', $district->id], ['confirm' => __('Are you sure you want to delete # {0}?', $district->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Districts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New District'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regencies'), ['controller' => 'Regencies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Regency'), ['controller' => 'Regencies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="districts view large-9 medium-8 columns content">
    <h3><?= h($district->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Regency') ?></th>
            <td><?= $district->has('regency') ? $this->Html->link($district->regency->name, ['controller' => 'Regencies', 'action' => 'view', $district->regency->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($district->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($district->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lat') ?></th>
            <td><?= $this->Number->format($district->lat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lng') ?></th>
            <td><?= $this->Number->format($district->lng) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $district->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

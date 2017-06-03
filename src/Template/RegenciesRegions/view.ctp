<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Regencies Region'), ['action' => 'edit', $regenciesRegion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Regencies Region'), ['action' => 'delete', $regenciesRegion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $regenciesRegion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Regencies Regions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Regencies Region'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regencies'), ['controller' => 'Regencies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Regency'), ['controller' => 'Regencies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="regenciesRegions view large-9 medium-8 columns content">
    <h3><?= h($regenciesRegion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Regency') ?></th>
            <td><?= $regenciesRegion->has('regency') ? $this->Html->link($regenciesRegion->regency->name, ['controller' => 'Regencies', 'action' => 'view', $regenciesRegion->regency->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Region') ?></th>
            <td><?= $regenciesRegion->has('region') ? $this->Html->link($regenciesRegion->region->name, ['controller' => 'Regions', 'action' => 'view', $regenciesRegion->region->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($regenciesRegion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $regenciesRegion->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

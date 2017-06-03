<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Space'), ['action' => 'edit', $space->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Space'), ['action' => 'delete', $space->id], ['confirm' => __('Are you sure you want to delete # {0}?', $space->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Spaces'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Space'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Spots'), ['controller' => 'Spots', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Spot'), ['controller' => 'Spots', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Places'), ['controller' => 'Places', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Place'), ['controller' => 'Places', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="spaces view large-9 medium-8 columns content">
    <h3><?= h($space->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Spot') ?></th>
            <td><?= $space->has('spot') ? $this->Html->link($space->spot->id, ['controller' => 'Spots', 'action' => 'view', $space->spot->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $space->has('user') ? $this->Html->link($space->user->id, ['controller' => 'Users', 'action' => 'view', $space->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Place') ?></th>
            <td><?= $space->has('place') ? $this->Html->link($space->place->name, ['controller' => 'Places', 'action' => 'view', $space->place->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($space->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $space->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

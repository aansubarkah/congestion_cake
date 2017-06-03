<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Breed'), ['action' => 'edit', $breed->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Breed'), ['action' => 'delete', $breed->id], ['confirm' => __('Are you sure you want to delete # {0}?', $breed->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Breeds'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Breed'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Kinds'), ['controller' => 'Kinds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Kind'), ['controller' => 'Kinds', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Classifications'), ['controller' => 'Classifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Classification'), ['controller' => 'Classifications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="breeds view large-9 medium-8 columns content">
    <h3><?= h($breed->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Kind') ?></th>
            <td><?= $breed->has('kind') ? $this->Html->link($breed->kind->id, ['controller' => 'Kinds', 'action' => 'view', $breed->kind->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $breed->has('user') ? $this->Html->link($breed->user->id, ['controller' => 'Users', 'action' => 'view', $breed->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Classification') ?></th>
            <td><?= $breed->has('classification') ? $this->Html->link($breed->classification->name, ['controller' => 'Classifications', 'action' => 'view', $breed->classification->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($breed->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($breed->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($breed->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trained') ?></th>
            <td><?= $breed->trained ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $breed->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

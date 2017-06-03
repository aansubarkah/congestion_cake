<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Piece'), ['action' => 'edit', $piece->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Piece'), ['action' => 'delete', $piece->id], ['confirm' => __('Are you sure you want to delete # {0}?', $piece->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pieces'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Piece'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Chunks'), ['controller' => 'Chunks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chunk'), ['controller' => 'Chunks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pieces view large-9 medium-8 columns content">
    <h3><?= h($piece->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Chunk') ?></th>
            <td><?= $piece->has('chunk') ? $this->Html->link($piece->chunk->id, ['controller' => 'Chunks', 'action' => 'view', $piece->chunk->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $piece->has('user') ? $this->Html->link($piece->user->id, ['controller' => 'Users', 'action' => 'view', $piece->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Place') ?></th>
            <td><?= h($piece->place) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Condition') ?></th>
            <td><?= h($piece->condition) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weather') ?></th>
            <td><?= h($piece->weather) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($piece->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($piece->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($piece->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trained') ?></th>
            <td><?= $piece->trained ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $piece->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

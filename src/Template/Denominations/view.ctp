<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Denomination'), ['action' => 'edit', $denomination->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Denomination'), ['action' => 'delete', $denomination->id], ['confirm' => __('Are you sure you want to delete # {0}?', $denomination->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Denominations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Denomination'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Raws'), ['controller' => 'Raws', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Raw'), ['controller' => 'Raws', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Classifications'), ['controller' => 'Classifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Classification'), ['controller' => 'Classifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="denominations view large-9 medium-8 columns content">
    <h3><?= h($denomination->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Raw') ?></th>
            <td><?= $denomination->has('raw') ? $this->Html->link($denomination->raw->id, ['controller' => 'Raws', 'action' => 'view', $denomination->raw->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Classification') ?></th>
            <td><?= $denomination->has('classification') ? $this->Html->link($denomination->classification->name, ['controller' => 'Classifications', 'action' => 'view', $denomination->classification->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $denomination->has('user') ? $this->Html->link($denomination->user->id, ['controller' => 'Users', 'action' => 'view', $denomination->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($denomination->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($denomination->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($denomination->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IsTrained') ?></th>
            <td><?= $denomination->isTrained ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $denomination->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

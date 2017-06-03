<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fail'), ['action' => 'edit', $fail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fail'), ['action' => 'delete', $fail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fails'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Raws'), ['controller' => 'Raws', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Raw'), ['controller' => 'Raws', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Errors'), ['controller' => 'Errors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Error'), ['controller' => 'Errors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fails view large-9 medium-8 columns content">
    <h3><?= h($fail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Raw') ?></th>
            <td><?= $fail->has('raw') ? $this->Html->link($fail->raw->id, ['controller' => 'Raws', 'action' => 'view', $fail->raw->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Error') ?></th>
            <td><?= $fail->has('error') ? $this->Html->link($fail->error->name, ['controller' => 'Errors', 'action' => 'view', $fail->error->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($fail->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($fail->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $fail->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

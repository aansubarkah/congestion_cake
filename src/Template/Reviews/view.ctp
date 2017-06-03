<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Review'), ['action' => 'edit', $review->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Review'), ['action' => 'delete', $review->id], ['confirm' => __('Are you sure you want to delete # {0}?', $review->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reviews'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Review'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Raws'), ['controller' => 'Raws', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Raw'), ['controller' => 'Raws', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Errors'), ['controller' => 'Errors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Error'), ['controller' => 'Errors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reviews view large-9 medium-8 columns content">
    <h3><?= h($review->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Raw') ?></th>
            <td><?= $review->has('raw') ? $this->Html->link($review->raw->id, ['controller' => 'Raws', 'action' => 'view', $review->raw->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Error') ?></th>
            <td><?= $review->has('error') ? $this->Html->link($review->error->name, ['controller' => 'Errors', 'action' => 'view', $review->error->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $review->has('user') ? $this->Html->link($review->user->id, ['controller' => 'Users', 'action' => 'view', $review->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($review->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($review->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($review->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $review->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Explanation') ?></h4>
        <?= $this->Text->autoParagraph(h($review->explanation)); ?>
    </div>
</div>

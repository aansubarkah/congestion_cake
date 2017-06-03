<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Clap'), ['action' => 'edit', $clap->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Clap'), ['action' => 'delete', $clap->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clap->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Claps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clap'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Raws'), ['controller' => 'Raws', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Raw'), ['controller' => 'Raws', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="claps view large-9 medium-8 columns content">
    <h3><?= h($clap->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Raw') ?></th>
            <td><?= $clap->has('raw') ? $this->Html->link($clap->raw->id, ['controller' => 'Raws', 'action' => 'view', $clap->raw->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UserScreenName') ?></th>
            <td><?= h($clap->userScreenName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($clap->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UserID') ?></th>
            <td><?= $this->Number->format($clap->userID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($clap->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($clap->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $clap->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

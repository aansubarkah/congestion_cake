<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Syllable'), ['action' => 'edit', $syllable->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Syllable'), ['action' => 'delete', $syllable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $syllable->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Syllables'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Syllable'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Words'), ['controller' => 'Words', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Word'), ['controller' => 'Words', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="syllables view large-9 medium-8 columns content">
    <h3><?= h($syllable->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $syllable->has('user') ? $this->Html->link($syllable->user->id, ['controller' => 'Users', 'action' => 'view', $syllable->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Word') ?></th>
            <td><?= $syllable->has('word') ? $this->Html->link($syllable->word->id, ['controller' => 'Words', 'action' => 'view', $syllable->word->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Word') ?></th>
            <td><?= h($syllable->word) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($syllable->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($syllable->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($syllable->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trained') ?></th>
            <td><?= $syllable->trained ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $syllable->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

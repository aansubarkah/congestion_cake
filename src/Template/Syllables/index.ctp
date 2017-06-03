<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Syllable'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Words'), ['controller' => 'Words', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Word'), ['controller' => 'Words', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="syllables index large-9 medium-8 columns content">
    <h3><?= __('Syllables') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('word_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trained') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('word') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($syllables as $syllable): ?>
            <tr>
                <td><?= $this->Number->format($syllable->id) ?></td>
                <td><?= $syllable->has('user') ? $this->Html->link($syllable->user->id, ['controller' => 'Users', 'action' => 'view', $syllable->user->id]) : '' ?></td>
                <td><?= $syllable->has('word') ? $this->Html->link($syllable->word->id, ['controller' => 'Words', 'action' => 'view', $syllable->word->id]) : '' ?></td>
                <td><?= h($syllable->trained) ?></td>
                <td><?= h($syllable->created) ?></td>
                <td><?= h($syllable->modified) ?></td>
                <td><?= h($syllable->active) ?></td>
                <td><?= h($syllable->word) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $syllable->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $syllable->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $syllable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $syllable->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

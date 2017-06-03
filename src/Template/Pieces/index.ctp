<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Piece'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Chunks'), ['controller' => 'Chunks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Chunk'), ['controller' => 'Chunks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pieces index large-9 medium-8 columns content">
    <h3><?= __('Pieces') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('chunk_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('place') ?></th>
                <th scope="col"><?= $this->Paginator->sort('condition') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weather') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trained') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pieces as $piece): ?>
            <tr>
                <td><?= $this->Number->format($piece->id) ?></td>
                <td><?= $piece->has('chunk') ? $this->Html->link($piece->chunk->id, ['controller' => 'Chunks', 'action' => 'view', $piece->chunk->id]) : '' ?></td>
                <td><?= $piece->has('user') ? $this->Html->link($piece->user->id, ['controller' => 'Users', 'action' => 'view', $piece->user->id]) : '' ?></td>
                <td><?= h($piece->place) ?></td>
                <td><?= h($piece->condition) ?></td>
                <td><?= h($piece->weather) ?></td>
                <td><?= h($piece->trained) ?></td>
                <td><?= h($piece->created) ?></td>
                <td><?= h($piece->modified) ?></td>
                <td><?= h($piece->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $piece->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $piece->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $piece->id], ['confirm' => __('Are you sure you want to delete # {0}?', $piece->id)]) ?>
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

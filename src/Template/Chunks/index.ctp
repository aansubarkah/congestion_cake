<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Chunk'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Kinds'), ['controller' => 'Kinds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Kind'), ['controller' => 'Kinds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pieces'), ['controller' => 'Pieces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Piece'), ['controller' => 'Pieces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Spots'), ['controller' => 'Spots', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Spot'), ['controller' => 'Spots', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="chunks index large-9 medium-8 columns content">
    <h3><?= __('Chunks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('t_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('place') ?></th>
                <th scope="col"><?= $this->Paginator->sort('condition') ?></th>
                <th scope="col"><?= $this->Paginator->sort('processed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weather') ?></th>
                <th scope="col"><?= $this->Paginator->sort('verified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('kind_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($chunks as $chunk): ?>
            <tr>
                <td><?= $this->Number->format($chunk->id) ?></td>
                <td><?= $this->Number->format($chunk->t_id) ?></td>
                <td><?= h($chunk->place) ?></td>
                <td><?= h($chunk->condition) ?></td>
                <td><?= h($chunk->processed) ?></td>
                <td><?= h($chunk->created) ?></td>
                <td><?= h($chunk->modified) ?></td>
                <td><?= h($chunk->active) ?></td>
                <td><?= h($chunk->weather) ?></td>
                <td><?= h($chunk->verified) ?></td>
                <td><?= $chunk->has('kind') ? $this->Html->link($chunk->kind->id, ['controller' => 'Kinds', 'action' => 'view', $chunk->kind->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $chunk->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $chunk->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $chunk->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chunk->id)]) ?>
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

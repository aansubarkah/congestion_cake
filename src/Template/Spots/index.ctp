<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Spot'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Chunks'), ['controller' => 'Chunks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Chunk'), ['controller' => 'Chunks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Places'), ['controller' => 'Places', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Place'), ['controller' => 'Places', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Machines'), ['controller' => 'Machines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Machine'), ['controller' => 'Machines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Spaces'), ['controller' => 'Spaces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Space'), ['controller' => 'Spaces', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="spots index large-9 medium-8 columns content">
    <h3><?= __('Spots') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('chunk_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('t_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('place_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('processed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($spots as $spot): ?>
            <tr>
                <td><?= $this->Number->format($spot->id) ?></td>
                <td><?= $spot->has('chunk') ? $this->Html->link($spot->chunk->id, ['controller' => 'Chunks', 'action' => 'view', $spot->chunk->id]) : '' ?></td>
                <td><?= $this->Number->format($spot->t_id) ?></td>
                <td><?= $spot->has('place') ? $this->Html->link($spot->place->name, ['controller' => 'Places', 'action' => 'view', $spot->place->id]) : '' ?></td>
                <td><?= $spot->has('category') ? $this->Html->link($spot->category->name, ['controller' => 'Categories', 'action' => 'view', $spot->category->id]) : '' ?></td>
                <td><?= h($spot->processed) ?></td>
                <td><?= h($spot->created) ?></td>
                <td><?= h($spot->modified) ?></td>
                <td><?= h($spot->active) ?></td>
                <td><?= $this->Number->format($spot->score) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $spot->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $spot->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $spot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $spot->id)]) ?>
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

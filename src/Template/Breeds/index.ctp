<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Breed'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Kinds'), ['controller' => 'Kinds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Kind'), ['controller' => 'Kinds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Classifications'), ['controller' => 'Classifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Classification'), ['controller' => 'Classifications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="breeds index large-9 medium-8 columns content">
    <h3><?= __('Breeds') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('kind_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('classification_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trained') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($breeds as $breed): ?>
            <tr>
                <td><?= $this->Number->format($breed->id) ?></td>
                <td><?= $breed->has('kind') ? $this->Html->link($breed->kind->id, ['controller' => 'Kinds', 'action' => 'view', $breed->kind->id]) : '' ?></td>
                <td><?= $breed->has('user') ? $this->Html->link($breed->user->id, ['controller' => 'Users', 'action' => 'view', $breed->user->id]) : '' ?></td>
                <td><?= $breed->has('classification') ? $this->Html->link($breed->classification->name, ['controller' => 'Classifications', 'action' => 'view', $breed->classification->id]) : '' ?></td>
                <td><?= h($breed->trained) ?></td>
                <td><?= h($breed->created) ?></td>
                <td><?= h($breed->modified) ?></td>
                <td><?= h($breed->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $breed->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $breed->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $breed->id], ['confirm' => __('Are you sure you want to delete # {0}?', $breed->id)]) ?>
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

<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Denomination'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Raws'), ['controller' => 'Raws', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Raw'), ['controller' => 'Raws', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Classifications'), ['controller' => 'Classifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Classification'), ['controller' => 'Classifications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="denominations index large-9 medium-8 columns content">
    <h3><?= __('Denominations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('raw_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('classification_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isTrained') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($denominations as $denomination): ?>
            <tr>
                <td><?= $this->Number->format($denomination->id) ?></td>
                <td><?= $denomination->has('raw') ? $this->Html->link($denomination->raw->id, ['controller' => 'Raws', 'action' => 'view', $denomination->raw->id]) : '' ?></td>
                <td><?= $denomination->has('classification') ? $this->Html->link($denomination->classification->name, ['controller' => 'Classifications', 'action' => 'view', $denomination->classification->id]) : '' ?></td>
                <td><?= $denomination->has('user') ? $this->Html->link($denomination->user->id, ['controller' => 'Users', 'action' => 'view', $denomination->user->id]) : '' ?></td>
                <td><?= h($denomination->isTrained) ?></td>
                <td><?= h($denomination->created) ?></td>
                <td><?= h($denomination->modified) ?></td>
                <td><?= h($denomination->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $denomination->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $denomination->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $denomination->id], ['confirm' => __('Are you sure you want to delete # {0}?', $denomination->id)]) ?>
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

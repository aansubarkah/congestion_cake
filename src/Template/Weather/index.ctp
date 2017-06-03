<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Weather'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Elements'), ['controller' => 'Elements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Element'), ['controller' => 'Elements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Humans'), ['controller' => 'Humans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Human'), ['controller' => 'Humans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Machines'), ['controller' => 'Machines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Machine'), ['controller' => 'Machines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Markers'), ['controller' => 'Markers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Marker'), ['controller' => 'Markers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="weather index large-9 medium-8 columns content">
    <h3><?= __('Weather') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($weather as $weather): ?>
            <tr>
                <td><?= $this->Number->format($weather->id) ?></td>
                <td><?= h($weather->name) ?></td>
                <td><?= h($weather->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $weather->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $weather->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $weather->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weather->id)]) ?>
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

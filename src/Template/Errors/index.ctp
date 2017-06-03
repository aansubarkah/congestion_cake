<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Error'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fails'), ['controller' => 'Fails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fail'), ['controller' => 'Fails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="errors index large-9 medium-8 columns content">
    <h3><?= __('Errors') ?></h3>
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
            <?php foreach ($errors as $error): ?>
            <tr>
                <td><?= $this->Number->format($error->id) ?></td>
                <td><?= h($error->name) ?></td>
                <td><?= h($error->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $error->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $error->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $error->id], ['confirm' => __('Are you sure you want to delete # {0}?', $error->id)]) ?>
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

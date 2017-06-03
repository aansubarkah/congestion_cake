<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Raws'), ['controller' => 'Raws', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Raw'), ['controller' => 'Raws', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Errors'), ['controller' => 'Errors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Error'), ['controller' => 'Errors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fails index large-9 medium-8 columns content">
    <h3><?= __('Fails') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('raw_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('error_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fails as $fail): ?>
            <tr>
                <td><?= $this->Number->format($fail->id) ?></td>
                <td><?= $fail->has('raw') ? $this->Html->link($fail->raw->id, ['controller' => 'Raws', 'action' => 'view', $fail->raw->id]) : '' ?></td>
                <td><?= $fail->has('error') ? $this->Html->link($fail->error->name, ['controller' => 'Errors', 'action' => 'view', $fail->error->id]) : '' ?></td>
                <td><?= h($fail->created) ?></td>
                <td><?= h($fail->modified) ?></td>
                <td><?= h($fail->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fail->id)]) ?>
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

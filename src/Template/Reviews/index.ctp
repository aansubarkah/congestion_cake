<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Review'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Raws'), ['controller' => 'Raws', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Raw'), ['controller' => 'Raws', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Errors'), ['controller' => 'Errors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Error'), ['controller' => 'Errors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reviews index large-9 medium-8 columns content">
    <h3><?= __('Reviews') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('raw_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('error_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reviews as $review): ?>
            <tr>
                <td><?= $this->Number->format($review->id) ?></td>
                <td><?= $review->has('raw') ? $this->Html->link($review->raw->id, ['controller' => 'Raws', 'action' => 'view', $review->raw->id]) : '' ?></td>
                <td><?= $review->has('error') ? $this->Html->link($review->error->name, ['controller' => 'Errors', 'action' => 'view', $review->error->id]) : '' ?></td>
                <td><?= $review->has('user') ? $this->Html->link($review->user->id, ['controller' => 'Users', 'action' => 'view', $review->user->id]) : '' ?></td>
                <td><?= h($review->created) ?></td>
                <td><?= h($review->modified) ?></td>
                <td><?= h($review->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $review->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $review->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $review->id], ['confirm' => __('Are you sure you want to delete # {0}?', $review->id)]) ?>
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
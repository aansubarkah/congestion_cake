<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Clap'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Raws'), ['controller' => 'Raws', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Raw'), ['controller' => 'Raws', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="claps index large-9 medium-8 columns content">
    <h3><?= __('Claps') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('raw_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('userScreenName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('userID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($claps as $clap): ?>
            <tr>
                <td><?= $this->Number->format($clap->id) ?></td>
                <td><?= $clap->has('raw') ? $this->Html->link($clap->raw->id, ['controller' => 'Raws', 'action' => 'view', $clap->raw->id]) : '' ?></td>
                <td><?= h($clap->userScreenName) ?></td>
                <td><?= $this->Number->format($clap->userID) ?></td>
                <td><?= h($clap->created) ?></td>
                <td><?= h($clap->modified) ?></td>
                <td><?= h($clap->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $clap->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clap->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clap->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clap->id)]) ?>
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

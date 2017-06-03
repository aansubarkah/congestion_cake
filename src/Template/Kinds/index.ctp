<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Kind'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Raws'), ['controller' => 'Raws', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Raw'), ['controller' => 'Raws', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Classifications'), ['controller' => 'Classifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Classification'), ['controller' => 'Classifications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Breeds'), ['controller' => 'Breeds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Breed'), ['controller' => 'Breeds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Chunks'), ['controller' => 'Chunks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Chunk'), ['controller' => 'Chunks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="kinds index large-9 medium-8 columns content">
    <h3><?= __('Kinds') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('raw_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('classification_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('processed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('t_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('verified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('trained') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kinds as $kind): ?>
            <tr>
                <td><?= $this->Number->format($kind->id) ?></td>
                <td><?= $kind->has('raw') ? $this->Html->link($kind->raw->id, ['controller' => 'Raws', 'action' => 'view', $kind->raw->id]) : '' ?></td>
                <td><?= $kind->has('classification') ? $this->Html->link($kind->classification->name, ['controller' => 'Classifications', 'action' => 'view', $kind->classification->id]) : '' ?></td>
                <td><?= h($kind->processed) ?></td>
                <td><?= h($kind->created) ?></td>
                <td><?= h($kind->modified) ?></td>
                <td><?= h($kind->active) ?></td>
                <td><?= $this->Number->format($kind->t_id) ?></td>
                <td><?= h($kind->verified) ?></td>
                <td><?= h($kind->trained) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $kind->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $kind->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $kind->id], ['confirm' => __('Are you sure you want to delete # {0}?', $kind->id)]) ?>
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

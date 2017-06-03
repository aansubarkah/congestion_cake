<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Regency'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Hierarchies'), ['controller' => 'Hierarchies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Hierarchy'), ['controller' => 'Hierarchies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Districts'), ['controller' => 'Districts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New District'), ['controller' => 'Districts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Places'), ['controller' => 'Places', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Place'), ['controller' => 'Places', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="regencies index large-9 medium-8 columns content">
    <h3><?= __('Regencies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hierarchy_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lat') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lng') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alias') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($regencies as $regency): ?>
            <tr>
                <td><?= $this->Number->format($regency->id) ?></td>
                <td><?= $regency->has('state') ? $this->Html->link($regency->state->name, ['controller' => 'States', 'action' => 'view', $regency->state->id]) : '' ?></td>
                <td><?= $regency->has('hierarchy') ? $this->Html->link($regency->hierarchy->name, ['controller' => 'Hierarchies', 'action' => 'view', $regency->hierarchy->id]) : '' ?></td>
                <td><?= h($regency->name) ?></td>
                <td><?= $this->Number->format($regency->lat) ?></td>
                <td><?= $this->Number->format($regency->lng) ?></td>
                <td><?= h($regency->active) ?></td>
                <td><?= h($regency->alias) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $regency->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $regency->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $regency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $regency->id)]) ?>
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

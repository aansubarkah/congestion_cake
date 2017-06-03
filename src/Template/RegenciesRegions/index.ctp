<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Regencies Region'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Regencies'), ['controller' => 'Regencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Regency'), ['controller' => 'Regencies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="regenciesRegions index large-9 medium-8 columns content">
    <h3><?= __('Regencies Regions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('regency_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('region_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($regenciesRegions as $regenciesRegion): ?>
            <tr>
                <td><?= $this->Number->format($regenciesRegion->id) ?></td>
                <td><?= $regenciesRegion->has('regency') ? $this->Html->link($regenciesRegion->regency->name, ['controller' => 'Regencies', 'action' => 'view', $regenciesRegion->regency->id]) : '' ?></td>
                <td><?= $regenciesRegion->has('region') ? $this->Html->link($regenciesRegion->region->name, ['controller' => 'Regions', 'action' => 'view', $regenciesRegion->region->id]) : '' ?></td>
                <td><?= h($regenciesRegion->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $regenciesRegion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $regenciesRegion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $regenciesRegion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $regenciesRegion->id)]) ?>
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

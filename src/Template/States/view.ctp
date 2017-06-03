<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit State'), ['action' => 'edit', $state->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete State'), ['action' => 'delete', $state->id], ['confirm' => __('Are you sure you want to delete # {0}?', $state->id)]) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regencies'), ['controller' => 'Regencies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Regency'), ['controller' => 'Regencies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="states view large-9 medium-8 columns content">
    <h3><?= h($state->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($state->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($state->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $state->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Regencies') ?></h4>
        <?php if (!empty($state->regencies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col"><?= __('Hierarchy Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Lat') ?></th>
                <th scope="col"><?= __('Lng') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Alias') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($state->regencies as $regencies): ?>
            <tr>
                <td><?= h($regencies->id) ?></td>
                <td><?= h($regencies->state_id) ?></td>
                <td><?= h($regencies->hierarchy_id) ?></td>
                <td><?= h($regencies->name) ?></td>
                <td><?= h($regencies->lat) ?></td>
                <td><?= h($regencies->lng) ?></td>
                <td><?= h($regencies->active) ?></td>
                <td><?= h($regencies->alias) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Regencies', 'action' => 'view', $regencies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Regencies', 'action' => 'edit', $regencies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Regencies', 'action' => 'delete', $regencies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $regencies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

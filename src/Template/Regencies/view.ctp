<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Regency'), ['action' => 'edit', $regency->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Regency'), ['action' => 'delete', $regency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $regency->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Regencies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Regency'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Hierarchies'), ['controller' => 'Hierarchies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hierarchy'), ['controller' => 'Hierarchies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Districts'), ['controller' => 'Districts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New District'), ['controller' => 'Districts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Places'), ['controller' => 'Places', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Place'), ['controller' => 'Places', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="regencies view large-9 medium-8 columns content">
    <h3><?= h($regency->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $regency->has('state') ? $this->Html->link($regency->state->name, ['controller' => 'States', 'action' => 'view', $regency->state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hierarchy') ?></th>
            <td><?= $regency->has('hierarchy') ? $this->Html->link($regency->hierarchy->name, ['controller' => 'Hierarchies', 'action' => 'view', $regency->hierarchy->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($regency->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alias') ?></th>
            <td><?= h($regency->alias) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($regency->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lat') ?></th>
            <td><?= $this->Number->format($regency->lat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lng') ?></th>
            <td><?= $this->Number->format($regency->lng) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $regency->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Districts') ?></h4>
        <?php if (!empty($regency->districts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Regency Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Lat') ?></th>
                <th scope="col"><?= __('Lng') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($regency->districts as $districts): ?>
            <tr>
                <td><?= h($districts->id) ?></td>
                <td><?= h($districts->regency_id) ?></td>
                <td><?= h($districts->name) ?></td>
                <td><?= h($districts->lat) ?></td>
                <td><?= h($districts->lng) ?></td>
                <td><?= h($districts->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Districts', 'action' => 'view', $districts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Districts', 'action' => 'edit', $districts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Districts', 'action' => 'delete', $districts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $districts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Places') ?></h4>
        <?php if (!empty($regency->places)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Regency Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Lat') ?></th>
                <th scope="col"><?= __('Lng') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($regency->places as $places): ?>
            <tr>
                <td><?= h($places->id) ?></td>
                <td><?= h($places->regency_id) ?></td>
                <td><?= h($places->name) ?></td>
                <td><?= h($places->lat) ?></td>
                <td><?= h($places->lng) ?></td>
                <td><?= h($places->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Places', 'action' => 'view', $places->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Places', 'action' => 'edit', $places->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Places', 'action' => 'delete', $places->id], ['confirm' => __('Are you sure you want to delete # {0}?', $places->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Regions') ?></h4>
        <?php if (!empty($regency->regions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Lat') ?></th>
                <th scope="col"><?= __('Lng') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($regency->regions as $regions): ?>
            <tr>
                <td><?= h($regions->id) ?></td>
                <td><?= h($regions->lat) ?></td>
                <td><?= h($regions->lng) ?></td>
                <td><?= h($regions->name) ?></td>
                <td><?= h($regions->active) ?></td>
                <td><?= h($regions->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Regions', 'action' => 'view', $regions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Regions', 'action' => 'edit', $regions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Regions', 'action' => 'delete', $regions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $regions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

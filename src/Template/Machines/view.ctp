<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Machine'), ['action' => 'edit', $machine->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Machine'), ['action' => 'delete', $machine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machine->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Machines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Machine'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Classifications'), ['controller' => 'Classifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Classification'), ['controller' => 'Classifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Places'), ['controller' => 'Places', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Place'), ['controller' => 'Places', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Weather'), ['controller' => 'Weather', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Weather'), ['controller' => 'Weather', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Spots'), ['controller' => 'Spots', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Spot'), ['controller' => 'Spots', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="machines view large-9 medium-8 columns content">
    <h3><?= h($machine->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Classification') ?></th>
            <td><?= $machine->has('classification') ? $this->Html->link($machine->classification->name, ['controller' => 'Classifications', 'action' => 'view', $machine->classification->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Place') ?></th>
            <td><?= $machine->has('place') ? $this->Html->link($machine->place->name, ['controller' => 'Places', 'action' => 'view', $machine->place->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $machine->has('category') ? $this->Html->link($machine->category->name, ['controller' => 'Categories', 'action' => 'view', $machine->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weather') ?></th>
            <td><?= $machine->has('weather') ? $this->Html->link($machine->weather->name, ['controller' => 'Weather', 'action' => 'view', $machine->weather->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Info') ?></th>
            <td><?= h($machine->info) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($machine->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Spot') ?></th>
            <td><?= $machine->has('spot') ? $this->Html->link($machine->spot->id, ['controller' => 'Spots', 'action' => 'view', $machine->spot->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($machine->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T Id') ?></th>
            <td><?= $this->Number->format($machine->t_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($machine->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($machine->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Processed') ?></th>
            <td><?= $machine->processed ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $machine->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

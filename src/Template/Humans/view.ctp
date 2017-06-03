<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Human'), ['action' => 'edit', $human->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Human'), ['action' => 'delete', $human->id], ['confirm' => __('Are you sure you want to delete # {0}?', $human->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Humans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Human'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Classifications'), ['controller' => 'Classifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Classification'), ['controller' => 'Classifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Places'), ['controller' => 'Places', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Place'), ['controller' => 'Places', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Weather'), ['controller' => 'Weather', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Weather'), ['controller' => 'Weather', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="humans view large-9 medium-8 columns content">
    <h3><?= h($human->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Classification') ?></th>
            <td><?= $human->has('classification') ? $this->Html->link($human->classification->name, ['controller' => 'Classifications', 'action' => 'view', $human->classification->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Place') ?></th>
            <td><?= $human->has('place') ? $this->Html->link($human->place->name, ['controller' => 'Places', 'action' => 'view', $human->place->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $human->has('category') ? $this->Html->link($human->category->name, ['controller' => 'Categories', 'action' => 'view', $human->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weather') ?></th>
            <td><?= $human->has('weather') ? $this->Html->link($human->weather->name, ['controller' => 'Weather', 'action' => 'view', $human->weather->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Info') ?></th>
            <td><?= h($human->info) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($human->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($human->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T Id') ?></th>
            <td><?= $this->Number->format($human->t_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($human->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($human->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Processed') ?></th>
            <td><?= $human->processed ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $human->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

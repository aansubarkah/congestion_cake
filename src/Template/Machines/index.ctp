<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Machine'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Classifications'), ['controller' => 'Classifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Classification'), ['controller' => 'Classifications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Places'), ['controller' => 'Places', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Place'), ['controller' => 'Places', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Weather'), ['controller' => 'Weather', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Weather'), ['controller' => 'Weather', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Spots'), ['controller' => 'Spots', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Spot'), ['controller' => 'Spots', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="machines index large-9 medium-8 columns content">
    <h3><?= __('Machines') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('t_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('classification_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('place_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weather_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('info') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('processed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('spot_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($machines as $machine): ?>
            <tr>
                <td><?= $this->Number->format($machine->id) ?></td>
                <td><?= $this->Number->format($machine->t_id) ?></td>
                <td><?= $machine->has('classification') ? $this->Html->link($machine->classification->name, ['controller' => 'Classifications', 'action' => 'view', $machine->classification->id]) : '' ?></td>
                <td><?= $machine->has('place') ? $this->Html->link($machine->place->name, ['controller' => 'Places', 'action' => 'view', $machine->place->id]) : '' ?></td>
                <td><?= $machine->has('category') ? $this->Html->link($machine->category->name, ['controller' => 'Categories', 'action' => 'view', $machine->category->id]) : '' ?></td>
                <td><?= $machine->has('weather') ? $this->Html->link($machine->weather->name, ['controller' => 'Weather', 'action' => 'view', $machine->weather->id]) : '' ?></td>
                <td><?= h($machine->info) ?></td>
                <td><?= h($machine->image) ?></td>
                <td><?= h($machine->processed) ?></td>
                <td><?= h($machine->created) ?></td>
                <td><?= h($machine->modified) ?></td>
                <td><?= h($machine->active) ?></td>
                <td><?= $machine->has('spot') ? $this->Html->link($machine->spot->id, ['controller' => 'Spots', 'action' => 'view', $machine->spot->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $machine->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $machine->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $machine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machine->id)]) ?>
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

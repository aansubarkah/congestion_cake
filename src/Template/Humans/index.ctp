<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Human'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Classifications'), ['controller' => 'Classifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Classification'), ['controller' => 'Classifications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Places'), ['controller' => 'Places', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Place'), ['controller' => 'Places', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Weather'), ['controller' => 'Weather', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Weather'), ['controller' => 'Weather', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="humans index large-9 medium-8 columns content">
    <h3><?= __('Humans') ?></h3>
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
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($humans as $human): ?>
            <tr>
                <td><?= $this->Number->format($human->id) ?></td>
                <td><?= $this->Number->format($human->t_id) ?></td>
                <td><?= $human->has('classification') ? $this->Html->link($human->classification->name, ['controller' => 'Classifications', 'action' => 'view', $human->classification->id]) : '' ?></td>
                <td><?= $human->has('place') ? $this->Html->link($human->place->name, ['controller' => 'Places', 'action' => 'view', $human->place->id]) : '' ?></td>
                <td><?= $human->has('category') ? $this->Html->link($human->category->name, ['controller' => 'Categories', 'action' => 'view', $human->category->id]) : '' ?></td>
                <td><?= $human->has('weather') ? $this->Html->link($human->weather->name, ['controller' => 'Weather', 'action' => 'view', $human->weather->id]) : '' ?></td>
                <td><?= h($human->info) ?></td>
                <td><?= h($human->image) ?></td>
                <td><?= h($human->processed) ?></td>
                <td><?= h($human->created) ?></td>
                <td><?= h($human->modified) ?></td>
                <td><?= h($human->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $human->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $human->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $human->id], ['confirm' => __('Are you sure you want to delete # {0}?', $human->id)]) ?>
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

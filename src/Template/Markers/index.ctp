<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Marker'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Respondents'), ['controller' => 'Respondents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Respondent'), ['controller' => 'Respondents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Weather'), ['controller' => 'Weather', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Weather'), ['controller' => 'Weather', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Raws'), ['controller' => 'Raws', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Raw'), ['controller' => 'Raws', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="markers index large-9 medium-8 columns content">
    <h3><?= __('Markers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('respondent_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weather_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('raw_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lat') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lng') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isPinned') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isCleared') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isExported') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($markers as $marker): ?>
            <tr>
                <td><?= $this->Number->format($marker->id) ?></td>
                <td><?= $marker->has('category') ? $this->Html->link($marker->category->name, ['controller' => 'Categories', 'action' => 'view', $marker->category->id]) : '' ?></td>
                <td><?= $marker->has('user') ? $this->Html->link($marker->user->id, ['controller' => 'Users', 'action' => 'view', $marker->user->id]) : '' ?></td>
                <td><?= $marker->has('respondent') ? $this->Html->link($marker->respondent->name, ['controller' => 'Respondents', 'action' => 'view', $marker->respondent->id]) : '' ?></td>
                <td><?= $marker->has('weather') ? $this->Html->link($marker->weather->name, ['controller' => 'Weather', 'action' => 'view', $marker->weather->id]) : '' ?></td>
                <td><?= $marker->has('raw') ? $this->Html->link($marker->raw->id, ['controller' => 'Raws', 'action' => 'view', $marker->raw->id]) : '' ?></td>
                <td><?= $this->Number->format($marker->lat) ?></td>
                <td><?= $this->Number->format($marker->lng) ?></td>
                <td><?= h($marker->isPinned) ?></td>
                <td><?= h($marker->isCleared) ?></td>
                <td><?= h($marker->created) ?></td>
                <td><?= h($marker->modified) ?></td>
                <td><?= h($marker->active) ?></td>
                <td><?= h($marker->isExported) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $marker->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $marker->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $marker->id], ['confirm' => __('Are you sure you want to delete # {0}?', $marker->id)]) ?>
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

<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Raw'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Respondents'), ['controller' => 'Respondents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Respondent'), ['controller' => 'Respondents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Claps'), ['controller' => 'Claps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clap'), ['controller' => 'Claps', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Denominations'), ['controller' => 'Denominations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Denomination'), ['controller' => 'Denominations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Elements'), ['controller' => 'Elements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Element'), ['controller' => 'Elements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fails'), ['controller' => 'Fails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fail'), ['controller' => 'Fails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Kinds'), ['controller' => 'Kinds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Kind'), ['controller' => 'Kinds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Markers'), ['controller' => 'Markers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Marker'), ['controller' => 'Markers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="raws index large-9 medium-8 columns content">
    <h3><?= __('Raws') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('respondent_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('t_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('t_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('info') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('media') ?></th>
                <th scope="col"><?= $this->Paginator->sort('width') ?></th>
                <th scope="col"><?= $this->Paginator->sort('height') ?></th>
                <th scope="col"><?= $this->Paginator->sort('processed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($raws as $raw): ?>
            <tr>
                <td><?= $this->Number->format($raw->id) ?></td>
                <td><?= $raw->has('respondent') ? $this->Html->link($raw->respondent->name, ['controller' => 'Respondents', 'action' => 'view', $raw->respondent->id]) : '' ?></td>
                <td><?= $this->Number->format($raw->t_id) ?></td>
                <td><?= h($raw->t_time) ?></td>
                <td><?= h($raw->info) ?></td>
                <td><?= h($raw->url) ?></td>
                <td><?= h($raw->media) ?></td>
                <td><?= $this->Number->format($raw->width) ?></td>
                <td><?= $this->Number->format($raw->height) ?></td>
                <td><?= h($raw->processed) ?></td>
                <td><?= h($raw->created) ?></td>
                <td><?= h($raw->modified) ?></td>
                <td><?= h($raw->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $raw->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $raw->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $raw->id], ['confirm' => __('Are you sure you want to delete # {0}?', $raw->id)]) ?>
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

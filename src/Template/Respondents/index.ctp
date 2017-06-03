<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Respondent'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Markers'), ['controller' => 'Markers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Marker'), ['controller' => 'Markers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Raws'), ['controller' => 'Raws', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Raw'), ['controller' => 'Raws', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="respondents index large-9 medium-8 columns content">
    <h3><?= __('Respondents') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('region_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('t_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('t_user_screen_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('official') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tmc') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($respondents as $respondent): ?>
            <tr>
                <td><?= $this->Number->format($respondent->id) ?></td>
                <td><?= $respondent->has('region') ? $this->Html->link($respondent->region->name, ['controller' => 'Regions', 'action' => 'view', $respondent->region->id]) : '' ?></td>
                <td><?= $this->Number->format($respondent->t_user_id) ?></td>
                <td><?= h($respondent->name) ?></td>
                <td><?= h($respondent->t_user_screen_name) ?></td>
                <td><?= h($respondent->official) ?></td>
                <td><?= h($respondent->active) ?></td>
                <td><?= h($respondent->tmc) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $respondent->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $respondent->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $respondent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $respondent->id)]) ?>
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

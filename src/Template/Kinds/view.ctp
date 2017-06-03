<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Kind'), ['action' => 'edit', $kind->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Kind'), ['action' => 'delete', $kind->id], ['confirm' => __('Are you sure you want to delete # {0}?', $kind->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Kinds'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Kind'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Raws'), ['controller' => 'Raws', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Raw'), ['controller' => 'Raws', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Classifications'), ['controller' => 'Classifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Classification'), ['controller' => 'Classifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Breeds'), ['controller' => 'Breeds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Breed'), ['controller' => 'Breeds', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Chunks'), ['controller' => 'Chunks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chunk'), ['controller' => 'Chunks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="kinds view large-9 medium-8 columns content">
    <h3><?= h($kind->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Raw') ?></th>
            <td><?= $kind->has('raw') ? $this->Html->link($kind->raw->id, ['controller' => 'Raws', 'action' => 'view', $kind->raw->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Classification') ?></th>
            <td><?= $kind->has('classification') ? $this->Html->link($kind->classification->name, ['controller' => 'Classifications', 'action' => 'view', $kind->classification->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($kind->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T Id') ?></th>
            <td><?= $this->Number->format($kind->t_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($kind->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($kind->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Processed') ?></th>
            <td><?= $kind->processed ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $kind->active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Verified') ?></th>
            <td><?= $kind->verified ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trained') ?></th>
            <td><?= $kind->trained ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Breeds') ?></h4>
        <?php if (!empty($kind->breeds)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Kind Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Classification Id') ?></th>
                <th scope="col"><?= __('Trained') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($kind->breeds as $breeds): ?>
            <tr>
                <td><?= h($breeds->id) ?></td>
                <td><?= h($breeds->kind_id) ?></td>
                <td><?= h($breeds->user_id) ?></td>
                <td><?= h($breeds->classification_id) ?></td>
                <td><?= h($breeds->trained) ?></td>
                <td><?= h($breeds->created) ?></td>
                <td><?= h($breeds->modified) ?></td>
                <td><?= h($breeds->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Breeds', 'action' => 'view', $breeds->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Breeds', 'action' => 'edit', $breeds->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Breeds', 'action' => 'delete', $breeds->id], ['confirm' => __('Are you sure you want to delete # {0}?', $breeds->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Chunks') ?></h4>
        <?php if (!empty($kind->chunks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('T Id') ?></th>
                <th scope="col"><?= __('Place') ?></th>
                <th scope="col"><?= __('Condition') ?></th>
                <th scope="col"><?= __('Processed') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Weather') ?></th>
                <th scope="col"><?= __('Verified') ?></th>
                <th scope="col"><?= __('Kind Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($kind->chunks as $chunks): ?>
            <tr>
                <td><?= h($chunks->id) ?></td>
                <td><?= h($chunks->t_id) ?></td>
                <td><?= h($chunks->place) ?></td>
                <td><?= h($chunks->condition) ?></td>
                <td><?= h($chunks->processed) ?></td>
                <td><?= h($chunks->created) ?></td>
                <td><?= h($chunks->modified) ?></td>
                <td><?= h($chunks->active) ?></td>
                <td><?= h($chunks->weather) ?></td>
                <td><?= h($chunks->verified) ?></td>
                <td><?= h($chunks->kind_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Chunks', 'action' => 'view', $chunks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Chunks', 'action' => 'edit', $chunks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Chunks', 'action' => 'delete', $chunks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chunks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

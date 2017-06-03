<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Chunk'), ['action' => 'edit', $chunk->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Chunk'), ['action' => 'delete', $chunk->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chunk->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Chunks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chunk'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Kinds'), ['controller' => 'Kinds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Kind'), ['controller' => 'Kinds', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pieces'), ['controller' => 'Pieces', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Piece'), ['controller' => 'Pieces', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Spots'), ['controller' => 'Spots', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Spot'), ['controller' => 'Spots', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="chunks view large-9 medium-8 columns content">
    <h3><?= h($chunk->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Place') ?></th>
            <td><?= h($chunk->place) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Condition') ?></th>
            <td><?= h($chunk->condition) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weather') ?></th>
            <td><?= h($chunk->weather) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Kind') ?></th>
            <td><?= $chunk->has('kind') ? $this->Html->link($chunk->kind->id, ['controller' => 'Kinds', 'action' => 'view', $chunk->kind->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($chunk->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T Id') ?></th>
            <td><?= $this->Number->format($chunk->t_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($chunk->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($chunk->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Processed') ?></th>
            <td><?= $chunk->processed ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $chunk->active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Verified') ?></th>
            <td><?= $chunk->verified ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pieces') ?></h4>
        <?php if (!empty($chunk->pieces)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Chunk Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Place') ?></th>
                <th scope="col"><?= __('Condition') ?></th>
                <th scope="col"><?= __('Weather') ?></th>
                <th scope="col"><?= __('Trained') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($chunk->pieces as $pieces): ?>
            <tr>
                <td><?= h($pieces->id) ?></td>
                <td><?= h($pieces->chunk_id) ?></td>
                <td><?= h($pieces->user_id) ?></td>
                <td><?= h($pieces->place) ?></td>
                <td><?= h($pieces->condition) ?></td>
                <td><?= h($pieces->weather) ?></td>
                <td><?= h($pieces->trained) ?></td>
                <td><?= h($pieces->created) ?></td>
                <td><?= h($pieces->modified) ?></td>
                <td><?= h($pieces->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pieces', 'action' => 'view', $pieces->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pieces', 'action' => 'edit', $pieces->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pieces', 'action' => 'delete', $pieces->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pieces->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Spots') ?></h4>
        <?php if (!empty($chunk->spots)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Chunk Id') ?></th>
                <th scope="col"><?= __('T Id') ?></th>
                <th scope="col"><?= __('Place Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Processed') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Score') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($chunk->spots as $spots): ?>
            <tr>
                <td><?= h($spots->id) ?></td>
                <td><?= h($spots->chunk_id) ?></td>
                <td><?= h($spots->t_id) ?></td>
                <td><?= h($spots->place_id) ?></td>
                <td><?= h($spots->category_id) ?></td>
                <td><?= h($spots->processed) ?></td>
                <td><?= h($spots->created) ?></td>
                <td><?= h($spots->modified) ?></td>
                <td><?= h($spots->active) ?></td>
                <td><?= h($spots->score) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Spots', 'action' => 'view', $spots->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Spots', 'action' => 'edit', $spots->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Spots', 'action' => 'delete', $spots->id], ['confirm' => __('Are you sure you want to delete # {0}?', $spots->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Spot'), ['action' => 'edit', $spot->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Spot'), ['action' => 'delete', $spot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $spot->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Spots'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Spot'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Chunks'), ['controller' => 'Chunks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chunk'), ['controller' => 'Chunks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Places'), ['controller' => 'Places', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Place'), ['controller' => 'Places', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Machines'), ['controller' => 'Machines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Machine'), ['controller' => 'Machines', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Spaces'), ['controller' => 'Spaces', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Space'), ['controller' => 'Spaces', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="spots view large-9 medium-8 columns content">
    <h3><?= h($spot->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Chunk') ?></th>
            <td><?= $spot->has('chunk') ? $this->Html->link($spot->chunk->id, ['controller' => 'Chunks', 'action' => 'view', $spot->chunk->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Place') ?></th>
            <td><?= $spot->has('place') ? $this->Html->link($spot->place->name, ['controller' => 'Places', 'action' => 'view', $spot->place->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $spot->has('category') ? $this->Html->link($spot->category->name, ['controller' => 'Categories', 'action' => 'view', $spot->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($spot->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T Id') ?></th>
            <td><?= $this->Number->format($spot->t_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score') ?></th>
            <td><?= $this->Number->format($spot->score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($spot->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($spot->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Processed') ?></th>
            <td><?= $spot->processed ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $spot->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Machines') ?></h4>
        <?php if (!empty($spot->machines)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('T Id') ?></th>
                <th scope="col"><?= __('Classification Id') ?></th>
                <th scope="col"><?= __('Place Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Weather Id') ?></th>
                <th scope="col"><?= __('Info') ?></th>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col"><?= __('Processed') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Spot Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($spot->machines as $machines): ?>
            <tr>
                <td><?= h($machines->id) ?></td>
                <td><?= h($machines->t_id) ?></td>
                <td><?= h($machines->classification_id) ?></td>
                <td><?= h($machines->place_id) ?></td>
                <td><?= h($machines->category_id) ?></td>
                <td><?= h($machines->weather_id) ?></td>
                <td><?= h($machines->info) ?></td>
                <td><?= h($machines->image) ?></td>
                <td><?= h($machines->processed) ?></td>
                <td><?= h($machines->created) ?></td>
                <td><?= h($machines->modified) ?></td>
                <td><?= h($machines->active) ?></td>
                <td><?= h($machines->spot_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Machines', 'action' => 'view', $machines->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Machines', 'action' => 'edit', $machines->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Machines', 'action' => 'delete', $machines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machines->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Spaces') ?></h4>
        <?php if (!empty($spot->spaces)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Spot Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Place Id') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($spot->spaces as $spaces): ?>
            <tr>
                <td><?= h($spaces->id) ?></td>
                <td><?= h($spaces->spot_id) ?></td>
                <td><?= h($spaces->user_id) ?></td>
                <td><?= h($spaces->place_id) ?></td>
                <td><?= h($spaces->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Spaces', 'action' => 'view', $spaces->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Spaces', 'action' => 'edit', $spaces->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Spaces', 'action' => 'delete', $spaces->id], ['confirm' => __('Are you sure you want to delete # {0}?', $spaces->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

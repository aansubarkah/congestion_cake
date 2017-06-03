<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Weather'), ['action' => 'edit', $weather->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Weather'), ['action' => 'delete', $weather->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weather->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Weather'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Weather'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Elements'), ['controller' => 'Elements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Element'), ['controller' => 'Elements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Humans'), ['controller' => 'Humans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Human'), ['controller' => 'Humans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Machines'), ['controller' => 'Machines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Machine'), ['controller' => 'Machines', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Markers'), ['controller' => 'Markers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Marker'), ['controller' => 'Markers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="weather view large-9 medium-8 columns content">
    <h3><?= h($weather->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($weather->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($weather->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $weather->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Elements') ?></h4>
        <?php if (!empty($weather->elements)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Raw Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Weather Id') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($weather->elements as $elements): ?>
            <tr>
                <td><?= h($elements->id) ?></td>
                <td><?= h($elements->raw_id) ?></td>
                <td><?= h($elements->user_id) ?></td>
                <td><?= h($elements->weather_id) ?></td>
                <td><?= h($elements->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Elements', 'action' => 'view', $elements->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Elements', 'action' => 'edit', $elements->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Elements', 'action' => 'delete', $elements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $elements->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Humans') ?></h4>
        <?php if (!empty($weather->humans)): ?>
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
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($weather->humans as $humans): ?>
            <tr>
                <td><?= h($humans->id) ?></td>
                <td><?= h($humans->t_id) ?></td>
                <td><?= h($humans->classification_id) ?></td>
                <td><?= h($humans->place_id) ?></td>
                <td><?= h($humans->category_id) ?></td>
                <td><?= h($humans->weather_id) ?></td>
                <td><?= h($humans->info) ?></td>
                <td><?= h($humans->image) ?></td>
                <td><?= h($humans->processed) ?></td>
                <td><?= h($humans->created) ?></td>
                <td><?= h($humans->modified) ?></td>
                <td><?= h($humans->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Humans', 'action' => 'view', $humans->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Humans', 'action' => 'edit', $humans->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Humans', 'action' => 'delete', $humans->id], ['confirm' => __('Are you sure you want to delete # {0}?', $humans->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Machines') ?></h4>
        <?php if (!empty($weather->machines)): ?>
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
            <?php foreach ($weather->machines as $machines): ?>
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
        <h4><?= __('Related Markers') ?></h4>
        <?php if (!empty($weather->markers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Respondent Id') ?></th>
                <th scope="col"><?= __('Weather Id') ?></th>
                <th scope="col"><?= __('Raw Id') ?></th>
                <th scope="col"><?= __('Lat') ?></th>
                <th scope="col"><?= __('Lng') ?></th>
                <th scope="col"><?= __('Info') ?></th>
                <th scope="col"><?= __('IsPinned') ?></th>
                <th scope="col"><?= __('IsCleared') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('IsExported') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($weather->markers as $markers): ?>
            <tr>
                <td><?= h($markers->id) ?></td>
                <td><?= h($markers->category_id) ?></td>
                <td><?= h($markers->user_id) ?></td>
                <td><?= h($markers->respondent_id) ?></td>
                <td><?= h($markers->weather_id) ?></td>
                <td><?= h($markers->raw_id) ?></td>
                <td><?= h($markers->lat) ?></td>
                <td><?= h($markers->lng) ?></td>
                <td><?= h($markers->info) ?></td>
                <td><?= h($markers->isPinned) ?></td>
                <td><?= h($markers->isCleared) ?></td>
                <td><?= h($markers->created) ?></td>
                <td><?= h($markers->modified) ?></td>
                <td><?= h($markers->active) ?></td>
                <td><?= h($markers->isExported) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Markers', 'action' => 'view', $markers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Markers', 'action' => 'edit', $markers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Markers', 'action' => 'delete', $markers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $markers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

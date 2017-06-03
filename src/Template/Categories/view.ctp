<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Humans'), ['controller' => 'Humans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Human'), ['controller' => 'Humans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Machines'), ['controller' => 'Machines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Machine'), ['controller' => 'Machines', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Markers'), ['controller' => 'Markers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Marker'), ['controller' => 'Markers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Spots'), ['controller' => 'Spots', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Spot'), ['controller' => 'Spots', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($category->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $category->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Humans') ?></h4>
        <?php if (!empty($category->humans)): ?>
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
            <?php foreach ($category->humans as $humans): ?>
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
        <?php if (!empty($category->machines)): ?>
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
            <?php foreach ($category->machines as $machines): ?>
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
        <?php if (!empty($category->markers)): ?>
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
            <?php foreach ($category->markers as $markers): ?>
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
    <div class="related">
        <h4><?= __('Related Spots') ?></h4>
        <?php if (!empty($category->spots)): ?>
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
            <?php foreach ($category->spots as $spots): ?>
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

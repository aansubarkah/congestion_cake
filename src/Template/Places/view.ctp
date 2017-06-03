<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Place'), ['action' => 'edit', $place->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Place'), ['action' => 'delete', $place->id], ['confirm' => __('Are you sure you want to delete # {0}?', $place->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Places'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Place'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regencies'), ['controller' => 'Regencies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Regency'), ['controller' => 'Regencies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Humans'), ['controller' => 'Humans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Human'), ['controller' => 'Humans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Machines'), ['controller' => 'Machines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Machine'), ['controller' => 'Machines', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Spaces'), ['controller' => 'Spaces', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Space'), ['controller' => 'Spaces', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Spots'), ['controller' => 'Spots', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Spot'), ['controller' => 'Spots', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="places view large-9 medium-8 columns content">
    <h3><?= h($place->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Regency') ?></th>
            <td><?= $place->has('regency') ? $this->Html->link($place->regency->name, ['controller' => 'Regencies', 'action' => 'view', $place->regency->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($place->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($place->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lat') ?></th>
            <td><?= $this->Number->format($place->lat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lng') ?></th>
            <td><?= $this->Number->format($place->lng) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $place->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Humans') ?></h4>
        <?php if (!empty($place->humans)): ?>
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
            <?php foreach ($place->humans as $humans): ?>
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
        <?php if (!empty($place->machines)): ?>
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
            <?php foreach ($place->machines as $machines): ?>
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
        <?php if (!empty($place->spaces)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Spot Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Place Id') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($place->spaces as $spaces): ?>
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
    <div class="related">
        <h4><?= __('Related Spots') ?></h4>
        <?php if (!empty($place->spots)): ?>
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
            <?php foreach ($place->spots as $spots): ?>
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

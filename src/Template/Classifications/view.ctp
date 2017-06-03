<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Classification'), ['action' => 'edit', $classification->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Classification'), ['action' => 'delete', $classification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classification->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Classifications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Classification'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Breeds'), ['controller' => 'Breeds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Breed'), ['controller' => 'Breeds', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Denominations'), ['controller' => 'Denominations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Denomination'), ['controller' => 'Denominations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Humans'), ['controller' => 'Humans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Human'), ['controller' => 'Humans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Kinds'), ['controller' => 'Kinds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Kind'), ['controller' => 'Kinds', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Machines'), ['controller' => 'Machines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Machine'), ['controller' => 'Machines', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="classifications view large-9 medium-8 columns content">
    <h3><?= h($classification->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($classification->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($classification->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $classification->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Breeds') ?></h4>
        <?php if (!empty($classification->breeds)): ?>
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
            <?php foreach ($classification->breeds as $breeds): ?>
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
        <h4><?= __('Related Denominations') ?></h4>
        <?php if (!empty($classification->denominations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Raw Id') ?></th>
                <th scope="col"><?= __('Classification Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('IsTrained') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($classification->denominations as $denominations): ?>
            <tr>
                <td><?= h($denominations->id) ?></td>
                <td><?= h($denominations->raw_id) ?></td>
                <td><?= h($denominations->classification_id) ?></td>
                <td><?= h($denominations->user_id) ?></td>
                <td><?= h($denominations->isTrained) ?></td>
                <td><?= h($denominations->created) ?></td>
                <td><?= h($denominations->modified) ?></td>
                <td><?= h($denominations->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Denominations', 'action' => 'view', $denominations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Denominations', 'action' => 'edit', $denominations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Denominations', 'action' => 'delete', $denominations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $denominations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Humans') ?></h4>
        <?php if (!empty($classification->humans)): ?>
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
            <?php foreach ($classification->humans as $humans): ?>
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
        <h4><?= __('Related Kinds') ?></h4>
        <?php if (!empty($classification->kinds)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Raw Id') ?></th>
                <th scope="col"><?= __('Classification Id') ?></th>
                <th scope="col"><?= __('Processed') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('T Id') ?></th>
                <th scope="col"><?= __('Verified') ?></th>
                <th scope="col"><?= __('Trained') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($classification->kinds as $kinds): ?>
            <tr>
                <td><?= h($kinds->id) ?></td>
                <td><?= h($kinds->raw_id) ?></td>
                <td><?= h($kinds->classification_id) ?></td>
                <td><?= h($kinds->processed) ?></td>
                <td><?= h($kinds->created) ?></td>
                <td><?= h($kinds->modified) ?></td>
                <td><?= h($kinds->active) ?></td>
                <td><?= h($kinds->t_id) ?></td>
                <td><?= h($kinds->verified) ?></td>
                <td><?= h($kinds->trained) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Kinds', 'action' => 'view', $kinds->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Kinds', 'action' => 'edit', $kinds->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Kinds', 'action' => 'delete', $kinds->id], ['confirm' => __('Are you sure you want to delete # {0}?', $kinds->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Machines') ?></h4>
        <?php if (!empty($classification->machines)): ?>
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
            <?php foreach ($classification->machines as $machines): ?>
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
</div>

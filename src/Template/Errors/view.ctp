<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Error'), ['action' => 'edit', $error->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Error'), ['action' => 'delete', $error->id], ['confirm' => __('Are you sure you want to delete # {0}?', $error->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Errors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Error'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fails'), ['controller' => 'Fails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fail'), ['controller' => 'Fails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="errors view large-9 medium-8 columns content">
    <h3><?= h($error->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($error->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($error->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $error->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Fails') ?></h4>
        <?php if (!empty($error->fails)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Raw Id') ?></th>
                <th scope="col"><?= __('Error Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($error->fails as $fails): ?>
            <tr>
                <td><?= h($fails->id) ?></td>
                <td><?= h($fails->raw_id) ?></td>
                <td><?= h($fails->error_id) ?></td>
                <td><?= h($fails->created) ?></td>
                <td><?= h($fails->modified) ?></td>
                <td><?= h($fails->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fails', 'action' => 'view', $fails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fails', 'action' => 'edit', $fails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fails', 'action' => 'delete', $fails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reviews') ?></h4>
        <?php if (!empty($error->reviews)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Raw Id') ?></th>
                <th scope="col"><?= __('Error Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Explanation') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($error->reviews as $reviews): ?>
            <tr>
                <td><?= h($reviews->id) ?></td>
                <td><?= h($reviews->raw_id) ?></td>
                <td><?= h($reviews->error_id) ?></td>
                <td><?= h($reviews->user_id) ?></td>
                <td><?= h($reviews->explanation) ?></td>
                <td><?= h($reviews->created) ?></td>
                <td><?= h($reviews->modified) ?></td>
                <td><?= h($reviews->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reviews', 'action' => 'view', $reviews->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reviews', 'action' => 'edit', $reviews->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reviews', 'action' => 'delete', $reviews->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reviews->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

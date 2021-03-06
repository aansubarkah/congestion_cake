<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Words'), ['controller' => 'Words', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Word'), ['controller' => 'Words', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tags view large-9 medium-8 columns content">
    <h3><?= h($tag->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($tag->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($tag->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Example') ?></th>
            <td><?= h($tag->example) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tag->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $tag->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Words') ?></h4>
        <?php if (!empty($tag->words)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('T Id') ?></th>
                <th scope="col"><?= __('Tag Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Sequence') ?></th>
                <th scope="col"><?= __('Word') ?></th>
                <th scope="col"><?= __('Verified') ?></th>
                <th scope="col"><?= __('Trained') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tag->words as $words): ?>
            <tr>
                <td><?= h($words->id) ?></td>
                <td><?= h($words->t_id) ?></td>
                <td><?= h($words->tag_id) ?></td>
                <td><?= h($words->user_id) ?></td>
                <td><?= h($words->sequence) ?></td>
                <td><?= h($words->word) ?></td>
                <td><?= h($words->verified) ?></td>
                <td><?= h($words->trained) ?></td>
                <td><?= h($words->created) ?></td>
                <td><?= h($words->modified) ?></td>
                <td><?= h($words->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Words', 'action' => 'view', $words->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Words', 'action' => 'edit', $words->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Words', 'action' => 'delete', $words->id], ['confirm' => __('Are you sure you want to delete # {0}?', $words->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

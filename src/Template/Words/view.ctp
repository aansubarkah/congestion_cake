<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Word'), ['action' => 'edit', $word->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Word'), ['action' => 'delete', $word->id], ['confirm' => __('Are you sure you want to delete # {0}?', $word->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Words'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Word'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Syllables'), ['controller' => 'Syllables', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Syllable'), ['controller' => 'Syllables', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="words view large-9 medium-8 columns content">
    <h3><?= h($word->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tag') ?></th>
            <td><?= $word->has('tag') ? $this->Html->link($word->tag->name, ['controller' => 'Tags', 'action' => 'view', $word->tag->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $word->has('user') ? $this->Html->link($word->user->id, ['controller' => 'Users', 'action' => 'view', $word->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Word') ?></th>
            <td><?= h($word->word) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($word->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T Id') ?></th>
            <td><?= $this->Number->format($word->t_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sequence') ?></th>
            <td><?= $this->Number->format($word->sequence) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($word->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($word->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Verified') ?></th>
            <td><?= $word->verified ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trained') ?></th>
            <td><?= $word->trained ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $word->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Syllables') ?></h4>
        <?php if (!empty($word->syllables)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Word Id') ?></th>
                <th scope="col"><?= __('Trained') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Word') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($word->syllables as $syllables): ?>
            <tr>
                <td><?= h($syllables->id) ?></td>
                <td><?= h($syllables->user_id) ?></td>
                <td><?= h($syllables->word_id) ?></td>
                <td><?= h($syllables->trained) ?></td>
                <td><?= h($syllables->created) ?></td>
                <td><?= h($syllables->modified) ?></td>
                <td><?= h($syllables->active) ?></td>
                <td><?= h($syllables->word) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Syllables', 'action' => 'view', $syllables->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Syllables', 'action' => 'edit', $syllables->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Syllables', 'action' => 'delete', $syllables->id], ['confirm' => __('Are you sure you want to delete # {0}?', $syllables->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

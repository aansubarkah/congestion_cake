<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $word->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $word->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Words'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Syllables'), ['controller' => 'Syllables', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Syllable'), ['controller' => 'Syllables', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="words form large-9 medium-8 columns content">
    <?= $this->Form->create($word) ?>
    <fieldset>
        <legend><?= __('Edit Word') ?></legend>
        <?php
            echo $this->Form->control('t_id');
            echo $this->Form->control('tag_id', ['options' => $tags, 'empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('sequence');
            echo $this->Form->control('word');
            echo $this->Form->control('verified');
            echo $this->Form->control('trained');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

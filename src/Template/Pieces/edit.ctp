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
                ['action' => 'delete', $piece->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $piece->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pieces'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Chunks'), ['controller' => 'Chunks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Chunk'), ['controller' => 'Chunks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pieces form large-9 medium-8 columns content">
    <?= $this->Form->create($piece) ?>
    <fieldset>
        <legend><?= __('Edit Piece') ?></legend>
        <?php
            echo $this->Form->control('chunk_id', ['options' => $chunks, 'empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('place');
            echo $this->Form->control('condition');
            echo $this->Form->control('weather');
            echo $this->Form->control('trained');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

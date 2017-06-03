<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Spots'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Chunks'), ['controller' => 'Chunks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Chunk'), ['controller' => 'Chunks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Places'), ['controller' => 'Places', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Place'), ['controller' => 'Places', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Machines'), ['controller' => 'Machines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Machine'), ['controller' => 'Machines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Spaces'), ['controller' => 'Spaces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Space'), ['controller' => 'Spaces', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="spots form large-9 medium-8 columns content">
    <?= $this->Form->create($spot) ?>
    <fieldset>
        <legend><?= __('Add Spot') ?></legend>
        <?php
            echo $this->Form->control('chunk_id', ['options' => $chunks, 'empty' => true]);
            echo $this->Form->control('t_id');
            echo $this->Form->control('place_id', ['options' => $places, 'empty' => true]);
            echo $this->Form->control('category_id', ['options' => $categories, 'empty' => true]);
            echo $this->Form->control('processed');
            echo $this->Form->control('active');
            echo $this->Form->control('score');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

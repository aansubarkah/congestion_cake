<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Breeds'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Kinds'), ['controller' => 'Kinds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Kind'), ['controller' => 'Kinds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Classifications'), ['controller' => 'Classifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Classification'), ['controller' => 'Classifications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="breeds form large-9 medium-8 columns content">
    <?= $this->Form->create($breed) ?>
    <fieldset>
        <legend><?= __('Add Breed') ?></legend>
        <?php
            echo $this->Form->control('kind_id', ['options' => $kinds, 'empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('classification_id', ['options' => $classifications, 'empty' => true]);
            echo $this->Form->control('trained');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

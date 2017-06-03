<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Chunks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Kinds'), ['controller' => 'Kinds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Kind'), ['controller' => 'Kinds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pieces'), ['controller' => 'Pieces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Piece'), ['controller' => 'Pieces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Spots'), ['controller' => 'Spots', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Spot'), ['controller' => 'Spots', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="chunks form large-9 medium-8 columns content">
    <?= $this->Form->create($chunk) ?>
    <fieldset>
        <legend><?= __('Add Chunk') ?></legend>
        <?php
            echo $this->Form->control('t_id');
            echo $this->Form->control('place');
            echo $this->Form->control('condition');
            echo $this->Form->control('processed');
            echo $this->Form->control('active');
            echo $this->Form->control('weather');
            echo $this->Form->control('verified');
            echo $this->Form->control('kind_id', ['options' => $kinds, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

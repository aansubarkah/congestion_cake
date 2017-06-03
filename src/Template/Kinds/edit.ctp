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
                ['action' => 'delete', $kind->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $kind->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Kinds'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Raws'), ['controller' => 'Raws', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Raw'), ['controller' => 'Raws', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Classifications'), ['controller' => 'Classifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Classification'), ['controller' => 'Classifications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Breeds'), ['controller' => 'Breeds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Breed'), ['controller' => 'Breeds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Chunks'), ['controller' => 'Chunks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Chunk'), ['controller' => 'Chunks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="kinds form large-9 medium-8 columns content">
    <?= $this->Form->create($kind) ?>
    <fieldset>
        <legend><?= __('Edit Kind') ?></legend>
        <?php
            echo $this->Form->control('raw_id', ['options' => $raws, 'empty' => true]);
            echo $this->Form->control('classification_id', ['options' => $classifications, 'empty' => true]);
            echo $this->Form->control('processed');
            echo $this->Form->control('active');
            echo $this->Form->control('t_id');
            echo $this->Form->control('verified');
            echo $this->Form->control('trained');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

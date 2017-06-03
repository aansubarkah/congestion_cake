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
                ['action' => 'delete', $place->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $place->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Places'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Regencies'), ['controller' => 'Regencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Regency'), ['controller' => 'Regencies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Humans'), ['controller' => 'Humans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Human'), ['controller' => 'Humans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Machines'), ['controller' => 'Machines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Machine'), ['controller' => 'Machines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Spaces'), ['controller' => 'Spaces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Space'), ['controller' => 'Spaces', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Spots'), ['controller' => 'Spots', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Spot'), ['controller' => 'Spots', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="places form large-9 medium-8 columns content">
    <?= $this->Form->create($place) ?>
    <fieldset>
        <legend><?= __('Edit Place') ?></legend>
        <?php
            echo $this->Form->control('regency_id', ['options' => $regencies, 'empty' => true]);
            echo $this->Form->control('name');
            echo $this->Form->control('lat');
            echo $this->Form->control('lng');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

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
                ['action' => 'delete', $regency->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $regency->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Regencies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Hierarchies'), ['controller' => 'Hierarchies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Hierarchy'), ['controller' => 'Hierarchies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Districts'), ['controller' => 'Districts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New District'), ['controller' => 'Districts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Places'), ['controller' => 'Places', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Place'), ['controller' => 'Places', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="regencies form large-9 medium-8 columns content">
    <?= $this->Form->create($regency) ?>
    <fieldset>
        <legend><?= __('Edit Regency') ?></legend>
        <?php
            echo $this->Form->control('state_id', ['options' => $states, 'empty' => true]);
            echo $this->Form->control('hierarchy_id', ['options' => $hierarchies, 'empty' => true]);
            echo $this->Form->control('name');
            echo $this->Form->control('lat');
            echo $this->Form->control('lng');
            echo $this->Form->control('active');
            echo $this->Form->control('alias');
            echo $this->Form->control('regions._ids', ['options' => $regions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

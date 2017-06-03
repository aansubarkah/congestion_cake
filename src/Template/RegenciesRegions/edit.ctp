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
                ['action' => 'delete', $regenciesRegion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $regenciesRegion->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Regencies Regions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Regencies'), ['controller' => 'Regencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Regency'), ['controller' => 'Regencies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="regenciesRegions form large-9 medium-8 columns content">
    <?= $this->Form->create($regenciesRegion) ?>
    <fieldset>
        <legend><?= __('Edit Regencies Region') ?></legend>
        <?php
            echo $this->Form->control('regency_id', ['options' => $regencies, 'empty' => true]);
            echo $this->Form->control('region_id', ['options' => $regions, 'empty' => true]);
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

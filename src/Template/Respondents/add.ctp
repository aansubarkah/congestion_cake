<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Respondents'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Markers'), ['controller' => 'Markers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Marker'), ['controller' => 'Markers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Raws'), ['controller' => 'Raws', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Raw'), ['controller' => 'Raws', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="respondents form large-9 medium-8 columns content">
    <?= $this->Form->create($respondent) ?>
    <fieldset>
        <legend><?= __('Add Respondent') ?></legend>
        <?php
            echo $this->Form->control('region_id', ['options' => $regions, 'empty' => true]);
            echo $this->Form->control('t_user_id');
            echo $this->Form->control('name');
            echo $this->Form->control('t_user_screen_name');
            echo $this->Form->control('official');
            echo $this->Form->control('active');
            echo $this->Form->control('tmc');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Markers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Respondents'), ['controller' => 'Respondents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Respondent'), ['controller' => 'Respondents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Weather'), ['controller' => 'Weather', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Weather'), ['controller' => 'Weather', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Raws'), ['controller' => 'Raws', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Raw'), ['controller' => 'Raws', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="markers form large-9 medium-8 columns content">
    <?= $this->Form->create($marker) ?>
    <fieldset>
        <legend><?= __('Add Marker') ?></legend>
        <?php
            echo $this->Form->control('category_id', ['options' => $categories, 'empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('respondent_id', ['options' => $respondents, 'empty' => true]);
            echo $this->Form->control('weather_id', ['options' => $weather, 'empty' => true]);
            echo $this->Form->control('raw_id', ['options' => $raws, 'empty' => true]);
            echo $this->Form->control('lat');
            echo $this->Form->control('lng');
            echo $this->Form->control('info');
            echo $this->Form->control('isPinned');
            echo $this->Form->control('isCleared');
            echo $this->Form->control('active');
            echo $this->Form->control('isExported');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

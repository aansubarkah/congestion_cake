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
                ['action' => 'delete', $human->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $human->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Humans'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Classifications'), ['controller' => 'Classifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Classification'), ['controller' => 'Classifications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Places'), ['controller' => 'Places', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Place'), ['controller' => 'Places', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Weather'), ['controller' => 'Weather', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Weather'), ['controller' => 'Weather', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="humans form large-9 medium-8 columns content">
    <?= $this->Form->create($human) ?>
    <fieldset>
        <legend><?= __('Edit Human') ?></legend>
        <?php
            echo $this->Form->control('t_id');
            echo $this->Form->control('classification_id', ['options' => $classifications, 'empty' => true]);
            echo $this->Form->control('place_id', ['options' => $places, 'empty' => true]);
            echo $this->Form->control('category_id', ['options' => $categories, 'empty' => true]);
            echo $this->Form->control('weather_id', ['options' => $weather, 'empty' => true]);
            echo $this->Form->control('info');
            echo $this->Form->control('image');
            echo $this->Form->control('processed');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

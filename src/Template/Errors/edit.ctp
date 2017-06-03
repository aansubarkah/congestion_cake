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
                ['action' => 'delete', $error->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $error->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Errors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Fails'), ['controller' => 'Fails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fail'), ['controller' => 'Fails', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="errors form large-9 medium-8 columns content">
    <?= $this->Form->create($error) ?>
    <fieldset>
        <legend><?= __('Edit Error') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

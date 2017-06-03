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
                ['action' => 'delete', $fail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fails'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Raws'), ['controller' => 'Raws', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Raw'), ['controller' => 'Raws', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Errors'), ['controller' => 'Errors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Error'), ['controller' => 'Errors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fails form large-9 medium-8 columns content">
    <?= $this->Form->create($fail) ?>
    <fieldset>
        <legend><?= __('Edit Fail') ?></legend>
        <?php
            echo $this->Form->control('raw_id', ['options' => $raws, 'empty' => true]);
            echo $this->Form->control('error_id', ['options' => $errors, 'empty' => true]);
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

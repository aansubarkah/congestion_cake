<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Region'), ['action' => 'edit', $region->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Region'), ['action' => 'delete', $region->id], ['confirm' => __('Are you sure you want to delete # {0}?', $region->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Respondents'), ['controller' => 'Respondents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Respondent'), ['controller' => 'Respondents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regencies'), ['controller' => 'Regencies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Regency'), ['controller' => 'Regencies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="regions view large-9 medium-8 columns content">
    <h3><?= h($region->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($region->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($region->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($region->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lat') ?></th>
            <td><?= $this->Number->format($region->lat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lng') ?></th>
            <td><?= $this->Number->format($region->lng) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $region->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Locations') ?></h4>
        <?php if (!empty($region->locations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Raw Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Region Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Lat') ?></th>
                <th scope="col"><?= __('Lng') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($region->locations as $locations): ?>
            <tr>
                <td><?= h($locations->id) ?></td>
                <td><?= h($locations->raw_id) ?></td>
                <td><?= h($locations->user_id) ?></td>
                <td><?= h($locations->region_id) ?></td>
                <td><?= h($locations->name) ?></td>
                <td><?= h($locations->lat) ?></td>
                <td><?= h($locations->lng) ?></td>
                <td><?= h($locations->created) ?></td>
                <td><?= h($locations->modified) ?></td>
                <td><?= h($locations->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Locations', 'action' => 'view', $locations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Locations', 'action' => 'edit', $locations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Locations', 'action' => 'delete', $locations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Respondents') ?></h4>
        <?php if (!empty($region->respondents)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Region Id') ?></th>
                <th scope="col"><?= __('T User Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('T User Screen Name') ?></th>
                <th scope="col"><?= __('Official') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Tmc') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($region->respondents as $respondents): ?>
            <tr>
                <td><?= h($respondents->id) ?></td>
                <td><?= h($respondents->region_id) ?></td>
                <td><?= h($respondents->t_user_id) ?></td>
                <td><?= h($respondents->name) ?></td>
                <td><?= h($respondents->t_user_screen_name) ?></td>
                <td><?= h($respondents->official) ?></td>
                <td><?= h($respondents->active) ?></td>
                <td><?= h($respondents->tmc) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Respondents', 'action' => 'view', $respondents->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Respondents', 'action' => 'edit', $respondents->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Respondents', 'action' => 'delete', $respondents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $respondents->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($region->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Group Id') ?></th>
                <th scope="col"><?= __('Region Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('T User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($region->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->group_id) ?></td>
                <td><?= h($users->region_id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->active) ?></td>
                <td><?= h($users->t_user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Regencies') ?></h4>
        <?php if (!empty($region->regencies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col"><?= __('Hierarchy Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Lat') ?></th>
                <th scope="col"><?= __('Lng') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Alias') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($region->regencies as $regencies): ?>
            <tr>
                <td><?= h($regencies->id) ?></td>
                <td><?= h($regencies->state_id) ?></td>
                <td><?= h($regencies->hierarchy_id) ?></td>
                <td><?= h($regencies->name) ?></td>
                <td><?= h($regencies->lat) ?></td>
                <td><?= h($regencies->lng) ?></td>
                <td><?= h($regencies->active) ?></td>
                <td><?= h($regencies->alias) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Regencies', 'action' => 'view', $regencies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Regencies', 'action' => 'edit', $regencies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Regencies', 'action' => 'delete', $regencies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $regencies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

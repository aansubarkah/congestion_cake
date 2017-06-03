<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Breeds'), ['controller' => 'Breeds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Breed'), ['controller' => 'Breeds', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Denominations'), ['controller' => 'Denominations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Denomination'), ['controller' => 'Denominations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Elements'), ['controller' => 'Elements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Element'), ['controller' => 'Elements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Logs'), ['controller' => 'Logs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Log'), ['controller' => 'Logs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Markers'), ['controller' => 'Markers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Marker'), ['controller' => 'Markers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pieces'), ['controller' => 'Pieces', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Piece'), ['controller' => 'Pieces', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Spaces'), ['controller' => 'Spaces', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Space'), ['controller' => 'Spaces', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Syllables'), ['controller' => 'Syllables', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Syllable'), ['controller' => 'Syllables', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Words'), ['controller' => 'Words', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Word'), ['controller' => 'Words', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Group') ?></th>
            <td><?= $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Region') ?></th>
            <td><?= $user->has('region') ? $this->Html->link($user->region->name, ['controller' => 'Regions', 'action' => 'view', $user->region->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T User Id') ?></th>
            <td><?= $this->Number->format($user->t_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $user->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Breeds') ?></h4>
        <?php if (!empty($user->breeds)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Kind Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Classification Id') ?></th>
                <th scope="col"><?= __('Trained') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->breeds as $breeds): ?>
            <tr>
                <td><?= h($breeds->id) ?></td>
                <td><?= h($breeds->kind_id) ?></td>
                <td><?= h($breeds->user_id) ?></td>
                <td><?= h($breeds->classification_id) ?></td>
                <td><?= h($breeds->trained) ?></td>
                <td><?= h($breeds->created) ?></td>
                <td><?= h($breeds->modified) ?></td>
                <td><?= h($breeds->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Breeds', 'action' => 'view', $breeds->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Breeds', 'action' => 'edit', $breeds->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Breeds', 'action' => 'delete', $breeds->id], ['confirm' => __('Are you sure you want to delete # {0}?', $breeds->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Denominations') ?></h4>
        <?php if (!empty($user->denominations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Raw Id') ?></th>
                <th scope="col"><?= __('Classification Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('IsTrained') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->denominations as $denominations): ?>
            <tr>
                <td><?= h($denominations->id) ?></td>
                <td><?= h($denominations->raw_id) ?></td>
                <td><?= h($denominations->classification_id) ?></td>
                <td><?= h($denominations->user_id) ?></td>
                <td><?= h($denominations->isTrained) ?></td>
                <td><?= h($denominations->created) ?></td>
                <td><?= h($denominations->modified) ?></td>
                <td><?= h($denominations->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Denominations', 'action' => 'view', $denominations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Denominations', 'action' => 'edit', $denominations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Denominations', 'action' => 'delete', $denominations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $denominations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Elements') ?></h4>
        <?php if (!empty($user->elements)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Raw Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Weather Id') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->elements as $elements): ?>
            <tr>
                <td><?= h($elements->id) ?></td>
                <td><?= h($elements->raw_id) ?></td>
                <td><?= h($elements->user_id) ?></td>
                <td><?= h($elements->weather_id) ?></td>
                <td><?= h($elements->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Elements', 'action' => 'view', $elements->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Elements', 'action' => 'edit', $elements->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Elements', 'action' => 'delete', $elements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $elements->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Locations') ?></h4>
        <?php if (!empty($user->locations)): ?>
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
            <?php foreach ($user->locations as $locations): ?>
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
        <h4><?= __('Related Logs') ?></h4>
        <?php if (!empty($user->logs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Controller') ?></th>
                <th scope="col"><?= __('ControllerID') ?></th>
                <th scope="col"><?= __('Action') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->logs as $logs): ?>
            <tr>
                <td><?= h($logs->id) ?></td>
                <td><?= h($logs->user_id) ?></td>
                <td><?= h($logs->controller) ?></td>
                <td><?= h($logs->controllerID) ?></td>
                <td><?= h($logs->action) ?></td>
                <td><?= h($logs->name) ?></td>
                <td><?= h($logs->created) ?></td>
                <td><?= h($logs->modified) ?></td>
                <td><?= h($logs->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Logs', 'action' => 'view', $logs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Logs', 'action' => 'edit', $logs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Logs', 'action' => 'delete', $logs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Markers') ?></h4>
        <?php if (!empty($user->markers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Respondent Id') ?></th>
                <th scope="col"><?= __('Weather Id') ?></th>
                <th scope="col"><?= __('Raw Id') ?></th>
                <th scope="col"><?= __('Lat') ?></th>
                <th scope="col"><?= __('Lng') ?></th>
                <th scope="col"><?= __('Info') ?></th>
                <th scope="col"><?= __('IsPinned') ?></th>
                <th scope="col"><?= __('IsCleared') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('IsExported') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->markers as $markers): ?>
            <tr>
                <td><?= h($markers->id) ?></td>
                <td><?= h($markers->category_id) ?></td>
                <td><?= h($markers->user_id) ?></td>
                <td><?= h($markers->respondent_id) ?></td>
                <td><?= h($markers->weather_id) ?></td>
                <td><?= h($markers->raw_id) ?></td>
                <td><?= h($markers->lat) ?></td>
                <td><?= h($markers->lng) ?></td>
                <td><?= h($markers->info) ?></td>
                <td><?= h($markers->isPinned) ?></td>
                <td><?= h($markers->isCleared) ?></td>
                <td><?= h($markers->created) ?></td>
                <td><?= h($markers->modified) ?></td>
                <td><?= h($markers->active) ?></td>
                <td><?= h($markers->isExported) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Markers', 'action' => 'view', $markers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Markers', 'action' => 'edit', $markers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Markers', 'action' => 'delete', $markers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $markers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pieces') ?></h4>
        <?php if (!empty($user->pieces)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Chunk Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Place') ?></th>
                <th scope="col"><?= __('Condition') ?></th>
                <th scope="col"><?= __('Weather') ?></th>
                <th scope="col"><?= __('Trained') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->pieces as $pieces): ?>
            <tr>
                <td><?= h($pieces->id) ?></td>
                <td><?= h($pieces->chunk_id) ?></td>
                <td><?= h($pieces->user_id) ?></td>
                <td><?= h($pieces->place) ?></td>
                <td><?= h($pieces->condition) ?></td>
                <td><?= h($pieces->weather) ?></td>
                <td><?= h($pieces->trained) ?></td>
                <td><?= h($pieces->created) ?></td>
                <td><?= h($pieces->modified) ?></td>
                <td><?= h($pieces->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pieces', 'action' => 'view', $pieces->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pieces', 'action' => 'edit', $pieces->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pieces', 'action' => 'delete', $pieces->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pieces->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reviews') ?></h4>
        <?php if (!empty($user->reviews)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Raw Id') ?></th>
                <th scope="col"><?= __('Error Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Explanation') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->reviews as $reviews): ?>
            <tr>
                <td><?= h($reviews->id) ?></td>
                <td><?= h($reviews->raw_id) ?></td>
                <td><?= h($reviews->error_id) ?></td>
                <td><?= h($reviews->user_id) ?></td>
                <td><?= h($reviews->explanation) ?></td>
                <td><?= h($reviews->created) ?></td>
                <td><?= h($reviews->modified) ?></td>
                <td><?= h($reviews->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reviews', 'action' => 'view', $reviews->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reviews', 'action' => 'edit', $reviews->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reviews', 'action' => 'delete', $reviews->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reviews->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Spaces') ?></h4>
        <?php if (!empty($user->spaces)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Spot Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Place Id') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->spaces as $spaces): ?>
            <tr>
                <td><?= h($spaces->id) ?></td>
                <td><?= h($spaces->spot_id) ?></td>
                <td><?= h($spaces->user_id) ?></td>
                <td><?= h($spaces->place_id) ?></td>
                <td><?= h($spaces->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Spaces', 'action' => 'view', $spaces->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Spaces', 'action' => 'edit', $spaces->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Spaces', 'action' => 'delete', $spaces->id], ['confirm' => __('Are you sure you want to delete # {0}?', $spaces->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Syllables') ?></h4>
        <?php if (!empty($user->syllables)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Word Id') ?></th>
                <th scope="col"><?= __('Trained') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Word') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->syllables as $syllables): ?>
            <tr>
                <td><?= h($syllables->id) ?></td>
                <td><?= h($syllables->user_id) ?></td>
                <td><?= h($syllables->word_id) ?></td>
                <td><?= h($syllables->trained) ?></td>
                <td><?= h($syllables->created) ?></td>
                <td><?= h($syllables->modified) ?></td>
                <td><?= h($syllables->active) ?></td>
                <td><?= h($syllables->word) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Syllables', 'action' => 'view', $syllables->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Syllables', 'action' => 'edit', $syllables->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Syllables', 'action' => 'delete', $syllables->id], ['confirm' => __('Are you sure you want to delete # {0}?', $syllables->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Words') ?></h4>
        <?php if (!empty($user->words)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('T Id') ?></th>
                <th scope="col"><?= __('Tag Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Sequence') ?></th>
                <th scope="col"><?= __('Word') ?></th>
                <th scope="col"><?= __('Verified') ?></th>
                <th scope="col"><?= __('Trained') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->words as $words): ?>
            <tr>
                <td><?= h($words->id) ?></td>
                <td><?= h($words->t_id) ?></td>
                <td><?= h($words->tag_id) ?></td>
                <td><?= h($words->user_id) ?></td>
                <td><?= h($words->sequence) ?></td>
                <td><?= h($words->word) ?></td>
                <td><?= h($words->verified) ?></td>
                <td><?= h($words->trained) ?></td>
                <td><?= h($words->created) ?></td>
                <td><?= h($words->modified) ?></td>
                <td><?= h($words->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Words', 'action' => 'view', $words->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Words', 'action' => 'edit', $words->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Words', 'action' => 'delete', $words->id], ['confirm' => __('Are you sure you want to delete # {0}?', $words->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

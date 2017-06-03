<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Raw'), ['action' => 'edit', $raw->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Raw'), ['action' => 'delete', $raw->id], ['confirm' => __('Are you sure you want to delete # {0}?', $raw->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Raws'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Raw'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Respondents'), ['controller' => 'Respondents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Respondent'), ['controller' => 'Respondents', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Claps'), ['controller' => 'Claps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clap'), ['controller' => 'Claps', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Denominations'), ['controller' => 'Denominations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Denomination'), ['controller' => 'Denominations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Elements'), ['controller' => 'Elements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Element'), ['controller' => 'Elements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fails'), ['controller' => 'Fails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fail'), ['controller' => 'Fails', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Kinds'), ['controller' => 'Kinds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Kind'), ['controller' => 'Kinds', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Markers'), ['controller' => 'Markers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Marker'), ['controller' => 'Markers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="raws view large-9 medium-8 columns content">
    <h3><?= h($raw->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Respondent') ?></th>
            <td><?= $raw->has('respondent') ? $this->Html->link($raw->respondent->name, ['controller' => 'Respondents', 'action' => 'view', $raw->respondent->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Info') ?></th>
            <td><?= h($raw->info) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($raw->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Media') ?></th>
            <td><?= h($raw->media) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($raw->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T Id') ?></th>
            <td><?= $this->Number->format($raw->t_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Width') ?></th>
            <td><?= $this->Number->format($raw->width) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Height') ?></th>
            <td><?= $this->Number->format($raw->height) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('T Time') ?></th>
            <td><?= h($raw->t_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($raw->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($raw->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Processed') ?></th>
            <td><?= $raw->processed ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $raw->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Claps') ?></h4>
        <?php if (!empty($raw->claps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Raw Id') ?></th>
                <th scope="col"><?= __('UserScreenName') ?></th>
                <th scope="col"><?= __('UserID') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($raw->claps as $claps): ?>
            <tr>
                <td><?= h($claps->id) ?></td>
                <td><?= h($claps->raw_id) ?></td>
                <td><?= h($claps->userScreenName) ?></td>
                <td><?= h($claps->userID) ?></td>
                <td><?= h($claps->created) ?></td>
                <td><?= h($claps->modified) ?></td>
                <td><?= h($claps->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Claps', 'action' => 'view', $claps->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Claps', 'action' => 'edit', $claps->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Claps', 'action' => 'delete', $claps->id], ['confirm' => __('Are you sure you want to delete # {0}?', $claps->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Denominations') ?></h4>
        <?php if (!empty($raw->denominations)): ?>
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
            <?php foreach ($raw->denominations as $denominations): ?>
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
        <?php if (!empty($raw->elements)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Raw Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Weather Id') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($raw->elements as $elements): ?>
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
        <h4><?= __('Related Fails') ?></h4>
        <?php if (!empty($raw->fails)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Raw Id') ?></th>
                <th scope="col"><?= __('Error Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($raw->fails as $fails): ?>
            <tr>
                <td><?= h($fails->id) ?></td>
                <td><?= h($fails->raw_id) ?></td>
                <td><?= h($fails->error_id) ?></td>
                <td><?= h($fails->created) ?></td>
                <td><?= h($fails->modified) ?></td>
                <td><?= h($fails->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fails', 'action' => 'view', $fails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fails', 'action' => 'edit', $fails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fails', 'action' => 'delete', $fails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Kinds') ?></h4>
        <?php if (!empty($raw->kinds)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Raw Id') ?></th>
                <th scope="col"><?= __('Classification Id') ?></th>
                <th scope="col"><?= __('Processed') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('T Id') ?></th>
                <th scope="col"><?= __('Verified') ?></th>
                <th scope="col"><?= __('Trained') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($raw->kinds as $kinds): ?>
            <tr>
                <td><?= h($kinds->id) ?></td>
                <td><?= h($kinds->raw_id) ?></td>
                <td><?= h($kinds->classification_id) ?></td>
                <td><?= h($kinds->processed) ?></td>
                <td><?= h($kinds->created) ?></td>
                <td><?= h($kinds->modified) ?></td>
                <td><?= h($kinds->active) ?></td>
                <td><?= h($kinds->t_id) ?></td>
                <td><?= h($kinds->verified) ?></td>
                <td><?= h($kinds->trained) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Kinds', 'action' => 'view', $kinds->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Kinds', 'action' => 'edit', $kinds->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Kinds', 'action' => 'delete', $kinds->id], ['confirm' => __('Are you sure you want to delete # {0}?', $kinds->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Locations') ?></h4>
        <?php if (!empty($raw->locations)): ?>
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
            <?php foreach ($raw->locations as $locations): ?>
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
        <h4><?= __('Related Markers') ?></h4>
        <?php if (!empty($raw->markers)): ?>
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
            <?php foreach ($raw->markers as $markers): ?>
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
        <h4><?= __('Related Reviews') ?></h4>
        <?php if (!empty($raw->reviews)): ?>
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
            <?php foreach ($raw->reviews as $reviews): ?>
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
</div>

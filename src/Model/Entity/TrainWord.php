<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TrainWord Entity
 *
 * @property int $raw_id
 * @property string $info
 * @property \Cake\I18n\FrozenTime $t_time
 * @property int $syllable_id
 * @property int $sequence
 * @property string $syllable_name
 * @property bool $trained
 * @property int $tag_id
 * @property string $tag_name
 * @property string $tag_description
 *
 * @property \App\Model\Entity\Raw $raw
 * @property \App\Model\Entity\DataTwitter $datatwitter
 * @property \App\Model\Entity\Syllable $syllable
 * @property \App\Model\Entity\Tag $tag
 */
class TrainWord extends Entity
{

}

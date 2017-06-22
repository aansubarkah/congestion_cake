<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LabelWord Entity
 *
 * @property int $raw_id
 * @property string $info
 * @property \Cake\I18n\FrozenTime $t_time
 * @property int $syllable_id
 * @property int $sequence
 * @property string $syllable_name
 * @property int $tag_id
 * @property string $tag_name
 * @property string $tag_description
 *
 * @property \App\Model\Entity\Raw $raw
 * @property \App\Model\Entity\Syllable $syllable
 * @property \App\Model\Entity\Tag $tag
 */
class LabelWord extends Entity
{

}

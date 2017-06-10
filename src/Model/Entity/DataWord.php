<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DataWord Entity
 *
 * @property int $raw_id
 * @property string $info
 * @property \Cake\I18n\FrozenTime $t_time
 * @property int $kind_id
 * @property int $classification_id
 * @property string $classification_name
 * @property int $word_id
 * @property int $sequence
 * @property string $word_name
 * @property int $tag_id
 * @property string $tag_name
 * @property string $tag_description
 *
 * @property \App\Model\Entity\Raw $raw
 * @property \App\Model\Entity\Kind $kind
 * @property \App\Model\Entity\Classification $classification
 * @property \App\Model\Entity\Word $word
 * @property \App\Model\Entity\Tag $tag
 */
class DataWord extends Entity
{

}

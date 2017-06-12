<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DataSyllable Entity
 *
 * @property int $raw_id
 * @property string $info
 * @property \Cake\I18n\FrozenTime $t_time
 * @property int $kind_id
 * @property int $classification_id
 * @property string $classification_name
 * @property int $syllable_id
 * @property int $sequence
 * @property string $syllable_name
 * @property int $tag_id
 * @property string $tag_name
 * @property string $tag_description
 * @property bool $verified
 *
 * @property \App\Model\Entity\Raw $raw
 * @property \App\Model\Entity\Kind $kind
 * @property \App\Model\Entity\Classification $classification
 * @property \App\Model\Entity\Syllable $syllable
 * @property \App\Model\Entity\Tag $tag
 */
class DataSyllable extends Entity
{

}

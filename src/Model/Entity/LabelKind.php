<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LabelKind Entity
 *
 * @property int $raw_id
 * @property string $info
 * @property \Cake\I18n\FrozenTime $t_time
 * @property int $kind_id
 * @property int $at_classification_id
 * @property int $denomination_id
 * @property int $mt_classification_id
 * @property int $classification_id
 * @property string $classification_name
 * @property int $respondent_id
 * @property string $respondent_name
 *
 * @property \App\Model\Entity\Raw $raw
 * @property \App\Model\Entity\Kind $kind
 * @property \App\Model\Entity\AtClassification $at_classification
 * @property \App\Model\Entity\Denomination $denomination
 * @property \App\Model\Entity\MtClassification $mt_classification
 * @property \App\Model\Entity\Classification $classification
 * @property \App\Model\Entity\Respondent $respondent
 */
class LabelKind extends Entity
{

}

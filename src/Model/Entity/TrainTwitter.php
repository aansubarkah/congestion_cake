<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TrainTwitter Entity
 *
 * @property int $denomination_id
 * @property int $classification_id
 * @property string $classification_name
 * @property int $user_id
 * @property string $user_name
 * @property int $raw_id
 * @property string $info
 * @property \Cake\I18n\FrozenTime $t_time
 * @property int $respondent_id
 * @property string $respondent_name
 *
 * @property \App\Model\Entity\Denomination $denomination
 * @property \App\Model\Entity\Classification $classification
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Raw $raw
 * @property \App\Model\Entity\Respondent $respondent
 */
class TrainTwitter extends Entity
{

}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DataPiece Entity
 *
 * @property int $raw_id
 * @property string $info
 * @property \Cake\I18n\FrozenTime $t_time
 * @property int $respondent_id
 * @property string $respondent_name
 * @property int $piece_id
 * @property string $place
 * @property string $condition
 * @property string $weather
 * @property int $user_id
 * @property string $username
 *
 * @property \App\Model\Entity\Raw $raw
 * @property \App\Model\Entity\Respondent $respondent
 * @property \App\Model\Entity\Piece $piece
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\DataTwitter $datatwitter
 */
class DataPiece extends Entity
{

}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DataChunk Entity
 *
 * @property int $raw_id
 * @property string $info
 * @property \Cake\I18n\FrozenTime $t_time
 * @property int $respondent_id
 * @property string $respondent_name
 * @property int $chunk_id
 * @property string $place
 * @property string $condition
 * @property string $weather
 *
 * @property \App\Model\Entity\Raw $raw
 * @property \App\Model\Entity\Respondent $respondent
 * @property \App\Model\Entity\Chunk $chunk
 * @property \App\Model\Entity\DataTwitter $datatwitter
 */
class DataChunk extends Entity
{

}

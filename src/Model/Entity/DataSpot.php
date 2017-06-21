<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DataSpot Entity
 *
 * @property int $raw_id
 * @property string $info
 * @property \Cake\I18n\FrozenTime $t_time
 * @property int $respondent_id
 * @property string $respondent_name
 * @property int $chunk_id
 * @property string $condition
 * @property int $spot_id
 * @property int $place_id
 * @property string $place_name
 * @property float $lat
 * @property float $lng
 * @property int $regency_id
 * @property string $regency_name
 * @property int $hierarchy_id
 * @property string $hierarchy_name
 * @property int $category_id
 * @property string $category_name
 * @property int $weather_id
 * @property string $weather_name
 *
 * @property \App\Model\Entity\Place $place
 * @property \App\Model\Entity\Weather $weather
 * @property \App\Model\Entity\Raw $raw
 * @property \App\Model\Entity\Respondent $respondent
 * @property \App\Model\Entity\Chunk $chunk
 * @property \App\Model\Entity\Spot $spot
 * @property \App\Model\Entity\Regency $regency
 * @property \App\Model\Entity\Hierarchy $hierarchy
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\DataTwitter $datatwitter
 */
class DataSpot extends Entity
{

}

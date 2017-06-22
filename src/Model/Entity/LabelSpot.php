<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LabelSpot Entity
 *
 * @property int $raw_id
 * @property string $info
 * @property \Cake\I18n\FrozenTime $t_time
 * @property int $respondent_id
 * @property string $respondent_name
 * @property int $piece_id
 * @property string $condition
 * @property int $space_id
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
 * @property \App\Model\Entity\Piece $piece
 * @property \App\Model\Entity\Space $space
 * @property \App\Model\Entity\Regency $regency
 * @property \App\Model\Entity\Hierarchy $hierarchy
 * @property \App\Model\Entity\Category $category
 */
class LabelSpot extends Entity
{

}

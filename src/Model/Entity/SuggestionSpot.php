<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SuggestionSpot Entity
 *
 * @property int $place_id
 * @property string $place_name
 * @property float $lat
 * @property float $lng
 * @property int $regency_id
 * @property string $regency_name
 * @property int $hierarchy_id
 * @property string $hierarchy_name
 * @property string $place_fullname
 * @property string $regency_fullname
 *
 * @property \App\Model\Entity\Place $place
 * @property \App\Model\Entity\Regency $regency
 * @property \App\Model\Entity\Hierarchy $hierarchy
 */
class SuggestionSpot extends Entity
{

}

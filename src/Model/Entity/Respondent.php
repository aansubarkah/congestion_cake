<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Respondent Entity
 *
 * @property int $id
 * @property int $region_id
 * @property int $t_user_id
 * @property string $name
 * @property string $t_user_screen_name
 * @property bool $official
 * @property bool $active
 * @property bool $tmc
 *
 * @property \App\Model\Entity\Region $region
 * @property \App\Model\Entity\Marker[] $markers
 * @property \App\Model\Entity\Raw[] $raws
 * @property \App\Model\Entity\DataTwitter[] $datatwitter
 */
class Respondent extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}

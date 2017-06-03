<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Raw Entity
 *
 * @property int $id
 * @property int $respondent_id
 * @property int $t_id
 * @property \Cake\I18n\FrozenTime $t_time
 * @property string $info
 * @property string $url
 * @property string $media
 * @property int $width
 * @property int $height
 * @property bool $processed
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\Respondent $respondent
 * @property \App\Model\Entity\Clap[] $claps
 * @property \App\Model\Entity\Denomination[] $denominations
 * @property \App\Model\Entity\Element[] $elements
 * @property \App\Model\Entity\Fail[] $fails
 * @property \App\Model\Entity\Kind[] $kinds
 * @property \App\Model\Entity\Location[] $locations
 * @property \App\Model\Entity\Marker[] $markers
 * @property \App\Model\Entity\Review[] $reviews
 */
class Raw extends Entity
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

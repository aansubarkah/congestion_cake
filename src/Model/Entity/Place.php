<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Place Entity
 *
 * @property int $id
 * @property int $regency_id
 * @property string $name
 * @property float $lat
 * @property float $lng
 * @property bool $active
 *
 * @property \App\Model\Entity\Regency $regency
 * @property \App\Model\Entity\Human[] $humans
 * @property \App\Model\Entity\Machine[] $machines
 * @property \App\Model\Entity\Space[] $spaces
 * @property \App\Model\Entity\Spot[] $spots
 */
class Place extends Entity
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

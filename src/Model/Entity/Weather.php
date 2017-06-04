<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Weather Entity
 *
 * @property int $id
 * @property string $name
 * @property bool $active
 *
 * @property \App\Model\Entity\Element[] $elements
 * @property \App\Model\Entity\Human[] $humans
 * @property \App\Model\Entity\Machine[] $machines
 * @property \App\Model\Entity\Marker[] $markers
 */
class Weather extends Entity
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
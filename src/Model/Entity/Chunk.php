<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chunk Entity
 *
 * @property int $id
 * @property int $t_id
 * @property string $place
 * @property string $condition
 * @property bool $processed
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 * @property string $weather
 * @property bool $verified
 * @property int $kind_id
 *
 * @property \App\Model\Entity\T $t
 * @property \App\Model\Entity\Kind $kind
 * @property \App\Model\Entity\Piece[] $pieces
 * @property \App\Model\Entity\Spot[] $spots
 */
class Chunk extends Entity
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

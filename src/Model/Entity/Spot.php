<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Spot Entity
 *
 * @property int $id
 * @property int $chunk_id
 * @property int $t_id
 * @property int $place_id
 * @property int $category_id
 * @property bool $processed
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 * @property float $score
 *
 * @property \App\Model\Entity\Chunk $chunk
 * @property \App\Model\Entity\T $t
 * @property \App\Model\Entity\Place $place
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Machine[] $machines
 * @property \App\Model\Entity\Space[] $spaces
 */
class Spot extends Entity
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

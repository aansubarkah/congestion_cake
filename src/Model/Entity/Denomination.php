<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Denomination Entity
 *
 * @property int $id
 * @property int $raw_id
 * @property int $classification_id
 * @property int $user_id
 * @property bool $trained
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\Raw $raw
 * @property \App\Model\Entity\Classification $classification
 * @property \App\Model\Entity\User $user
 */
class Denomination extends Entity
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

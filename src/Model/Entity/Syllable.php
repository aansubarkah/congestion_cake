<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Syllable Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $raw_id
 * @property bool $trained
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 * @property string $name
 * @property int $tag_id
 * @property int $sequence
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Raw $raw
 * @property \App\Model\Entity\Tag $tag
 */
class Syllable extends Entity
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

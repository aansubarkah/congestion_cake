<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Word Entity
 *
 * @property int $id
 * @property int $raw_id
 * @property int $tag_id
 * @property int $sequence
 * @property string $name
 * @property bool $verified
 * @property bool $trained
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 * @property bool $processed
 *
 * @property \App\Model\Entity\T $t
 * @property \App\Model\Entity\Tag $tag
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Syllable[] $syllables
 */
class Word extends Entity
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

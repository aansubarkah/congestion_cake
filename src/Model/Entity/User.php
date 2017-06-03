<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property int $group_id
 * @property int $region_id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property bool $active
 * @property int $t_user_id
 *
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\Region $region
 * @property \App\Model\Entity\TUser $t_user
 * @property \App\Model\Entity\Breed[] $breeds
 * @property \App\Model\Entity\Denomination[] $denominations
 * @property \App\Model\Entity\Element[] $elements
 * @property \App\Model\Entity\Location[] $locations
 * @property \App\Model\Entity\Log[] $logs
 * @property \App\Model\Entity\Marker[] $markers
 * @property \App\Model\Entity\Piece[] $pieces
 * @property \App\Model\Entity\Review[] $reviews
 * @property \App\Model\Entity\Space[] $spaces
 * @property \App\Model\Entity\Syllable[] $syllables
 * @property \App\Model\Entity\Word[] $words
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}

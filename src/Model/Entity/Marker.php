<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Marker Entity
 *
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property int $respondent_id
 * @property int $weather_id
 * @property int $raw_id
 * @property float $lat
 * @property float $lng
 * @property string $info
 * @property bool $pinned
 * @property bool $cleared
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 * @property bool $exported
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Respondent $respondent
 * @property \App\Model\Entity\Weather $weather
 * @property \App\Model\Entity\Raw $raw
 */
class Marker extends Entity
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

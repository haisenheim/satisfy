<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Champ Entity.
 *
 * @property int $id
 * @property string $nom
 * @property string $name
 * @property int $category_id
 * @property \App\Model\Entity\Category $category
 * @property int $sequence
 * @property \App\Model\Entity\Fich[] $fiches
 */
class Champ extends Entity
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
        'id' => false,
    ];
}

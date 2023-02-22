<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Habitation Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $lieu
 * @property int $nbchambres
 * @property int $salon
 * @property int $cuisine
 * @property int $garage
 * @property int $douche
 * @property string $description
 * @property string $resume
 * @property \Cake\I18n\Time $created
 * @property int $nbportes
 * @property int $category_id
 * @property \App\Model\Entity\Category $category
 * @property int $type_id
 * @property \App\Model\Entity\Type $type
 * @property string $image1
 * @property string $image2
 * @property int $prix
 */
class Habitation extends Entity
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

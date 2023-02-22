<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ChampsFich Entity.
 *
 * @property int $id
 * @property int $fiche_id
 * @property \App\Model\Entity\Fich $fich
 * @property int $champ_id
 * @property \App\Model\Entity\Champ $champ
 * @property int $tmc
 * @property int $mc
 * @property int $sat
 * @property int $tsat
 * @property string $commentaire
 * @property \Cake\I18n\Time $created
 */
class ChampsFich extends Entity
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

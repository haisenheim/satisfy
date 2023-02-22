<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Session Entity.
 *
 * @property int $id
 * @property string $code
 * @property \Cake\I18n\Time $dt_debut
 * @property \Cake\I18n\Time $dt_fin
 * @property int $formateur_id
 * @property \App\Model\Entity\Formateur $formateur
 * @property int $formation_id
 * @property \App\Model\Entity\Formation $formation
 * @property int $nb_participants
 * @property \Cake\I18n\Time $created
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property int $statut
 * @property \App\Model\Entity\Fich[] $fiches
 */
class Session extends Entity
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

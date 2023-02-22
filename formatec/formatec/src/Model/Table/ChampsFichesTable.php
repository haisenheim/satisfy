<?php
namespace App\Model\Table;

use App\Model\Entity\ChampsFich;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ChampsFiches Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Fiches
 * @property \Cake\ORM\Association\BelongsTo $Champs
 */
class ChampsFichesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('champs_fiches');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Fiches', [
            'foreignKey' => 'fiche_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Champs', [
            'foreignKey' => 'champ_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('tmc')
            ->requirePresence('tmc', 'create')
            ->notEmpty('tmc');

        $validator
            ->integer('mc')
            ->requirePresence('mc', 'create')
            ->notEmpty('mc');

        $validator
            ->integer('sat')
            ->requirePresence('sat', 'create')
            ->notEmpty('sat');

        $validator
            ->integer('tsat')
            ->requirePresence('tsat', 'create')
            ->notEmpty('tsat');

        $validator
            ->requirePresence('commentaire', 'create')
            ->notEmpty('commentaire');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['fiche_id'], 'Fiches'));
        $rules->add($rules->existsIn(['champ_id'], 'Champs'));
        return $rules;
    }
}

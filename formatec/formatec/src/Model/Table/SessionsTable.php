<?php
namespace App\Model\Table;

use App\Model\Entity\Session;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sessions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Formateurs
 * @property \Cake\ORM\Association\BelongsTo $Formations
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Fiches
 * @property \Cake\ORM\Association\BelongsToMany $Clients
 */
class SessionsTable extends Table
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

        $this->table('sessions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Formateurs', [
            'foreignKey' => 'formateur_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Formations', [
            'foreignKey' => 'formation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'Left'
        ]);
        $this->hasMany('Fiches', [
            'foreignKey' => 'session_id'
        ]);
        $this->belongsToMany('Clients', [
            'foreignKey' => 'session_id',
            'targetForeignKey' => 'client_id',
            'joinTable' => 'clients_sessions'
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
            ->requirePresence('code', 'create')
            ->notEmpty('code');




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
        $rules->add($rules->existsIn(['formateur_id'], 'Formateurs'));
        $rules->add($rules->existsIn(['formation_id'], 'Formations'));

        return $rules;
    }
}

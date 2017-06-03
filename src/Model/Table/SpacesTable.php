<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Spaces Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Spots
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Places
 *
 * @method \App\Model\Entity\Space get($primaryKey, $options = [])
 * @method \App\Model\Entity\Space newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Space[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Space|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Space patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Space[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Space findOrCreate($search, callable $callback = null, $options = [])
 */
class SpacesTable extends Table
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

        $this->setTable('spaces');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Spots', [
            'foreignKey' => 'spot_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Places', [
            'foreignKey' => 'place_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

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
        $rules->add($rules->existsIn(['spot_id'], 'Spots'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['place_id'], 'Places'));

        return $rules;
    }
}

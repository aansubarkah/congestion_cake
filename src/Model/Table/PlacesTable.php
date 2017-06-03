<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Places Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Regencies
 * @property \Cake\ORM\Association\HasMany $Humans
 * @property \Cake\ORM\Association\HasMany $Machines
 * @property \Cake\ORM\Association\HasMany $Spaces
 * @property \Cake\ORM\Association\HasMany $Spots
 *
 * @method \App\Model\Entity\Place get($primaryKey, $options = [])
 * @method \App\Model\Entity\Place newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Place[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Place|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Place patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Place[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Place findOrCreate($search, callable $callback = null, $options = [])
 */
class PlacesTable extends Table
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

        $this->setTable('places');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Regencies', [
            'foreignKey' => 'regency_id'
        ]);
        $this->hasMany('Humans', [
            'foreignKey' => 'place_id'
        ]);
        $this->hasMany('Machines', [
            'foreignKey' => 'place_id'
        ]);
        $this->hasMany('Spaces', [
            'foreignKey' => 'place_id'
        ]);
        $this->hasMany('Spots', [
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
            ->allowEmpty('name');

        $validator
            ->decimal('lat')
            ->allowEmpty('lat');

        $validator
            ->decimal('lng')
            ->allowEmpty('lng');

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
        $rules->add($rules->existsIn(['regency_id'], 'Regencies'));

        return $rules;
    }
}

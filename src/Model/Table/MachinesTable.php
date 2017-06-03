<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Machines Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Ts
 * @property \Cake\ORM\Association\BelongsTo $Classifications
 * @property \Cake\ORM\Association\BelongsTo $Places
 * @property \Cake\ORM\Association\BelongsTo $Categories
 * @property \Cake\ORM\Association\BelongsTo $Weather
 * @property \Cake\ORM\Association\BelongsTo $Spots
 *
 * @method \App\Model\Entity\Machine get($primaryKey, $options = [])
 * @method \App\Model\Entity\Machine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Machine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Machine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Machine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Machine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Machine findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MachinesTable extends Table
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

        $this->setTable('machines');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ts', [
            'foreignKey' => 't_id'
        ]);
        $this->belongsTo('Classifications', [
            'foreignKey' => 'classification_id'
        ]);
        $this->belongsTo('Places', [
            'foreignKey' => 'place_id'
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id'
        ]);
        $this->belongsTo('Weather', [
            'foreignKey' => 'weather_id'
        ]);
        $this->belongsTo('Spots', [
            'foreignKey' => 'spot_id'
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
            ->allowEmpty('info');

        $validator
            ->allowEmpty('image');

        $validator
            ->boolean('processed')
            ->allowEmpty('processed');

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
        $rules->add($rules->existsIn(['t_id'], 'Ts'));
        $rules->add($rules->existsIn(['classification_id'], 'Classifications'));
        $rules->add($rules->existsIn(['place_id'], 'Places'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['weather_id'], 'Weather'));
        $rules->add($rules->existsIn(['spot_id'], 'Spots'));

        return $rules;
    }
}

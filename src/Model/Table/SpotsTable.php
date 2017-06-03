<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Spots Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Chunks
 * @property \Cake\ORM\Association\BelongsTo $Ts
 * @property \Cake\ORM\Association\BelongsTo $Places
 * @property \Cake\ORM\Association\BelongsTo $Categories
 * @property \Cake\ORM\Association\HasMany $Machines
 * @property \Cake\ORM\Association\HasMany $Spaces
 *
 * @method \App\Model\Entity\Spot get($primaryKey, $options = [])
 * @method \App\Model\Entity\Spot newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Spot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Spot|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Spot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Spot[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Spot findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SpotsTable extends Table
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

        $this->setTable('spots');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Chunks', [
            'foreignKey' => 'chunk_id'
        ]);
        $this->belongsTo('Ts', [
            'foreignKey' => 't_id'
        ]);
        $this->belongsTo('Places', [
            'foreignKey' => 'place_id'
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id'
        ]);
        $this->hasMany('Machines', [
            'foreignKey' => 'spot_id'
        ]);
        $this->hasMany('Spaces', [
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
            ->boolean('processed')
            ->allowEmpty('processed');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->decimal('score')
            ->allowEmpty('score');

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
        $rules->add($rules->existsIn(['chunk_id'], 'Chunks'));
        $rules->add($rules->existsIn(['t_id'], 'Ts'));
        $rules->add($rules->existsIn(['place_id'], 'Places'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chunks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Ts
 * @property \Cake\ORM\Association\BelongsTo $Kinds
 * @property \Cake\ORM\Association\HasMany $Pieces
 * @property \Cake\ORM\Association\HasMany $Spots
 *
 * @method \App\Model\Entity\Chunk get($primaryKey, $options = [])
 * @method \App\Model\Entity\Chunk newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Chunk[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Chunk|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chunk patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Chunk[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Chunk findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ChunksTable extends Table
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

        $this->setTable('chunks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ts', [
            'foreignKey' => 't_id'
        ]);
        $this->belongsTo('Kinds', [
            'foreignKey' => 'kind_id'
        ]);
        $this->hasMany('Pieces', [
            'foreignKey' => 'chunk_id'
        ]);
        $this->hasMany('Spots', [
            'foreignKey' => 'chunk_id'
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
            ->allowEmpty('place');

        $validator
            ->allowEmpty('condition');

        $validator
            ->boolean('processed')
            ->allowEmpty('processed');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->allowEmpty('weather');

        $validator
            ->boolean('verified')
            ->allowEmpty('verified');

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
        $rules->add($rules->existsIn(['kind_id'], 'Kinds'));

        return $rules;
    }
}

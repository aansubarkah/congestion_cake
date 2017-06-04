<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Kinds Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Raws
 * @property \Cake\ORM\Association\BelongsTo $Classifications
 * @property \Cake\ORM\Association\HasMany $Breeds
 * @property \Cake\ORM\Association\HasMany $Chunks
 *
 * @method \App\Model\Entity\Kind get($primaryKey, $options = [])
 * @method \App\Model\Entity\Kind newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Kind[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Kind|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Kind patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Kind[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Kind findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class KindsTable extends Table
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

        $this->setTable('kinds');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Raws', [
            'foreignKey' => 'raw_id'
        ]);
        $this->belongsTo('Classifications', [
            'foreignKey' => 'classification_id'
        ]);
        $this->hasMany('Breeds', [
            'foreignKey' => 'kind_id'
        ]);
        $this->hasMany('Chunks', [
            'foreignKey' => 'kind_id'
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
            ->boolean('verified')
            ->allowEmpty('verified');

        $validator
            ->boolean('trained')
            ->allowEmpty('trained');

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
        $rules->add($rules->existsIn(['raw_id'], 'Raws'));
        $rules->add($rules->existsIn(['classification_id'], 'Classifications'));

        return $rules;
    }
}

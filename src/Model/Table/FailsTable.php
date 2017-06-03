<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Raws
 * @property \Cake\ORM\Association\BelongsTo $Errors
 *
 * @method \App\Model\Entity\Fail get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fail findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FailsTable extends Table
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

        $this->setTable('fails');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Raws', [
            'foreignKey' => 'raw_id'
        ]);
        $this->belongsTo('Errors', [
            'foreignKey' => 'error_id'
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
        $rules->add($rules->existsIn(['raw_id'], 'Raws'));
        $rules->add($rules->existsIn(['error_id'], 'Errors'));

        return $rules;
    }
}

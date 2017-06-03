<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Elements Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Raws
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Weather
 *
 * @method \App\Model\Entity\Element get($primaryKey, $options = [])
 * @method \App\Model\Entity\Element newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Element[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Element|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Element patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Element[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Element findOrCreate($search, callable $callback = null, $options = [])
 */
class ElementsTable extends Table
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

        $this->setTable('elements');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Raws', [
            'foreignKey' => 'raw_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Weather', [
            'foreignKey' => 'weather_id'
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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['weather_id'], 'Weather'));

        return $rules;
    }
}

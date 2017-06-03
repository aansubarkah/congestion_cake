<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Errors Model
 *
 * @property \Cake\ORM\Association\HasMany $Fails
 * @property \Cake\ORM\Association\HasMany $Reviews
 *
 * @method \App\Model\Entity\Error get($primaryKey, $options = [])
 * @method \App\Model\Entity\Error newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Error[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Error|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Error patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Error[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Error findOrCreate($search, callable $callback = null, $options = [])
 */
class ErrorsTable extends Table
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

        $this->setTable('errors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Fails', [
            'foreignKey' => 'error_id'
        ]);
        $this->hasMany('Reviews', [
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        return $validator;
    }
}

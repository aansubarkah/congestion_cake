<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Classifications Model
 *
 * @property \Cake\ORM\Association\HasMany $Breeds
 * @property \Cake\ORM\Association\HasMany $Denominations
 * @property \Cake\ORM\Association\HasMany $Humans
 * @property \Cake\ORM\Association\HasMany $Kinds
 * @property \Cake\ORM\Association\HasMany $Machines
 *
 * @method \App\Model\Entity\Classification get($primaryKey, $options = [])
 * @method \App\Model\Entity\Classification newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Classification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Classification|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Classification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Classification[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Classification findOrCreate($search, callable $callback = null, $options = [])
 */
class ClassificationsTable extends Table
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

        $this->setTable('classifications');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Breeds', [
            'foreignKey' => 'classification_id'
        ]);
        $this->hasMany('Denominations', [
            'foreignKey' => 'classification_id'
        ]);
        $this->hasMany('Humans', [
            'foreignKey' => 'classification_id'
        ]);
        $this->hasMany('Kinds', [
            'foreignKey' => 'classification_id'
        ]);
        $this->hasMany('Machines', [
            'foreignKey' => 'classification_id'
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

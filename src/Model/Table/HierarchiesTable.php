<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hierarchies Model
 *
 * @property \Cake\ORM\Association\HasMany $Regencies
 *
 * @method \App\Model\Entity\Hierarchy get($primaryKey, $options = [])
 * @method \App\Model\Entity\Hierarchy newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Hierarchy[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hierarchy|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hierarchy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Hierarchy[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hierarchy findOrCreate($search, callable $callback = null, $options = [])
 */
class HierarchiesTable extends Table
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

        $this->setTable('hierarchies');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Regencies', [
            'foreignKey' => 'hierarchy_id'
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

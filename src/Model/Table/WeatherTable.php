<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Weather Model
 *
 * @property \Cake\ORM\Association\HasMany $Elements
 * @property \Cake\ORM\Association\HasMany $Humans
 * @property \Cake\ORM\Association\HasMany $Machines
 * @property \Cake\ORM\Association\HasMany $Markers
 *
 * @method \App\Model\Entity\Weather get($primaryKey, $options = [])
 * @method \App\Model\Entity\Weather newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Weather[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Weather|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Weather patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Weather[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Weather findOrCreate($search, callable $callback = null, $options = [])
 */
class WeatherTable extends Table
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

        $this->setTable('weather');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Elements', [
            'foreignKey' => 'weather_id'
        ]);
        $this->hasMany('Humans', [
            'foreignKey' => 'weather_id'
        ]);
        $this->hasMany('Machines', [
            'foreignKey' => 'weather_id'
        ]);
        $this->hasMany('Markers', [
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

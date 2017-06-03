<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RegenciesRegions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Regencies
 * @property \Cake\ORM\Association\BelongsTo $Regions
 *
 * @method \App\Model\Entity\RegenciesRegion get($primaryKey, $options = [])
 * @method \App\Model\Entity\RegenciesRegion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RegenciesRegion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RegenciesRegion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RegenciesRegion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RegenciesRegion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RegenciesRegion findOrCreate($search, callable $callback = null, $options = [])
 */
class RegenciesRegionsTable extends Table
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

        $this->setTable('regencies_regions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Regencies', [
            'foreignKey' => 'regency_id'
        ]);
        $this->belongsTo('Regions', [
            'foreignKey' => 'region_id'
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
        $rules->add($rules->existsIn(['regency_id'], 'Regencies'));
        $rules->add($rules->existsIn(['region_id'], 'Regions'));

        return $rules;
    }
}

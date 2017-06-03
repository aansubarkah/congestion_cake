<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Regencies Model
 *
 * @property \Cake\ORM\Association\BelongsTo $States
 * @property \Cake\ORM\Association\BelongsTo $Hierarchies
 * @property \Cake\ORM\Association\HasMany $Districts
 * @property \Cake\ORM\Association\HasMany $Places
 * @property \Cake\ORM\Association\BelongsToMany $Regions
 *
 * @method \App\Model\Entity\Regency get($primaryKey, $options = [])
 * @method \App\Model\Entity\Regency newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Regency[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Regency|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Regency patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Regency[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Regency findOrCreate($search, callable $callback = null, $options = [])
 */
class RegenciesTable extends Table
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

        $this->setTable('regencies');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('States', [
            'foreignKey' => 'state_id'
        ]);
        $this->belongsTo('Hierarchies', [
            'foreignKey' => 'hierarchy_id'
        ]);
        $this->hasMany('Districts', [
            'foreignKey' => 'regency_id'
        ]);
        $this->hasMany('Places', [
            'foreignKey' => 'regency_id'
        ]);
        $this->belongsToMany('Regions', [
            'foreignKey' => 'regency_id',
            'targetForeignKey' => 'region_id',
            'joinTable' => 'regencies_regions'
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
            ->decimal('lat')
            ->allowEmpty('lat');

        $validator
            ->decimal('lng')
            ->allowEmpty('lng');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->allowEmpty('alias');

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
        $rules->add($rules->existsIn(['state_id'], 'States'));
        $rules->add($rules->existsIn(['hierarchy_id'], 'Hierarchies'));

        return $rules;
    }
}

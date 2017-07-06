<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SuggestionSpot Model
 *
 * @property \App\Model\Table\PlacesTable|\Cake\ORM\Association\BelongsTo $Places
 * @property \App\Model\Table\RegenciesTable|\Cake\ORM\Association\BelongsTo $Regencies
 * @property \App\Model\Table\HierarchiesTable|\Cake\ORM\Association\BelongsTo $Hierarchies
 *
 * @method \App\Model\Entity\SuggestionSpot get($primaryKey, $options = [])
 * @method \App\Model\Entity\SuggestionSpot newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SuggestionSpot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SuggestionSpot|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SuggestionSpot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SuggestionSpot[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SuggestionSpot findOrCreate($search, callable $callback = null, $options = [])
 */
class SuggestionSpotTable extends Table
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

        $this->setTable('suggestion_spot');

        $this->belongsTo('Places', [
            'foreignKey' => 'place_id'
        ]);
        $this->belongsTo('Regencies', [
            'foreignKey' => 'regency_id'
        ]);
        $this->belongsTo('Hierarchies', [
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
            ->allowEmpty('place_name');

        $validator
            ->decimal('lat')
            ->allowEmpty('lat');

        $validator
            ->decimal('lng')
            ->allowEmpty('lng');

        $validator
            ->allowEmpty('regency_name');

        $validator
            ->allowEmpty('hierarchy_name');

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
        $rules->add($rules->existsIn(['place_id'], 'Places'));
        $rules->add($rules->existsIn(['regency_id'], 'Regencies'));
        $rules->add($rules->existsIn(['hierarchy_id'], 'Hierarchies'));

        return $rules;
    }
}

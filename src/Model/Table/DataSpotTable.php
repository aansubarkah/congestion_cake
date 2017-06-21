<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DataSpot Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Raws
 * @property \Cake\ORM\Association\BelongsTo $Respondents
 * @property \Cake\ORM\Association\BelongsTo $Chunks
 * @property \Cake\ORM\Association\BelongsTo $Spots
 * @property \Cake\ORM\Association\BelongsTo $Places
 * @property \Cake\ORM\Association\BelongsTo $Regencies
 * @property \Cake\ORM\Association\BelongsTo $Hierarchies
 * @property \Cake\ORM\Association\BelongsTo $Categories
 * @property \Cake\ORM\Association\BelongsTo $Weather
 * @property \Cake\ORM\Association\BelongsTo $DataTwitter
 *
 * @method \App\Model\Entity\DataSpot get($primaryKey, $options = [])
 * @method \App\Model\Entity\DataSpot newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DataSpot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DataSpot|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DataSpot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DataSpot[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DataSpot findOrCreate($search, callable $callback = null, $options = [])
 */
class DataSpotTable extends Table
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

        $this->setTable('data_spot');

        $this->belongsTo('Raws', [
            'foreignKey' => 'raw_id'
        ]);
        $this->belongsTo('Respondents', [
            'foreignKey' => 'respondent_id'
        ]);
        $this->belongsTo('Chunks', [
            'foreignKey' => 'chunk_id'
        ]);
        $this->belongsTo('Spots', [
            'foreignKey' => 'spot_id'
        ]);
        $this->belongsTo('Places', [
            'foreignKey' => 'place_id'
        ]);
        $this->belongsTo('Regencies', [
            'foreignKey' => 'regency_id'
        ]);
        $this->belongsTo('Hierarchies', [
            'foreignKey' => 'hierarchy_id'
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id'
        ]);
        $this->belongsTo('Weather', [
            'foreignKey' => 'weather_id'
        ]);
        $this->belongsTo('DataTwitter', [
            'foreignKey' => 'raw_id'
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
            ->allowEmpty('info');

        $validator
            ->dateTime('t_time')
            ->allowEmpty('t_time');

        $validator
            ->allowEmpty('respondent_name');

        $validator
            ->allowEmpty('place');

        $validator
            ->allowEmpty('condition');

        $validator
            ->allowEmpty('weather');

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

        $validator
            ->allowEmpty('category_name');

        $validator
            ->allowEmpty('weather_name');

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
        $rules->add($rules->existsIn(['respondent_id'], 'Respondents'));
        $rules->add($rules->existsIn(['chunk_id'], 'Chunks'));
        $rules->add($rules->existsIn(['spot_id'], 'Spots'));
        $rules->add($rules->existsIn(['place_id'], 'Places'));
        $rules->add($rules->existsIn(['regency_id'], 'Regencies'));
        $rules->add($rules->existsIn(['hierarchy_id'], 'Hierarchies'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['weather_id'], 'Weather'));

        return $rules;
    }
}

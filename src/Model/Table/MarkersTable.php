<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Markers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Categories
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Respondents
 * @property \Cake\ORM\Association\BelongsTo $Weather
 * @property \Cake\ORM\Association\BelongsTo $Raws
 *
 * @method \App\Model\Entity\Marker get($primaryKey, $options = [])
 * @method \App\Model\Entity\Marker newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Marker[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Marker|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Marker patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Marker[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Marker findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MarkersTable extends Table
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

        $this->setTable('markers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Respondents', [
            'foreignKey' => 'respondent_id'
        ]);
        $this->belongsTo('Weather', [
            'foreignKey' => 'weather_id'
        ]);
        $this->belongsTo('Raws', [
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
            ->allowEmpty('id', 'create');

        $validator
            ->decimal('lat')
            ->allowEmpty('lat');

        $validator
            ->decimal('lng')
            ->allowEmpty('lng');

        $validator
            ->allowEmpty('info');

        $validator
            ->boolean('pinned')
            ->allowEmpty('pinned');

        $validator
            ->boolean('cleared')
            ->allowEmpty('cleared');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->boolean('exported')
            ->allowEmpty('exported');

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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['respondent_id'], 'Respondents'));
        $rules->add($rules->existsIn(['weather_id'], 'Weather'));
        $rules->add($rules->existsIn(['raw_id'], 'Raws'));

        return $rules;
    }
}

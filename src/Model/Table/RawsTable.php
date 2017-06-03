<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Raws Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Respondents
 * @property \Cake\ORM\Association\HasMany $Claps
 * @property \Cake\ORM\Association\HasMany $Denominations
 * @property \Cake\ORM\Association\HasMany $Elements
 * @property \Cake\ORM\Association\HasMany $Fails
 * @property \Cake\ORM\Association\HasMany $Kinds
 * @property \Cake\ORM\Association\HasMany $Locations
 * @property \Cake\ORM\Association\HasMany $Markers
 * @property \Cake\ORM\Association\HasMany $Reviews
 *
 * @method \App\Model\Entity\Raw get($primaryKey, $options = [])
 * @method \App\Model\Entity\Raw newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Raw[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Raw|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Raw patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Raw[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Raw findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RawsTable extends Table
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

        $this->setTable('raws');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Respondents', [
            'foreignKey' => 'respondent_id'
        ]);
        $this->hasMany('Claps', [
            'foreignKey' => 'raw_id'
        ]);
        $this->hasMany('Denominations', [
            'foreignKey' => 'raw_id'
        ]);
        $this->hasMany('Elements', [
            'foreignKey' => 'raw_id'
        ]);
        $this->hasMany('Fails', [
            'foreignKey' => 'raw_id'
        ]);
        $this->hasMany('Kinds', [
            'foreignKey' => 'raw_id'
        ]);
        $this->hasMany('Locations', [
            'foreignKey' => 'raw_id'
        ]);
        $this->hasMany('Markers', [
            'foreignKey' => 'raw_id'
        ]);
        $this->hasMany('Reviews', [
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
            ->dateTime('t_time')
            ->allowEmpty('t_time');

        $validator
            ->allowEmpty('info');

        $validator
            ->allowEmpty('url');

        $validator
            ->allowEmpty('media');

        $validator
            ->integer('width')
            ->allowEmpty('width');

        $validator
            ->integer('height')
            ->allowEmpty('height');

        $validator
            ->boolean('processed')
            ->allowEmpty('processed');

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
        $rules->add($rules->existsIn(['respondent_id'], 'Respondents'));

        return $rules;
    }
}

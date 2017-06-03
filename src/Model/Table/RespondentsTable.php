<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Respondents Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Regions
 * @property \Cake\ORM\Association\HasMany $Markers
 * @property \Cake\ORM\Association\HasMany $Raws
 *
 * @method \App\Model\Entity\Respondent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Respondent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Respondent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Respondent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Respondent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Respondent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Respondent findOrCreate($search, callable $callback = null, $options = [])
 */
class RespondentsTable extends Table
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

        $this->setTable('respondents');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Regions', [
            'foreignKey' => 'region_id'
        ]);
        $this->hasMany('Markers', [
            'foreignKey' => 'respondent_id'
        ]);
        $this->hasMany('Raws', [
            'foreignKey' => 'respondent_id'
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('t_user_screen_name');

        $validator
            ->boolean('official')
            ->allowEmpty('official');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->boolean('tmc')
            ->allowEmpty('tmc');

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
        $rules->add($rules->existsIn(['region_id'], 'Regions'));

        return $rules;
    }
}

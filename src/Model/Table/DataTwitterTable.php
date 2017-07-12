<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DataTwitter Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Raws
 * @property \Cake\ORM\Association\BelongsTo $Kinds
 * @property \Cake\ORM\Association\BelongsTo $AtClassifications
 * @property \Cake\ORM\Association\BelongsTo $Denominations
 * @property \Cake\ORM\Association\BelongsTo $MtClassifications
 * @property \Cake\ORM\Association\BelongsTo $Classifications
 * @property \Cake\ORM\Association\BelongsTo $Respondents
 * @property \Cake\ORM\Association\HasMany $DataChunk
 * @property \Cake\ORM\Association\HasMany $DataPiece
 * @property \Cake\ORM\Association\HasMany $DataSpot
 * @property \Cake\ORM\Association\HasMany $DataKind
 * @property \Cake\ORM\Association\HasMany $DataWord
 * @property \Cake\ORM\Association\HasMany $LabelKind
 * @property \Cake\ORM\Association\HasMany $LabelWord
 * @property \Cake\ORM\Association\HasMany $LabelChunk
 * @property \Cake\ORM\Association\HasMany $LabelSpot
 * @property \Cake\ORM\Association\HasMany $TrainKind
 * @property \Cake\ORM\Association\HasMany $TrainWord
 *
 * @method \App\Model\Entity\DataTwitter get($primaryKey, $options = [])
 * @method \App\Model\Entity\DataTwitter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DataTwitter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DataTwitter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DataTwitter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DataTwitter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DataTwitter findOrCreate($search, callable $callback = null, $options = [])
 */
class DataTwitterTable extends Table
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
        $this->setPrimaryKey('raw_id');

        $this->setTable('data_twitter');

        $this->belongsTo('Raws', [
            'foreignKey' => 'raw_id'
        ]);
        $this->belongsTo('Kinds', [
            'foreignKey' => 'kind_id'
        ]);
        $this->belongsTo('AtClassifications', [
            'foreignKey' => 'at_classification_id'
        ]);
        $this->belongsTo('Denominations', [
            'foreignKey' => 'denomination_id'
        ]);
        $this->belongsTo('MtClassifications', [
            'foreignKey' => 'mt_classification_id'
        ]);
        $this->belongsTo('Classifications', [
            'foreignKey' => 'classification_id'
        ]);
        $this->belongsTo('Respondents', [
            'foreignKey' => 'respondent_id'
        ]);
        $this->hasMany('DataChunk', [
            'foreignKey' => 'raw_id'
        ]);
        $this->hasMany('DataWord', [
            'foreignKey' => 'raw_id'
        ]);
        $this->hasMany('DataKind', [
            'foreignKey' => 'raw_id'
        ]);
        $this->hasMany('DataPiece', [
            'foreignKey' => 'raw_id'
        ]);
        $this->hasMany('DataSpot', [
            'foreignKey' => 'raw_id'
        ]);
        $this->hasMany('LabelKind', [
            'foreignKey' => 'raw_id'
        ]);
        $this->hasMany('LabelWord', [
            'foreignKey' => 'raw_id'
        ]);
        $this->hasMany('LabelChunk', [
            'foreignKey' => 'raw_id'
        ]);
        $this->hasMany('LabelSpot', [
            'foreignKey' => 'raw_id'
        ]);
        $this->hasMany('TrainKind', [
            'foreignKey' => 'raw_id'
        ]);
        $this->hasMany('TrainWord', [
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
            ->allowEmpty('classification_name');

        $validator
            ->allowEmpty('respondent_name');

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
        $rules->add($rules->existsIn(['kind_id'], 'Kinds'));
        $rules->add($rules->existsIn(['at_classification_id'], 'AtClassifications'));
        $rules->add($rules->existsIn(['denomination_id'], 'Denominations'));
        $rules->add($rules->existsIn(['mt_classification_id'], 'MtClassifications'));
        $rules->add($rules->existsIn(['classification_id'], 'Classifications'));
        $rules->add($rules->existsIn(['respondent_id'], 'Respondents'));

        return $rules;
    }
}

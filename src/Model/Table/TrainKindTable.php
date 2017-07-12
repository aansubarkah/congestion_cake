<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TrainKind Model
 *
 * @property \App\Model\Table\RawsTable|\Cake\ORM\Association\BelongsTo $Raws
 * @property \App\Model\Table\RawsTable|\Cake\ORM\Association\BelongsTo $DataTwitter
 * @property \App\Model\Table\KindsTable|\Cake\ORM\Association\BelongsTo $Kinds
 * @property \App\Model\Table\AtClassificationsTable|\Cake\ORM\Association\BelongsTo $AtClassifications
 * @property \App\Model\Table\DenominationsTable|\Cake\ORM\Association\BelongsTo $Denominations
 * @property \App\Model\Table\MtClassificationsTable|\Cake\ORM\Association\BelongsTo $MtClassifications
 * @property \App\Model\Table\ClassificationsTable|\Cake\ORM\Association\BelongsTo $Classifications
 * @property \App\Model\Table\RespondentsTable|\Cake\ORM\Association\BelongsTo $Respondents
 *
 * @method \App\Model\Entity\TrainKind get($primaryKey, $options = [])
 * @method \App\Model\Entity\TrainKind newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TrainKind[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TrainKind|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TrainKind patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TrainKind[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TrainKind findOrCreate($search, callable $callback = null, $options = [])
 */
class TrainKindTable extends Table
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

        $this->setTable('train_kind');

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
            ->boolean('trained')
            ->allowEmpty('trained');

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

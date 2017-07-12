<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TrainWord Model
 *
 * @property \App\Model\Table\RawsTable|\Cake\ORM\Association\BelongsTo $Raws
 * @property \App\Model\Table\RawsTable|\Cake\ORM\Association\BelongsTo $DataTwitter
 * @property \App\Model\Table\SyllablesTable|\Cake\ORM\Association\BelongsTo $Syllables
 * @property \App\Model\Table\TagsTable|\Cake\ORM\Association\BelongsTo $Tags
 *
 * @method \App\Model\Entity\TrainWord get($primaryKey, $options = [])
 * @method \App\Model\Entity\TrainWord newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TrainWord[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TrainWord|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TrainWord patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TrainWord[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TrainWord findOrCreate($search, callable $callback = null, $options = [])
 */
class TrainWordTable extends Table
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

        $this->setTable('train_word');

        $this->belongsTo('Raws', [
            'foreignKey' => 'raw_id'
        ]);
        $this->belongsTo('Syllables', [
            'foreignKey' => 'syllable_id'
        ]);
        $this->belongsTo('Tags', [
            'foreignKey' => 'tag_id'
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
            ->integer('sequence')
            ->allowEmpty('sequence');

        $validator
            ->allowEmpty('syllable_name');

        $validator
            ->boolean('trained')
            ->allowEmpty('trained');

        $validator
            ->allowEmpty('tag_name');

        $validator
            ->allowEmpty('tag_description');

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
        $rules->add($rules->existsIn(['syllable_id'], 'Syllables'));
        $rules->add($rules->existsIn(['tag_id'], 'Tags'));

        return $rules;
    }
}

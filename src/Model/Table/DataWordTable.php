<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DataWord Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Raws
 * @property \Cake\ORM\Association\BelongsTo $DataTwitter
 * @property \Cake\ORM\Association\BelongsTo $Kinds
 * @property \Cake\ORM\Association\BelongsTo $Classifications
 * @property \Cake\ORM\Association\BelongsTo $Words
 * @property \Cake\ORM\Association\BelongsTo $Tags
 *
 * @method \App\Model\Entity\DataWord get($primaryKey, $options = [])
 * @method \App\Model\Entity\DataWord newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DataWord[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DataWord|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DataWord patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DataWord[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DataWord findOrCreate($search, callable $callback = null, $options = [])
 */
class DataWordTable extends Table
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

        $this->setTable('data_word');

        $this->belongsTo('Raws', [
            'foreignKey' => 'raw_id'
        ]);
        $this->belongsTo('DataTwitter', [
            'foreignKey' => 'raw_id'
        ]);
        $this->belongsTo('Kinds', [
            'foreignKey' => 'kind_id'
        ]);
        $this->belongsTo('Classifications', [
            'foreignKey' => 'classification_id'
        ]);
        $this->belongsTo('Words', [
            'foreignKey' => 'word_id'
        ]);
        $this->belongsTo('Tags', [
            'foreignKey' => 'tag_id'
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
            ->integer('sequence')
            ->allowEmpty('sequence');

        $validator
            ->allowEmpty('word_name');

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
        $rules->add($rules->existsIn(['kind_id'], 'Kinds'));
        $rules->add($rules->existsIn(['classification_id'], 'Classifications'));
        $rules->add($rules->existsIn(['word_id'], 'Words'));
        $rules->add($rules->existsIn(['tag_id'], 'Tags'));

        return $rules;
    }
}

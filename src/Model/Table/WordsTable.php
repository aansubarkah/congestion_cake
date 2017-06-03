<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Words Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Ts
 * @property \Cake\ORM\Association\BelongsTo $Tags
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Syllables
 *
 * @method \App\Model\Entity\Word get($primaryKey, $options = [])
 * @method \App\Model\Entity\Word newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Word[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Word|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Word patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Word[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Word findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WordsTable extends Table
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

        $this->setTable('words');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ts', [
            'foreignKey' => 't_id'
        ]);
        $this->belongsTo('Tags', [
            'foreignKey' => 'tag_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Syllables', [
            'foreignKey' => 'word_id'
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
            ->integer('sequence')
            ->allowEmpty('sequence');

        $validator
            ->allowEmpty('word');

        $validator
            ->boolean('verified')
            ->allowEmpty('verified');

        $validator
            ->boolean('trained')
            ->allowEmpty('trained');

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
        $rules->add($rules->existsIn(['t_id'], 'Ts'));
        $rules->add($rules->existsIn(['tag_id'], 'Tags'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}

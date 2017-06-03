<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pieces Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Chunks
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Piece get($primaryKey, $options = [])
 * @method \App\Model\Entity\Piece newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Piece[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Piece|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Piece patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Piece[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Piece findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PiecesTable extends Table
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

        $this->setTable('pieces');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Chunks', [
            'foreignKey' => 'chunk_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
            ->allowEmpty('place');

        $validator
            ->allowEmpty('condition');

        $validator
            ->allowEmpty('weather');

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
        $rules->add($rules->existsIn(['chunk_id'], 'Chunks'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}

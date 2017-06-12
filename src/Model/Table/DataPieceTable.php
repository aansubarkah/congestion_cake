<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DataPiece Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Raws
 * @property \Cake\ORM\Association\BelongsTo $Respondents
 * @property \Cake\ORM\Association\BelongsTo $Pieces
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property Cake\ORM\Association\BelongsTo $DataTwitter
 *
 * @method \App\Model\Entity\DataPiece get($primaryKey, $options = [])
 * @method \App\Model\Entity\DataPiece newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DataPiece[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DataPiece|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DataPiece patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DataPiece[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DataPiece findOrCreate($search, callable $callback = null, $options = [])
 */
class DataPieceTable extends Table
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

        $this->setTable('data_piece');

        $this->belongsTo('Raws', [
            'foreignKey' => 'raw_id'
        ]);
        $this->belongsTo('Respondents', [
            'foreignKey' => 'respondent_id'
        ]);
        $this->belongsTo('Pieces', [
            'foreignKey' => 'piece_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
            ->allowEmpty('username');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['raw_id'], 'Raws'));
        $rules->add($rules->existsIn(['respondent_id'], 'Respondents'));
        $rules->add($rules->existsIn(['piece_id'], 'Pieces'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}

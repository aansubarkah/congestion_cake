<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Groups
 * @property \Cake\ORM\Association\BelongsTo $Regions
 * @property \Cake\ORM\Association\BelongsTo $TUsers
 * @property \Cake\ORM\Association\HasMany $Breeds
 * @property \Cake\ORM\Association\HasMany $Denominations
 * @property \Cake\ORM\Association\HasMany $Elements
 * @property \Cake\ORM\Association\HasMany $Locations
 * @property \Cake\ORM\Association\HasMany $Logs
 * @property \Cake\ORM\Association\HasMany $Markers
 * @property \Cake\ORM\Association\HasMany $Pieces
 * @property \Cake\ORM\Association\HasMany $Reviews
 * @property \Cake\ORM\Association\HasMany $Spaces
 * @property \Cake\ORM\Association\HasMany $Syllables
 * @property \Cake\ORM\Association\HasMany $Words
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id'
        ]);
        $this->belongsTo('Regions', [
            'foreignKey' => 'region_id'
        ]);
        $this->belongsTo('TUsers', [
            'foreignKey' => 't_user_id'
        ]);
        $this->hasMany('Breeds', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Denominations', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Elements', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Locations', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Logs', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Markers', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Pieces', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Reviews', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Spaces', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Syllables', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Words', [
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
            ->allowEmpty('username');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->allowEmpty('password');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['group_id'], 'Groups'));
        $rules->add($rules->existsIn(['region_id'], 'Regions'));
        $rules->add($rules->existsIn(['t_user_id'], 'TUsers'));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Regions Model
 *
 * @property \Cake\ORM\Association\HasMany $Locations
 * @property \Cake\ORM\Association\HasMany $Respondents
 * @property \Cake\ORM\Association\HasMany $Users
 * @property \Cake\ORM\Association\BelongsToMany $Regencies
 *
 * @method \App\Model\Entity\Region get($primaryKey, $options = [])
 * @method \App\Model\Entity\Region newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Region[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Region|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Region patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Region[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Region findOrCreate($search, callable $callback = null, $options = [])
 */
class RegionsTable extends Table
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

        $this->setTable('regions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Locations', [
            'foreignKey' => 'region_id'
        ]);
        $this->hasMany('Respondents', [
            'foreignKey' => 'region_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'region_id'
        ]);
        $this->belongsToMany('Regencies', [
            'foreignKey' => 'region_id',
            'targetForeignKey' => 'regency_id',
            'joinTable' => 'regencies_regions'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->decimal('lat')
            ->allowEmpty('lat');

        $validator
            ->decimal('lng')
            ->allowEmpty('lng');

        $validator
            ->allowEmpty('name');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->allowEmpty('description');

        return $validator;
    }
}

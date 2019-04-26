<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Peran Model
 *
 * @method \App\Model\Entity\Peran get($primaryKey, $options = [])
 * @method \App\Model\Entity\Peran newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Peran[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Peran|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Peran|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Peran patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Peran[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Peran findOrCreate($search, callable $callback = null, $options = [])
 */
class PeranTable extends Table
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

        $this->setTable('peran');
        $this->setDisplayField('nama_peran');
        $this->setPrimaryKey('key_peran');

        $this->hasMany('PenggunaAuth', [
            'foreignKey' => 'key_pengguna',
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
            ->integer('key_peran')
            ->allowEmpty('key_peran', 'create');

        $validator
            ->scalar('nama_peran')
            ->maxLength('nama_peran', 255)
            ->requirePresence('nama_peran', 'create')
            ->notEmpty('nama_peran');

        return $validator;
    }
}

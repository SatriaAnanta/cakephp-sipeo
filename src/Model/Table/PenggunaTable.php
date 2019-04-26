<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pengguna Model
 *
 * @method \App\Model\Entity\Pengguna get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pengguna newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pengguna[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pengguna|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pengguna|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pengguna patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pengguna[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pengguna findOrCreate($search, callable $callback = null, $options = [])
 */
class PenggunaTable extends Table
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

        $this->setTable('pengguna');
        $this->setDisplayField('key_data_pengguna');
        $this->setPrimaryKey('key_data_pengguna');

        $this->belongsTo('PenggunaAuth', [
            'foreignKey' => 'key_pengguna',
        ]);

        $this->hasMany('Pengerjaan', [
            'foreignKey' => 'key_pengerjaan',
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
            ->integer('key_data_pengguna')
            ->allowEmpty('key_data_pengguna', 'create');

        $validator
            ->scalar('nama')
            ->maxLength('nama', 255)
            ->requirePresence('nama', 'create')
            ->notEmpty('nama');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->integer('key_pengguna')
            ->requirePresence('key_pengguna', 'create')
            ->notEmpty('key_pengguna');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['key_pengguna']));
        return $rules;
    }
}

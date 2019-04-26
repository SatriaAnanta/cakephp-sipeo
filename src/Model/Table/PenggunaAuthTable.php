<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

/**
 * PenggunaAuth Model
 *
 * @method \App\Model\Entity\PenggunaAuth get($primaryKey, $options = [])
 * @method \App\Model\Entity\PenggunaAuth newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PenggunaAuth[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PenggunaAuth|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PenggunaAuth|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PenggunaAuth patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PenggunaAuth[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PenggunaAuth findOrCreate($search, callable $callback = null, $options = [])
 */
class PenggunaAuthTable extends Table
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

        $this->setTable('pengguna_auth');
        $this->setDisplayField('key_pengguna');
        $this->setPrimaryKey('key_pengguna');

        $this->belongsTo('Peran', [
            'foreignKey' => 'key_peran',
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
            ->integer('key_pengguna')
            ->allowEmpty('key_pengguna', 'create');

        $validator
            ->integer('key_peran')
            ->requirePresence('key_peran', 'create')
            ->notEmpty('key_peran');

        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->requirePresence('username', 'create')

            ->add('username', 'valid-username', ['rule' => 'alphaNumeric'])


            ->notEmpty('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            -> sameAs('konfirmasi_password','password','Password dan Konfirmasi Password Tidak Sama');

        $validator
            ->add('current_password','custom',[
                'rule'=>  function($value, $context){
                    $PenggunaAuth = $this->get($context['data']['key_pengguna']);
                    if ($PenggunaAuth) {
                        if ((new DefaultPasswordHasher)->check($value, $PenggunaAuth->password)) {
                            return true;
                        }
                    }
                    return false;
                },
                'message'=>'Password Lama Salah',
            ])
            ->notEmpty('current_password');

        $validator
            ->add('password', [
                'length' => [
                    'rule' => ['minLength', 6],
                    'message' => 'The password have to be at least 6 characters!',
                ]
            ])
            ->add('password',[
                'match'=>[
                    'rule'=> ['compareWith','confirm_password'],
                    'message'=>'Password Baru Tidak Sama',
                ]
            ])
            ->notEmpty('password');

        
        $validator
        ->add('username', [
            'length' => [
                'rule' => ['lengthbetween', 5, 15],
                'message' => 'The username have to be at least 5 characters!',
            ]
        ]);
        $validator
            ->add('confirm_password', [
                'length' => [
                    'rule' => ['minLength', 6],
                    'message' => 'The password have to be at least 6 characters!',
                ]
            ])
            ->add('confirm_password',[
                'match'=>[
                    'rule'=> ['compareWith','password'],
                    'message'=>'Password Baru Tidak Sama',
                ]
            ])
            ->notEmpty('confirm_password');


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

        return $rules;
    }
}

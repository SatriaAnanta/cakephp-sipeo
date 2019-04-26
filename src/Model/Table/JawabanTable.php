<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Jawaban Model
 *
 * @method \App\Model\Entity\Jawaban get($primaryKey, $options = [])
 * @method \App\Model\Entity\Jawaban newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Jawaban[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Jawaban|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Jawaban|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Jawaban patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Jawaban[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Jawaban findOrCreate($search, callable $callback = null, $options = [])
 */
class JawabanTable extends Table
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

        $this->setTable('jawaban');
        $this->setDisplayField('key_jawaban');
        $this->setPrimaryKey('key_jawaban');

        $this->belongsTo('Pertanyaan', [
            'foreignKey' => 'key_pertanyaan',
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
            ->integer('key_jawaban')
            ->allowEmpty('key_jawaban', 'create');

        $validator
            ->integer('key_pertanyaan')
            ->allowEmpty('key_pertanyaan');

        $validator
            ->scalar('jawaban')
            ->maxLength('jawaban', 255)
            ->requirePresence('jawaban', 'create')
            ->notEmpty('jawaban');

        $validator
            ->numeric('bobot')
            ->requirePresence('bobot', 'create')
            ->notEmpty('bobot');

        return $validator;
    }
}

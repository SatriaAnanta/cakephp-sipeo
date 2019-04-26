<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pertanyaan Model
 *
 * @method \App\Model\Entity\Pertanyaan get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pertanyaan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pertanyaan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pertanyaan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pertanyaan|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pertanyaan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pertanyaan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pertanyaan findOrCreate($search, callable $callback = null, $options = [])
 */
class PertanyaanTable extends Table
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

        $this->setTable('pertanyaan');
        $this->setDisplayField('pertanyaan');
        $this->setPrimaryKey('key_pertanyaan');

        $this->belongsTo('Materi', [
            'foreignKey' => 'key_materi',
        ]);

        $this->hasMany('Jawaban', [
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
            ->integer('key_pertanyaan')
            ->allowEmpty('key_pertanyaan', 'create');

        $validator
            ->integer('key_materi')
            ->allowEmpty('key_materi');

        $validator
            ->scalar('pertanyaan')
            ->maxLength('pertanyaan', 255)
            ->requirePresence('pertanyaan', 'create')
            ->notEmpty('pertanyaan');

        return $validator;
    }
}

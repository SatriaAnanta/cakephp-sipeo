<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Materi Model
 *
 * @method \App\Model\Entity\Materi get($primaryKey, $options = [])
 * @method \App\Model\Entity\Materi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Materi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Materi|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Materi|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Materi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Materi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Materi findOrCreate($search, callable $callback = null, $options = [])
 */
class MateriTable extends Table
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

        $this->setTable('materi');
        $this->setDisplayField('materi');
        $this->setPrimaryKey('key_materi');

        $this->belongsTo('Topik', [
            'foreignKey' => 'key_topik',
        ]);

        $this->hasMany('Pertanyaan', [
            'foreignKey' => 'key_materi',
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
            ->integer('key_materi')
            ->allowEmpty('key_materi', 'create');

        $validator
            ->integer('key_topik')
            ->allowEmpty('key_topik');

        $validator
            ->scalar('materi')
            ->maxLength('materi', 255)
            ->requirePresence('materi', 'create')
            ->notEmpty('materi');

        $validator
            ->scalar('isi_materi')
            ->maxLength('isi_materi', 255)
            ->requirePresence('isi_materi', 'create')
            ->notEmpty('isi_materi');

        return $validator;
    }
}

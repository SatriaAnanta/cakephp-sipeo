<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pengerjaan Model
 *
 * @method \App\Model\Entity\Pengerjaan get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pengerjaan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pengerjaan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pengerjaan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pengerjaan|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pengerjaan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pengerjaan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pengerjaan findOrCreate($search, callable $callback = null, $options = [])
 */
class PengerjaanTable extends Table
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

        $this->setTable('pengerjaan');
        $this->setDisplayField('key_pengerjaan');
        $this->setPrimaryKey('key_pengerjaan');

        $this->belongsTo('Pertanyaan', [
            'foreignKey' => 'key_pertanyaan',
        ]);

        $this->belongsTo('pengguna', [
            'foreignKey' => 'key_data_pengguna',
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
            ->integer('key_pengerjaan')
            ->allowEmpty('key_pengerjaan', 'create');

        $validator
            ->integer('key_pertanyaan')
            ->allowEmpty('key_pertanyaan');

        $validator
            ->scalar('jawaban')
            ->maxLength('jawaban', 255)
            ->allowEmpty('jawaban');

        $validator
            ->numeric('nilai')
            ->allowEmpty('nilai');

        $validator
            ->numeric('percobaan')
            ->allowEmpty('percobaan');

        $validator
            ->integer('key_data_pengguna')
            ->allowEmpty('key_data_pengguna');

        return $validator;
    }
}

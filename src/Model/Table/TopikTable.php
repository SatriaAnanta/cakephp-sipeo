<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Topik Model
 *
 * @method \App\Model\Entity\Topik get($primaryKey, $options = [])
 * @method \App\Model\Entity\Topik newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Topik[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Topik|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Topik|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Topik patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Topik[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Topik findOrCreate($search, callable $callback = null, $options = [])
 */
class TopikTable extends Table
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

        $this->setTable('topik');
        $this->setDisplayField('topik');
        $this->setPrimaryKey('key_topik');

        $this->hasMany('Materi', [
            'foreignKey' => 'key_topik',
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
            ->integer('key_topik')
            ->allowEmpty('key_topik', 'create');

        $validator
            ->scalar('topik')
            ->maxLength('topik', 255)
            ->allowEmpty('topik');

        $validator
            ->scalar('is_delete')
            ->allowEmpty('is_delete');

        return $validator;
    }
}

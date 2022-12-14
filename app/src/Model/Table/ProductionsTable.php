<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Productions Model
 *
 * @method \App\Model\Entity\Production get($primaryKey, $options = [])
 * @method \App\Model\Entity\Production newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Production[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Production|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Production saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Production patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Production[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Production findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductionsTable extends Table
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

        $this->setTable('productions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('Stocks', [
            'foreignKey' => 'productions_id',
            'joinType' => 'INNER',
            'dependent' => true
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'productions_id',
            'joinType' => 'INNER',
            'dependent' => true
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 30, '?????????????????????????????????')
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('price')
            ->notEmptyString('price')
            ->add(
                'price',
                'comparison',
                [
                    'rule' => ['comparison', '>', 0],
                    'message' => '?????????1????????????????????????????????????'
                ]
            );

        return $validator;
    }
}

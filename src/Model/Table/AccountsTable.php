<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Accounts Model
 *
 * @method \App\Model\Entity\Account newEmptyEntity()
 * @method \App\Model\Entity\Account newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Account[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Account get($primaryKey, $options = [])
 * @method \App\Model\Entity\Account findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Account patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Account[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Account|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Account saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Account[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Account[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Account[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Account[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AccountsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('accounts');
        $this->setDisplayField('name');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->requirePresence('id', 'create')
            ->notEmptyString('id');

        $validator
            ->integer('role_code')
            ->notEmptyString('role_code');

        $validator
            ->scalar('login_code')
            ->maxLength('login_code', 255)
            ->requirePresence('login_code', 'create')
            ->notEmptyString('login_code');

        $validator
            ->scalar('login_password')
            ->maxLength('login_password', 255)
            ->requirePresence('login_password', 'create')
            ->notEmptyString('login_password');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('one_time_password')
            ->maxLength('one_time_password', 6)
            ->requirePresence('one_time_password', 'create')
            ->notEmptyString('one_time_password');

        $validator
            ->dateTime('expired_at')
            ->requirePresence('expired_at', 'create')
            ->notEmptyDateTime('expired_at');

        $validator
            ->dateTime('last_login_at')
            ->requirePresence('last_login_at', 'create')
            ->notEmptyDateTime('last_login_at');

        $validator
            ->integer('attempt_count')
            ->notEmptyString('attempt_count');

        $validator
            ->boolean('is_changed')
            ->notEmptyString('is_changed');

        return $validator;
    }
}

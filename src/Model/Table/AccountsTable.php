<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Constant\ColumnConstant;
use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
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
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
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

        $this->addBehavior('Timestamp');
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
            ->integer(
                'role_code',
                __('VALIDATION_0003', ColumnConstant::ACCOUNT_COLUMN_LIST['role_code']),
            )
            ->notEmptyString(
                'role_code',
                __('VALIDATION_0002', ColumnConstant::ACCOUNT_COLUMN_LIST['role_code']),
            );

        $validator
            ->scalar('login_code')
            ->maxLength(
                'login_code',
                255,
                __('VALIDATION_0004', ColumnConstant::ACCOUNT_COLUMN_LIST['login_code'], 255),
            )
            ->requirePresence(
                'login_code',
                'create',
                __('VALIDATION_0001',ColumnConstant::ACCOUNT_COLUMN_LIST['login_code']),
            )
            ->notEmptyString(
                'login_code',
                __('VALIDATION_0002', ColumnConstant::ACCOUNT_COLUMN_LIST['login_code']),
            );

        $validator
            ->scalar('login_password')
            ->maxLength(
                'login_password',
                255,
                __('VALIDATION_0004', ColumnConstant::ACCOUNT_COLUMN_LIST['login_password'], 255),
            )
            ->requirePresence(
                'login_password',
                'create',
                __('VALIDATION_0001',ColumnConstant::ACCOUNT_COLUMN_LIST['login_password']),
            )
            ->notEmptyString(
                'login_password',
                __('VALIDATION_0002', ColumnConstant::ACCOUNT_COLUMN_LIST['login_password']),
            );

        $validator
            ->scalar('name')
            ->maxLength(
                'name',
                255,
                __('VALIDATION_0004', ColumnConstant::ACCOUNT_COLUMN_LIST['name'], 255),
            )
            ->requirePresence(
                'name',
                'create',
                __('VALIDATION_0001',ColumnConstant::ACCOUNT_COLUMN_LIST['name']),
            )
            ->notEmptyString(
                'name',
                __('VALIDATION_0002', ColumnConstant::ACCOUNT_COLUMN_LIST['name']),
            );

        $validator
            ->scalar('one_time_password')
            ->maxLength(
                'one_time_password',
                6,
                __('VALIDATION_0004', ColumnConstant::ACCOUNT_COLUMN_LIST['one_time_password'], 6),
            )
            ->requirePresence(
                'one_time_password',
                'create',
                __('VALIDATION_0001',ColumnConstant::ACCOUNT_COLUMN_LIST['one_time_password']),
            )
            ->notEmptyString(
                'one_time_password',
                __('VALIDATION_0002', ColumnConstant::ACCOUNT_COLUMN_LIST['one_time_password']),
            );

        $validator
            ->dateTime(
                'expired_at',
                ['ymd'],
                __('VALIDATION_0005', ColumnConstant::ACCOUNT_COLUMN_LIST['expired_at']),
            )
            ->requirePresence(
                'expired_at',
                'create',
                __('VALIDATION_0001',ColumnConstant::ACCOUNT_COLUMN_LIST['expired_at']),
            )
            ->notEmptyString(
                'expired_at',
                __('VALIDATION_0002', ColumnConstant::ACCOUNT_COLUMN_LIST['expired_at']),
            );

        $validator
            ->dateTime(
                'last_login_at',
                ['ymd'],
                __('VALIDATION_0005', ColumnConstant::ACCOUNT_COLUMN_LIST['last_login_at']),
            )
            ->requirePresence(
                'last_login_at',
                'create',
                __('VALIDATION_0001',ColumnConstant::ACCOUNT_COLUMN_LIST['last_login_at']),
            )
            ->notEmptyString(
                'last_login_at',
                __('VALIDATION_0002', ColumnConstant::ACCOUNT_COLUMN_LIST['last_login_at']),
            );

        $validator
            ->integer(
                'attempt_count',
                __('VALIDATION_0003', ColumnConstant::ACCOUNT_COLUMN_LIST['attempt_count']),
            )
            ->notEmptyString(
                'attempt_count',
                __('VALIDATION_0002', ColumnConstant::ACCOUNT_COLUMN_LIST['attempt_count']),
            );

        $validator
            ->boolean(
                'is_changed',
                __('VALIDATION_0006', ColumnConstant::ACCOUNT_COLUMN_LIST['is_changed']),
            )
            ->notEmptyString(
                'is_changed',
                __('VALIDATION_0002', ColumnConstant::ACCOUNT_COLUMN_LIST['is_changed']),
            );

        $validator
            ->boolean(
                'is_deleted',
                __('VALIDATION_0006', ColumnConstant::ACCOUNT_COLUMN_LIST['is_deleted']),
            )
            ->notEmptyString(
                'is_deleted',
                __('VALIDATION_0002', ColumnConstant::ACCOUNT_COLUMN_LIST['is_deleted']),
            );

        $validator
            ->allowEmptyString('created_by');

        $validator
            ->allowEmptyString('modified_by');

        return $validator;
    }

    /**
     * 役割コード指定カスタムファインダー
     *
     * @param Query $query ベースクエリ
     * @param array $options パラメータ
     * @return Query 生成したクエリ
     */
    public function findByRoleCode(Query $query, array $options = []): Query
    {
        return $query->where(function (QueryExpression $exp) use ($options): QueryExpression {
            return $exp->eq('Accounts.role_code', $options['role_code']);
        });
    }

    /**
     * アカウント名指定カスタムファインダー
     *
     * @param Query $query ベースクエリ
     * @param array $options パラメータ
     * @return Query 生成したクエリ
     */
    public function findByName(Query $query, array $options = []): Query
    {
        return $query->where(function (QueryExpression $exp) use ($options): QueryExpression {
            return $exp->eq('Accounts.name', $options['name']);
        });
    }
}

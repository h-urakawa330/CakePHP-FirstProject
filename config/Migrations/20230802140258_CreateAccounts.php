<?php
declare(strict_types=1);

use App\Constant\CodeConstant;
use App\Constant\RoleConstant;
use Migrations\AbstractMigration;

class CreateAccounts extends AbstractMigration
{
    public $autoId = false;

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('accounts');

        $table->addColumn('id', 'biginteger', [
            'autoIncrement' => true,
            'signed' => false,
            'null' => false,
            'comment' => 'プライマリID',
        ]);

        $table->addColumn('role_code', 'integer', [
            'null' => false,
            'default' => RoleConstant::ROLE_CODE_GENERAL,
            'comment' => '役割コード',
        ]);

        $table->addColumn('login_code', 'string', [
            'limit' => 255,
            'null' => false,
            'comment' => 'ログインコード',
        ]);

        $table->addColumn('login_password', 'string', [
            'limit' => 255,
            'null' => false,
            'comment' => 'ログインパスワード',
        ]);

        $table->addColumn('name', 'string', [
            'limit' => 255,
            'null' => false,
            'comment' => 'アカウント名',
        ]);

        $table->addColumn('one_time_password', 'string', [
            'limit' => 6,
            'null' => false,
            'comment' => 'ワンタイムパスワード',
        ]);

        $table->addColumn('expired_at', 'datetime', [
            'null' => false,
            'comment' => 'ワンタイムパスワード有効期限',
        ]);

        $table->addColumn('last_login_at', 'datetime', [
            'null' => false,
            'comment' => '最終ログイン日時',
        ]);

        $table->addColumn('attempt_count', 'integer', [
            'limit' => 10,
            'null' => false,
            'default' => CodeConstant::NOT_CHANGED,
            'comment' => 'ログイン試行回数',
        ]);

        $table->addColumn('is_changed', 'boolean', [
            'null' => false,
            'default' => CodeConstant::NOT_CHANGED,
            'comment' => '初回パスワード変更フラグ',
        ]);

        $table->addColumn('is_deleted', 'boolean', [
            'null' => false,
            'default' => CodeConstant::NOT_DELETED,
            'comment' => '削除フラグ',
        ]);

        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => true,
            'comment' => 'データ作成日時',
        ]);

        $table->addColumn('created_by', 'biginteger', [
            'default' => null,
            'null' => true,
            'comment' => 'データ作成者',
        ]);

        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => true,
            'comment' => 'データ更新日時',
        ]);

        $table->addColumn('modified_by', 'biginteger', [
            'default' => null,
            'null' => true,
            'comment' => 'データ更新者',
        ]);

        $table->addIndex(['id']);

        $table->create();
    }
}

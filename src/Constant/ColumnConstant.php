<?php
declare(strict_types=1);

namespace App\Constant;

/**
 * カラム定数管理
 */
class ColumnConstant
{
    /**
     * カラムリスト: アカウントテーブル
     *
     * @var int
     */
    public const ACCOUNT_COLUMN_LIST = [
        'role_code' => '役割コード',
        'login_code' => 'ログインコード',
        'login_password' => 'ログインパスワード',
        'name' => 'アカウント名',
        'one_time_password' => 'ワンタイムパスワード',
        'expired_at' => 'ワンタイムパスワード有効日時',
        'last_login_at' => '最終ログイン日時',
        'attempt_count' => 'ログイン試行回数',
        'is_changed' => '初回パスワード変更フラグ',
        'is_deleted' => '削除フラグ',
    ];
}

<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Logic\AppLogic;
use Cake\ORM\Table;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountsTable Test Case
 */
class AccountsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var Table
     */
    private Table $Accounts;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Accounts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Table設定
        $this->Accounts = (new AppLogic())->getTable('Accounts');
    }

    /**
     * validationDefault test: required
     *
     * @return void
     */
    public function testValidationDefaultRequired(): void
    {
        // [テスト実行]
        $params = [];
        $result = $this->Accounts->newEntity($params);

        // [事後条件]
        // 1) 戻り値と期待値が一致する
        // dd($result->getErrors());
        $expectedValue = [
            'login_code' => [
                '_required' => 'ログインコードは必須です。'
            ],
            'login_password' => [
                '_required' => 'ログインパスワードは必須です。'
            ],
            'name' => [
                '_required' => 'アカウント名は必須です。'
            ],
            'one_time_password' => [
                '_required' => 'ワンタイムパスワードは必須です。'
            ],
            'expired_at' => [
                '_required' => 'ワンタイムパスワード有効日時は必須です。'
            ],
            'last_login_at' => [
                '_required' => '最終ログイン日時は必須です。'
            ],
        ];
        $this->assertSame($expectedValue, $result->getErrors());
    }

    /**
     * validationDefault test: empty
     *
     * @return void
     */
    public function testValidationDefaultEmpty(): void
    {
        // [テスト実行]
        $params = [
            'role_code' => '',
            'login_code' => '',
            'login_password' => '',
            'name' => '',
            'one_time_password' => '',
            'expired_at' => '',
            'last_login_at' => '',
            'attempt_count' => '',
            'is_changed' => '',
            'is_deleted' => '',
        ];
        $result = $this->Accounts->newEntity($params);

        // [事後条件]
        // 1) 戻り値と期待値が一致する
        // dd($result->getErrors());
        $expectedValue = [
            'role_code' => [
                '_empty' => '役割コードが未設定です。'
            ],
            'login_code' => [
                '_empty' => 'ログインコードが未設定です。'
            ],
            'login_password' => [
                '_empty' => 'ログインパスワードが未設定です。'
            ],
            'name' => [
                '_empty' => 'アカウント名が未設定です。'
            ],
            'one_time_password' => [
                '_empty' => 'ワンタイムパスワードが未設定です。'
            ],
            'expired_at' => [
                '_empty' => 'ワンタイムパスワード有効日時が未設定です。'
            ],
            'last_login_at' => [
                '_empty' => '最終ログイン日時が未設定です。'
            ],
            'attempt_count' => [
                '_empty' => 'ログイン試行回数が未設定です。'
            ],
            'is_changed' => [
                '_empty' => '初回パスワード変更フラグが未設定です。'
            ],
            'is_deleted' => [
                '_empty' => '削除フラグが未設定です。'
            ],
        ];
        $this->assertSame($expectedValue, $result->getErrors());
    }

    /**
     * validationDefault test: integer
     *
     * @return void
     */
    public function testValidationDefaultInteger(): void
    {
        // [テスト実行]
        $params = [
            'role_code' => 'test',
            'login_code' => 'test',
            'login_password' => 'test',
            'name' => 'test',
            'one_time_password' => 'test',
            'expired_at' => '2000-04-01 12:00:00',
            'last_login_at' => '2000-04-01 12:00:00',
            'attempt_count' => 'test',
        ];
        $result = $this->Accounts->newEntity($params);

        // [事後条件]
        // 1) 戻り値と期待値が一致する
        // dd($result->getErrors());
        $expectedValue = [
            'role_code' => [
                'integer' => '役割コードの形式が不正です。数値型で入力してください。'
            ],
            'attempt_count' => [
                'integer' => 'ログイン試行回数の形式が不正です。数値型で入力してください。'
            ],
        ];
        $this->assertSame($expectedValue, $result->getErrors());
    }

    /**
     * validationDefault test: maxlength
     *
     * @return void
     */
    public function testValidationDefaultMaxlength(): void
    {
        // [テスト実行]
        $params = [
            'role_code' => 1,
            'login_code' => str_repeat('a', 256),
            'login_password' => str_repeat('a', 256),
            'name' => str_repeat('a', 256),
            'one_time_password' => str_repeat('a', 256),
            'expired_at' => '2000-04-01 12:00:00',
            'last_login_at' => '2000-04-01 12:00:00',
        ];
        $result = $this->Accounts->newEntity($params);

        // [事後条件]
        // 1) 戻り値と期待値が一致する
        // dd($result->getErrors());
        $expectedValue = [
            'login_code' => [
                'maxLength' => 'ログインコードは255文字以内で入力してください。'
            ],
            'login_password' => [
                'maxLength' => 'ログインパスワードは255文字以内で入力してください。'
            ],
            'name' => [
                'maxLength' => 'アカウント名は255文字以内で入力してください。'
            ],
            'one_time_password' => [
                'maxLength' => 'ワンタイムパスワードは6文字以内で入力してください。'
            ],
        ];
        $this->assertSame($expectedValue, $result->getErrors());
    }

    /**
 * validationDefault test: datetime
 *
 * @return void
 */
    public function testValidationDefaultDatetime(): void
    {
        // [テスト実行]
        $params = [
            'login_code' => 'test',
            'login_password' => 'test',
            'name' => 'test',
            'one_time_password' => 'test',
            'expired_at' => 'test',
            'last_login_at' => 'test',
        ];
        $result = $this->Accounts->newEntity($params);

        // [事後条件]
        // 1) 戻り値と期待値が一致する
        // dd($result->getErrors());
        $expectedValue = [
            'expired_at' => [
                'dateTime' => 'ワンタイムパスワード有効日時の形式が不正です。指定の形式(YYYY/MM/DD hh:mm:ss)で入力してください。'
            ],
            'last_login_at' => [
                'dateTime' => '最終ログイン日時の形式が不正です。指定の形式(YYYY/MM/DD hh:mm:ss)で入力してください。'
            ],
        ];
        $this->assertSame($expectedValue, $result->getErrors());
    }

    /**
     * validationDefault test: boolean
     *
     * @return void
     */
    public function testValidationDefaultBoolean(): void
    {
        // [テスト実行]
        $params = [
            'login_code' => 'test',
            'login_password' => 'test',
            'name' => 'test',
            'one_time_password' => 'test',
            'expired_at' => '2000-04-01 12:00:00',
            'last_login_at' => '2000-04-01 12:00:00',
            'is_changed' => 'test',
            'is_deleted' => 'test',
        ];
        $result = $this->Accounts->newEntity($params);

        // [事後条件]
        // 1) 戻り値と期待値が一致する
        // dd($result->getErrors());
        $expectedValue = [
            'is_changed' => [
                'boolean' => '初回パスワード変更フラグの形式が不正です。指定の形式(0 or 1)で入力してください。'
            ],
            'is_deleted' => [
                'boolean' => '削除フラグの形式が不正です。指定の形式(0 or 1)で入力してください。'
            ],
        ];
        $this->assertSame($expectedValue, $result->getErrors());
    }
}

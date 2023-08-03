<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AccountsFixture
 */
class AccountsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'role_code' => 1,
                'login_code' => 'Lorem ipsum dolor sit amet',
                'login_password' => 'Lorem ipsum dolor sit amet',
                'name' => 'Lorem ipsum dolor sit amet',
                'one_time_password' => 'Lore',
                'expired_at' => '2023-08-03 13:27:23',
                'last_login_at' => '2023-08-03 13:27:23',
                'attempt_count' => 1,
                'is_changed' => 1,
                'is_deleted' => 1,
                'created' => '2023-08-03 13:27:23',
                'created_by' => 1,
                'modified' => '2023-08-03 13:27:23',
                'modified_by' => 1,
            ],
        ];
        parent::init();
    }
}

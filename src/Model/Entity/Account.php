<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Account Entity
 *
 * @property int $id
 * @property int $role_code
 * @property string $login_code
 * @property string $login_password
 * @property string $name
 * @property string $one_time_password
 * @property \Cake\I18n\FrozenTime $expired_at
 * @property \Cake\I18n\FrozenTime $last_login_at
 * @property int $attempt_count
 * @property bool $is_changed
 * @property bool $is_deleted
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $modified_by
 */
class Account extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'id' => true,
        'role_code' => true,
        'login_code' => true,
        'login_password' => true,
        'name' => true,
        'one_time_password' => true,
        'expired_at' => true,
        'last_login_at' => true,
        'attempt_count' => true,
        'is_changed' => true,
        'is_deleted' => true,
        'created' => true,
        'created_by' => true,
        'modified' => true,
        'modified_by' => true,
    ];
}

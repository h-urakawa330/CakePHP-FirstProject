<?php
declare(strict_types=1);

namespace App\Constant;

/**
 * コード定数管理
 */
class CodeConstant
{
    /**
     * カウント: 0
     *
     * @var int
     */
    public const COUNT_ZERO = 0;

    /**
     *カウント: 1
     *
     * @var int
     */
    public const COUNT_ONE = 1;

    /**
     * 削除フラグ: 未削除
     *
     * @var int
     */
    public const NOT_DELETED = 0;

    /**
     * 削除フラグ: 削除済
     *
     * @var int
     */
    public const DELETED = 1;

    /**
     * 変更フラグ: 未変更
     *
     * @var int
     */
    public const NOT_CHANGED = 0;

    /**
     * 変更フラグ: 変更済
     *
     * @var int
     */
    public const CHANGED = 1;
}

<?php
declare(strict_types=1);

namespace App\Model\Logic;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

/***
 * 基底クラス
 */
class AppLogic
{
    /**
     * テーブルオブジェクト取得
     *
     * @param string $tableName テーブル名
     * @return Table
     */
    public function getTable(string $tableName): Table
    {
        return TableRegistry::getTableLocator()->get($tableName);
    }
}

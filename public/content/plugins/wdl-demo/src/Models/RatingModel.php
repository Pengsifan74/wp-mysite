<?php

namespace WDLDemo\Models;

use WDL\Models\CoreModel;

class RatingModel extends CoreModel
{

    protected $tableName = 'rating';

    public function getCreateTableSQL()
    {
        $tableName = $this->getTableName();

        $sql = '
            CREATE TABLE `' . $tableName . '` (
                `user_id` int(8) unsigned NOT NULL,
                `post_id` int(8) unsigned NOT NULL,
                `rating` tinyint(2) unsigned NOT NULL,
                `created_at` datetime NOT NULL,
                `updated_at` datetime NULL
          );
        ';
        return $sql;
    }

    public function getCreatePrimaryKeySQL()
    {
        $tableName = $this->getTableName();
        $primaryKeySQL = 'ALTER TABLE `' . $tableName . '` ADD PRIMARY KEY `user_id_post_id` (`user_id`, `post_id`)';
        return $primaryKeySQL;
    }
}


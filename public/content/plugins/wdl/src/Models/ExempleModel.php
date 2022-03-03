<?php
namespace WDL\Models;

class ParticipationModel extends CoreModel
{



    public function getTableName()
    {
        $tablePrefix = $this->wpdb->prefix;
        $tableName = $tablePrefix . 'participation';
        return $tableName;
    }

    public function createTable()
    {
        $tableName = $this->getTableName();

        $sql = '
            CREATE TABLE `' . $tableName . '` (
                `user_id` int(8) unsigned NOT NULL,
                `event_id` int(8) unsigned NOT NULL,
                `created_at` datetime NOT NULL,
                `updated_at` datetime NULL
          );
        ';

        // inclusion des fonctions nécessaire pour modifier la bdd
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        dbDelta($sql);

        $primaryKeySQL = 'ALTER TABLE `' . $tableName . '` ADD PRIMARY KEY `user_id_event_id` (`user_id`, `event_id`)';
        $this->wpdb->query($primaryKeySQL);

    }

    public function dropTable()
    {
        $tablePrefix = $this->wpdb->prefix;
        $tableName = $tablePrefix . 'participation';

        $sql = 'DROP TABLE `' . $tableName . '`';
        $this->wpdb->query($sql);
    }


    public function insert($userId, $eventId)
    {
        $data = [
            'user_id' => $userId,
            'event_id' => $eventId,
            'created_at' => date('Y-m-d H:i:s')
        ];

        return $this->wpdb->insert(
            $this->getTableName(),
            $data
        );
    }

    public function getEventsByUserId($userId)
    {
        $sql = "
            SELECT * FROM `" . $this->getTableName() . "`
            WHERE
                user_id = %d
        ";

        $preparedStatement = $this->wpdb->prepare(
            $sql,
            [
                $userId
            ]
        );
        $rows = $this->wpdb->get_results($preparedStatement);

        return $rows;
    }

    public function getUsersByEventId($eventId)
    {
        $sql = "
            SELECT * FROM `" . $this->getTableName() . "`
            WHERE
                event_id = %d
        ";

        $preparedStatement = $this->wpdb->prepare(
            $sql,
            [
                $eventId
            ]
        );
        $rows = $this->wpdb->get_results($preparedStatement);
        return $rows;
    }

    public function delete($userId, $eventId)
    {
        $conditions = [
            'user_id' => $userId,
            'event_id' => $eventId
        ];

        $this->wpdb->delete(
            $this->getTableName(),
            $conditions
        );
    }


    public function updateDateByUserIdAndEventId($userId, $eventId)
    {
        // équivalent du WHERE
        $conditions = [
            'user_id' => $userId,
            'event_id' => $eventId
        ];

        // champs à mettre à jour
        $data = [
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->wpdb->update(
            $this->getTableName(),
            $data,
            $conditions
        );
    }
}

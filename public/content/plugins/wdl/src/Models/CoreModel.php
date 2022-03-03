<?php
namespace WDL\Models;

abstract class CoreModel
{

    protected $wpdb;

    protected $tableName;

    abstract public function getCreateTableSQL();
    abstract public function getCreatePrimaryKeySQL();

    public function __construct()
    {
        // récupération de l'objet wpdb de wordpress
        // la variable $wpdb est globale ; c'est "historique"
        // DOC E10 wpdb https://developer.wordpress.org/reference/classes/wpdb/
        global $wpdb;
        $this->wpdb = $wpdb;

        // la propriété $tableName doit avoir obligatoirement un nom ; sinon "plantage"

        if(!$this->tableName) {
            throw new \Exception('Property $tableName is mendatory. You have to define this property');
        }
    }


    public function getBy(array $options)
    {

        /*
        $options est un tableau de la forme suivante
        $options = [
            'FIELD_NAME' => [
                'type' => '%d',
                'value' => $LA_VALEUR
            ],
            'FIELD_NAME2' => [
                'type' => '%d',
                'value' => $UNE_AUTRE_VALEUR
            ],
        ]
        */

        $sql = "
            SELECT * FROM `" . $this->getTableName() . "`
            WHERE
        ";

        $values = [];

        $columnIndex = 0;
        foreach ($options as $columnName => $descriptor) {
            if($columnIndex > 0) {
                $sql .= ' AND ';
            }

            $sql = $sql . ' ' . $columnName .'=' . $descriptor['type'];
            $columnIndex++;

            $values = $descriptor['value'];
        }

        $preparedStatement = $this->wpdb->prepare(
            $sql,
            $values
        );
        $rows = $this->wpdb->get_results($preparedStatement);
        return $rows;
    }


    public function getTableName()
    {
        $tablePrefix = $this->wpdb->prefix;
        $tableName = $tablePrefix . $this->tableName;
        return $tableName;
    }

    public function createTable()
    {
        $sql = $this->getCreateTableSQL();
        // inclusion des fonctions nécessaire pour modifier la bdd
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);

        $primaryKeySQL = $this->getCreatePrimaryKeySQL();
        if($primaryKeySQL) {
            $this->wpdb->query($primaryKeySQL);
        }
    }

    public function dropTable()
    {
        $tablePrefix = $this->wpdb->prefix;
        $tableName = $tablePrefix . $this->getTableName();

        $sql = 'DROP TABLE `' . $tableName . '`';
        $this->wpdb->query($sql);
    }

    public function insert($data)
    {
        return $this->wpdb->insert(
            $this->getTableName(),
            $data
        );
    }

    public function delete($conditions)
    {
        $this->wpdb->delete(
            $this->getTableName(),
            $conditions
        );
    }

    public function update($data, $conditions)
    {
        $this->wpdb->update(
            $this->getTableName(),
            $data,
            $conditions
        );

    }
}

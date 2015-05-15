<?php


class User
{

    public $id;
    protected $pdo;
    protected $names = ['name', 'surname', 'phone_number', 'birthday'];

    public function __construct($id)
    {
        $this->pdo = new PDO(
            'mysql:host=localhost;dbname=users', 'root', 1111
        );
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->id = $id;
    }

    public function  getHistory($columnName)
    {
        //check columnName
        if (!in_array($columnName, $this->names)) {
            throw new \Exception ("ColumnName " . $columnName . " not in database");
        }

        // start transaction
        $this->pdo->beginTransaction();

        //check if user with id  in database
        $stmt = $this->pdo->prepare(
            'SELECT * from user_profile WHERE id = ?'
        );
        $stmt->execute([$this->id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            throw new \Exception ("Such user not in database with id " . $this->id);
        }

        $stmt = $this->pdo->prepare(
            'SELECT  column_value, time from user_changes  WHERE user_id = ? and column_name = ?'
        );
        $stmt->execute([$this->id, $columnName]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = [];
        foreach ($rows as $val) {
            $result[$val['time']] = $val['column_value'];
        }

        return $result;
    }

}

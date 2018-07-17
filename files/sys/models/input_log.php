<?php

require_once '../sys/database.php';

class InputLogModel extends Database {

    public $field_value;
    public $field_id;

    function createInputLog() : string {

        $sql = "INSERT INTO input_log
                SET
                  field_value = :field_value,
                  field_id = :field_id
                    ";

        $statement = $this->db->prepare($sql);

        //prepared statement, htmlspecialchars, strip_tags
        //are way of dealing with SQL Injection
        $this->field_value = htmlspecialchars(strip_tags($this->field_value));
        $this->field_id = htmlspecialchars(strip_tags($this->field_id));

        $statement->bindParam(':field_value', $this->field_value);
        $statement->bindParam(':field_id', $this->field_id);

        $data = [];
        if(!$statement->execute()) {
            $data = $statement->errorInfo();
        }

        return json_encode($data);
    }
}
<?php

require_once '../sys/database.php';

class ConversionChartModel extends Database {

    /**
     * @return string
     */
    function getConversionChart() :string {

        $sql = "SELECT * 
                FROM conversion_chart";

        $statement = $this->db->prepare($sql);

        if($statement->execute()) {

            $data = [];
            while ($result = $statement->fetch(PDO::FETCH_ASSOC)) {
                array_push($data, $result);
            }

        } else {
            $data = $statement->errorInfo();
        }

        return json_encode($data);
    }
}
<?php
class DataBaseController {
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "";
    private $connection;

    function __constructor() {
        $this->connection = $this->connectionToDataBase();
    }

    function connectionToDataBase() {
        $connection = mysqli_connect($this->hostname,$this->username,$this->password,$this->database);
        return $connection;
    }

    function updateQuery($query) {
        $result = mysqli_query($this->connection,$query);
        if (!$result) {
            die('Invalid query');
        } else {
            return $result;
        }
    }

    function insertQuery($query) {
        $result = mysqli_query($this->connection,$query);
        if (!$result) {
            die('Invalid query');
        } else {
            return $result;
        }
    }

    function deleteQuery($query) {
        $result = mysqli_query($this->connection,$query);
        if (!$result) {
            die('Invalid query');
        } else {
            return $result;
        }
    }

    function runQuery($query) {
        $result = mysqli_query($this->connection,$query);
        while($row=mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if(!empty($resultOfRow))
            return $resultOfRow;
    }

    function numberOfRows($query) {
        $result  = mysqli_query($this->connection,$query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }

}

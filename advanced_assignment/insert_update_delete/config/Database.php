<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db   = "test20";

    public function connect() {
        $con = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        return $con;
    }
}

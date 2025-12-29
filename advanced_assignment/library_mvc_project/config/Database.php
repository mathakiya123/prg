<?php
class Database
{
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $db="db_12";

    public function connect() 
    {
        $con = new mysqli($this->host,$this->user,$this->pass,$this->db);
        return $con;
    }
}
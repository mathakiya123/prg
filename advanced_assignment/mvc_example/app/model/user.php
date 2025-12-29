<?php
class User {
    private $conn;
    private $table = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Register user
    public function register($fname, $email, $password) {
        $fname = $this->conn->real_escape_string($fname);
         $email = $this->conn->real_escape_string($email);

        $check = $this->conn->query("SELECT id FROM {$this->table} WHERE email='$email'");
        if ($check->num_rows > 0) {
            return "Email already exists.";
        }

        $hash = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO {$this->table} (fname, email, password) VALUES ('$fname', '$email', '$hash')";
        return $this->conn->query($query) ? true : false;
    }

     public function login($email, $password) {
        $email = $this->conn->real_escape_string($email);
        $query = "SELECT * FROM {$this->table} WHERE email='$email'";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                return $user;
                echo $user;
           
            }
        }
        return false;
    }


    
}
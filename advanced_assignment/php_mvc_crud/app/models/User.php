<?php
class User {
    private $conn;
    public function __construct($conn){
        $this->conn = $conn;
    }
    public function all(){
        return $this->conn->query("SELECT * FROM users");
    }
    public function create($name,$email){
        $stmt=$this->conn->prepare("INSERT INTO users(name,email) VALUES(?,?)");
        $stmt->bind_param("ss",$name,$email);
        return $stmt->execute();
    }
    public function find($id){
        return $this->conn->query("SELECT * FROM users WHERE id=$id")->fetch_assoc();
    }
    public function update($id,$name,$email){
        $stmt=$this->conn->prepare("UPDATE users SET name=?,email=? WHERE id=?");
        $stmt->bind_param("ssi",$name,$email,$id);
        return $stmt->execute();
    }
    public function delete($id){
        return $this->conn->query("DELETE FROM users WHERE id=$id");
    }
}
?>
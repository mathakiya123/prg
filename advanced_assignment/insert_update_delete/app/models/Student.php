<?php
require_once __DIR__ . "/Model.php";  // __DIR__ current folder resolve kare

class Student extends Model {
    private $table = "students";

    public function getAll() {
        return $this->db->query("SELECT * FROM $this->table");
    }

    public function getById($id) {
        $id = intval($id);
        $result = $this->db->query("SELECT * FROM $this->table WHERE id=$id");
        return $result->fetch_assoc();
    }

    public function create($data) {
        $name = $this->db->real_escape_string($data['name']);
        $email = $this->db->real_escape_string($data['email']);
        return $this->db->query("INSERT INTO $this->table (name,email) VALUES ('$name','$email')");
    }

    public function update($id, $data) {
        $id = intval($id);
        $name = $this->db->real_escape_string($data['name']);
        $email = $this->db->real_escape_string($data['email']);
        return $this->db->query("UPDATE $this->table SET name='$name', email='$email' WHERE id=$id");
    }

    public function delete($id) {
        $id = intval($id);
        return $this->db->query("DELETE FROM $this->table WHERE id=$id");
    }
}

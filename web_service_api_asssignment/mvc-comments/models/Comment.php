<?php
require_once "config/Database.php";
class Comment {
    public static function all() {
        $db = Database::connect();
        return $db->query("SELECT * FROM comments ORDER BY id DESC");
    }
    public static function insert($name, $comment) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO comments (name, comment) VALUES (?,?)");
        $stmt->bind_param("ss", $name, $comment);
        return $stmt->execute();
    }
    public static function find($id) {
        $db = Database::connect();
        return $db->query("SELECT * FROM comments WHERE id=$id")->fetch_assoc();
    }
    public static function update($id, $name, $comment) {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE comments SET name=?, comment=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $comment, $id);
        return $stmt->execute();
    }
    public static function delete($id) {
        $db = Database::connect();
        return $db->query("DELETE FROM comments WHERE id=$id");
    }
}

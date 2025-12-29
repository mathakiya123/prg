<?php
require_once "Model.php";
require_once "CrudInterface.php";

class Book extends Model implements CrudInterface
{
    private $table = "books";

    public function add($data)
    {
        $name   = $data['name'];
        $author = $data['author'];
        $image  = $data['image'];

        return $this->db->query(
            "INSERT INTO $this->table (name,author,image)
             VALUES ('$name','$author','$image')"
        );
    }

    public function getAll()
    {
        return $this->db->query("SELECT * FROM $this->table");
    }

    /* ✅ NEW – do not remove old code */
    public function getById($id)
    {
        return $this->db->query(
            "SELECT * FROM $this->table WHERE id=$id"
        );
    }

    public function update($data)
    {
        $id     = $data['id'];
        $name   = $data['name'];
        $author = $data['author'];
        $image  = $data['image'];

        return $this->db->query(
            "UPDATE $this->table 
             SET name='$name', author='$author', image='$image'
             WHERE id=$id"
        );
    }

    public function delete($id)
    {
        return $this->db->query(
            "DELETE FROM $this->table WHERE id=$id"
        );
    }
}

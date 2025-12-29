<?php
require_once __DIR__."/../models/Book.php";

class BookController
{
    private $book;

    public function __construct()
    {
        $this->book = new Book();
    }

    public function index()
    {
        $books = $this->book->getAll();
        require __DIR__."/../views/books.php";
    }

    public function store()
    {
        $image = $_FILES['image']['name'];
        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "public/uploads/".$image
        );

        $_POST['image'] = $image;
        $this->book->add($_POST);
        header("Location: index.php");
    }

    /* ✅ NEW */
    public function edit()
    {
        $book = $this->book
                     ->getById($_GET['id'])
                     ->fetch_assoc();

        require __DIR__."/../views/edit.php";
    }

    public function update()
    {
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                "public/uploads/".$image
            );
        } else {
            $image = $_POST['old_image'];
        }

        $_POST['image'] = $image;
        $this->book->update($_POST);
        header("Location: index.php");
    }

    public function delete()
    {
        $this->book->delete($_GET['id']);
        header("Location: index.php");
    }
}

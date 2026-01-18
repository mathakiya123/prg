<?php
require_once "models/Comment.php";
class CommentController {
    public function index() {
        $comments = Comment::all();
        include "views/comments/index.php";
    }
    public function create() {
        include "views/comments/create.php";
    }
    public function store() {
        Comment::insert($_POST['name'], $_POST['comment']);
        header("Location: index.php");
    }
    public function edit() {
        $comment = Comment::find($_GET['id']);
        include "views/comments/edit.php";
    }
    public function update() {
        Comment::update($_POST['id'], $_POST['name'], $_POST['comment']);
        header("Location: index.php");
    }
    public function delete() {
        Comment::delete($_GET['id']);
        header("Location: index.php");
    }
}

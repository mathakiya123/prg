<?php
require 'app/models/User.php';
class UserController{
    private $user;
    public function __construct($conn){
        $this->user=new User($conn);
    }
    public function index(){
        $users=$this->user->all();
        include 'app/views/users/list.php';
    }
    public function create(){
        if($_POST){
            $this->user->create($_POST['name'],$_POST['email']);
            header("Location: index.php");
        }
        include 'app/views/users/form.php';
    }
    public function edit(){
        $data=$this->user->find($_GET['id']);
        if($_POST){
            $this->user->update($_GET['id'],$_POST['name'],$_POST['email']);
            header("Location: index.php");
        }
        include 'app/views/users/form.php';
    }
    public function delete(){
        $this->user->delete($_GET['id']);
        header("Location: index.php");
    }
}
?>
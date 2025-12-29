<?php
require_once __DIR__ . "/../models/Student.php";



class StudentController {
    private $student;

    public function __construct() {
        $this->student = new Student();
    }

    public function index() {
        $students = $this->student->getAll();
        require __DIR__ . "/../views/students.php";
    }

    public function create() {
        if(isset($_POST['submit'])) {
            $this->student->create($_POST);
            header("Location: index.php");
        }
        require __DIR__ . "/../views/student_form.php";
    }

    public function edit($id) {
        $studentData = $this->student->getById($id);
        if(isset($_POST['submit'])) {
            $this->student->update($id, $_POST);
            header("Location: index.php");
        }
        require __DIR__ . "/../views/student_form.php";
    }

    public function delete($id) {
        $this->student->delete($id);
        header("Location: index.php");
    }
}

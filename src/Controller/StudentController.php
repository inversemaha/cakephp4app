<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Student Controller
 *
 */
class StudentController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('app');
        $this->loadModel("Students");
    }

    public function addStudent()
    {
        // Add Students
        $this->set("title", "Add Student | CakePHP 4 CRUD Application");

    }

    public function editStudent($id =null)
    {
        // edit Students
        $this->set("title", "Edit Student | CakePHP 4 CRUD Application");

        $student = $this->Students->get($id);
        $this->set(compact("student"));

    }

    public function listStudents()
    {
        // list Students

        $this->set("title", "Show Student | CakePHP 4 CRUD Application");

        $students = $this->Students->find()->toList();
        //$this->set("students",$students);
        $this->set(compact("students"));

    }
}

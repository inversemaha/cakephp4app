<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * User Controller
 *
 */
class UserController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('app');
        $this->loadModel("Users");
        $this->Auth->allow(["registerUser","loginUser"]);
    }
    public function registerUser()
    {
        // Register User form data
        $this->set("title", "Register User | CakePHP 4 CRUD Application");
    }

    public function loginUser()
    {
        // Login User form data
        $this->set("title", "Login | CakePHP 4 CRUD Application");
        if ($this->request->is("post")) {
            $user = $this->Auth->identify();
            /*debug($user);
            exit;*/
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(["action" => "listUsers"]);
            }
            $this->Flash->error("Invalid username or password");
        }
    }

    public function logoutUser()
    {
        // Logout User
    }

    public function editUser($id =null)
    {
        // Edit User form data
        $this->set("title", "Edit User | CakePHP 4 CRUD Application");

        $user = $this->Users->get($id);
        $this->set(compact("user"));
    }

    public function listUsers()
    {
        // List Users
        $this->set("title", "List User | CakePHP 4 CRUD Application");
        $users = $this->Users->find()->toList();
        $this->set(compact("users"));
    }

}

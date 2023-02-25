<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Utility\Security;

/**
 * User Controller
 *
 */
class UserController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel("Users");
        $this->Auth->allow(["registerUser","loginUser"]);
    }

    //Add User API

    public function registerUser()
    {
        $this->request->allowMethod(["post"]);
        // Register User form data
        $formData = $this->request->getData();
        // email address check rules
        $emailCheck = $this->Users->find()->where([
            "email" => $formData["email"]
        ])->first();
        if(!empty($emailCheck)){
            // Already exists
            $status = false;
            $message = "User already exists";
        }else{
            // Insert user data
            $userObject = $this->Users->newEmptyEntity();
            $userObject = $this->Users->patchEntity($userObject, $formData);
            if ($this->Users->save($userObject)) {
                // Success response
                $status = true;
                $message = "User added successfully";
            } else {
                // Failed response
                $status = false;
                $message = "Failed to create user";
            }
        }

        $this->set([
            "status" => $status,
            "message" => $message
        ]);
        $this->viewBuilder()->setOption("serialize", ["status","message"]);

    }

    public function loginUser()
    {
        // Login User form data with jwt token value
        $this->request->allowMethod(["post"]);

        $userEmail = $this->request->getData('email');
        $password = $this->request->getData('password');
        $user = $this->Auth->identify();

        if(!$user){
            $status = false;
            $message = "Invalid username or password";
        }else{
            $key = Security::getSalt();
            // Token = xxx.yyy.zzz
            $payload = [
                "iss" => "localhost", // Issuer of the token
                "sub" => $user["id"], // Subject of the token
                "exp" => time() + 604800, // Expiration time
                "iat" => true, // Time when JWT was issued.
            ];
            // Set the JWT token in the response
            $this->response = $this->response->withHeader('Authorization', 'Bearer ' . $payload);
            
            $this->Auth->setUser($user);
            $status = true;
            $message = "Login successfully";
        }
        $this->set([
            "status" => $status,
            "message" => $message,
            "token" => $token
        ]);
        $this->viewBuilder()->setOption("serialize", ["status","message","token"]);

    }

    public function userProfile(){
        // User Profile
        $user = $this->Auth->user();
        If(!$user){
            //No user found Or invalid token
            $status = false;
            $message = "Invalid token";
            $data = [];
        }else{
            $status = true;
            $message = "User profile";
            $data = $user;
        }
        $this->set(compact("status","message","data"));
        $this->viewBuilder()->setOption("serialize", ["status","message","data"]);


    }

    public function updateUser($id =null)
    {
        // Edit User form data
        $this->request->allowMethod(["put","post"]);
        $user_id = $this->request->getParam("user_id");

        $userInfo = $this->request->getData();
        //check user address
        $userData = $this->Users->get($user_id);
        if (!empty($userData)){
          // user exist
            $userObject = $this->Users->patchEntity($userData, $userInfo);
            if ($this->Users->save($userObject)) {
                // Success response
                $status = true;
                $message = "User updated successfully";
            } else {
                // Failed response
                $status = false;
                $message = "Failed to update user";
            }
        }else{
            // user not exist
            $status = false;
            $message = "User not found";
        }
        $this->set([
            "status" => $status,
            "message" => $message
        ]);
        $this->viewBuilder()->setOption("serialize", ["status","message"]);

    }

    public function listUsers()
    {
        // List Users
        $this->request->allowMethod(["get"]);
        $users = $this->Users->find()->toList();
        $this->set([
            "status" => true,
            "message" => "User list",
            "data" => $users
        ]);
        $this->viewBuilder()->setOption("serialize", ["status", "message", "data"]);
    }

    public function deleteUser()
    {
        $this->request->allowMethod(["delete"]);
        // List Users
        $user_id = $this->request->getParam("user_id");
        $userData = $this->Users->get($user_id);
        if (!empty($userData)) {
            // user exist
            if ($this->Users->delete($userData)) {
                // Success response
                $status = true;
                $message = "User deleted successfully";
            } else {
                // Failed response
                $status = false;
                $message = "Failed to delete user";
            }
        } else {
            // user not exist
            $status = false;
            $message = "User not found";
        }
        $this->set([
            "status" => $status,
            "message" => $message
        ]);
        $this->viewBuilder()->setOption("serialize", ["status", "message"]);
    }

}

<?php
declare(strict_types=1);

namespace App\Controller;

use function PHPUnit\Framework\isNull;

/**
 * Ajax Controller
 *
 */
class AjaxController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->autoRender = false;
        $this->loadModel("Students");
        $this->loadModel("Users");
    }

    public function submitAddStudent()
    {
        // handle add student from data
        if ($this->request->is("ajax")) {
            $data = $this->request->getData();
           // print_r($data);
            $imageFile = $this->request->getData("profile_image");
            $hasFile = $imageFile->getError();
            // error = 0 [file uploaded], > 0 [no file]
            if ($hasFile > 0) {
                //No file
                $data["profile_image"] = "";
            } else {
                //File Uploaded
                $fileName = $imageFile->getClientFilename();
                $fileType = $imageFile->getClientMediaType();
                if ($fileType == "image/png" || $fileType = "image/jepg" || $fileType = "image/jpg") {
                    // File upload
                    $imagePath = WWW_ROOT . "img/" . $fileName;
                    $imageFile->moveTo($imagePath);
                    $data["profile_image"] = "img/" . $fileName;
                }
            }
            // Entity Object
            $studentEntity = $this->Students->newEntity($data);
            $studentEntity = $this->Students->patchEntity($studentEntity, $data);
            // Save Data
            $result = $this->Students->save($studentEntity);
            if ($result) {
                // Success
                $this->Flash->success("Student Added Successfully");
                echo json_encode(array(
                    "status" => "1",
                    "message" => "Student Added Successfully"
                ));
            } else {
                //error
                $this->Flash->error("Student Added Failed");
                echo json_encode(array(
                    "status" => "0",
                    "message" => "Student Added Failed"
                ));
            }
        }

    }

    public function submitEditStudent()
    {
        //handle edit student data
        $data = $this->request->getData();
        $studentEntity = $this->Students->get($data["student_id"]);

        //print_r($studentEntity);

        $file = $this->request->getData("profile_image");
        $hasFile = $file->getError();

        if ($hasFile > 0) {
            $data["profile_image"] = $studentEntity->profile_image;
        } else {
            $fileName = $file->getClientFilename();
            $fileType = $file->getClientMediaType();

            if ($fileType == "image/png" || $fileType == "image/jpg" || $fileType == "image/jpeg") {
                $imagePath = WWW_ROOT . "img/" . $fileName;
                $file->moveTo($imagePath);
                $data["profile_image"] = "img/" . $fileName;
            }
        }
        $studentEntity = $this->Students->patchEntity($studentEntity, $data);
        $result = $this->Students->save($studentEntity);
        if ($result) {
            $this->Flash->success("Student Updated Successfully");
            echo json_encode(array(
                "status" => "1",
                "message" => "Student Updated Successfully"
            ));
        } else {
            $this->Flash->error("Student Updated Failed");
            echo json_encode(array(
                "status" => "0",
                "message" => "Student Updated Failed"
            ));
        }


    }

    public function submitDeleteStudentRequest()
    {
        //handle delete student data
        if($this->request->is("ajax")){

            $student_id = $this->request->getData("student_id");
            $studentEntity = $this->Students->get($student_id);
            $result = $this->Students->delete($studentEntity);
            if($result){
                $this->Flash->success("Student Deleted Successfully");
                echo json_encode(array(
                    "status" => "1",
                    "message" => "Student Deleted Successfully"
                ));
            }else{
                $this->Flash->error("Student Deleted Failed");
                echo json_encode(array(
                    "status" => "0",
                    "message" => "Student Deleted Failed"
                ));
            }

        }


    }

    //User Ajax Controller
    public function submitRegisterUser()
    {
        // handle register user form data
        if ($this->request->is("ajax")){
            $data = $this->request->getData();
            //print_r($data);

            //Hash Password
            $getPass = $this->request->getData("password");
            $data["password"] = md5($getPass);

            //Upload Image
            $imageFile = $this->request->getData("profile_image");
            $hasFile = $imageFile->getError();
            // error = 0 [file uploaded], > 0 [no file]
            if ($hasFile > 0){
                //No file
                $data["profile_image"] = "";
            }else{
                //File Uploaded
                $fileName = $imageFile->getClientFilename();
                $fileType = $imageFile->getClientMediaType();
                if ($fileType == "image/png" || $fileType = "image/jepg" || $fileType = "image/jpg"){
                    // File upload
                    $imagePath = WWW_ROOT . "img/user/" . $fileName;
                    $imageFile->moveTo($imagePath);
                    $data["profile_image"] = "img/" . $fileName;
                }
            }
            // User Entity Object
            $userEntity = $this->Users->newEntity($data);
            $userEntity = $this->Users->patchEntity($userEntity, $data);
            // Save User Data
            $result = $this->Users->save($userEntity);
            if ($result){
                // Success
                $this->Flash->success("User Register Successfully");
                echo json_encode(array(
                    "status" => "1",
                    "message" => "User Register Successfully"
                ));
            }else{
                //error
                $this->Flash->error("User Register Failed");
                echo json_encode(array(
                    "status" => "0",
                    "message" => "User Register Failed"
                ));
            }
        }
    }

    public function submitEditUser()
    {
        // handle edit user form data
        $data = $this->request->getData();
        $userEntity = $this->Users->get($data["user_id"]);

        //print_r($userEntity);
        $file = $this->request->getData("profile_image");
        $hasFile = $file->getError();
        if ($hasFile > 0){
            $data["profile_image"] = $userEntity->profile_image;
        }else{
            $fileName = $file->getClientFilename();
            $fileType = $file->getClientMediaType();
            if ($fileType == "image/png" || $fileType == "image/jpg" || $fileType == "image/jpeg"){
                $imagePath = WWW_ROOT . "img/user/" . $fileName;
                $file->moveTo($imagePath);
                $data["profile_image"] = "img/user/" . $fileName;
            }
        }
        $userEntity = $this->Users->patchEntity($userEntity, $data);
        $result = $this->Users->save($userEntity);
        if ($result){
            $this->Flash->success("User Updated Successfully");
            echo json_encode(array(
                "status" => "1",
                "message" => "User Updated Successfully"
            ));
        }else{
            $this->Flash->error("User Updated Failed");
            echo json_encode(array(
                "status" => "0",
                "message" => "User Updated Failed"
            ));
        }
    }

    public function submitDeleteUserRequest()
    {
        // handle delete user
        if ($this->request->is("ajax")){
            $user_id = $this->request->getData("user_id");
            $userEntity = $this->Users->get($user_id);
            $result = $this->Users->delete($userEntity);
            if ($result){
                $this->Flash->success("User Deleted Successfully");
                echo json_encode(array(
                    "status" => "1",
                    "message" => "User Deleted Successfully"
                ));
            }else{
                $this->Flash->error("User Deleted Failed");
                echo json_encode(array(
                    "status" => "0",
                    "message" => "User Deleted Failed"
                ));
            }
        }
    }

    public function submitLoginUser()
    {
        // handle login user form data
    }

    public function submitLogoutUser()
    {
        // handle logout user
    }

}

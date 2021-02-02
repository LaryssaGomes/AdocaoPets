<?php
  require_once dirname(__FILE__)."/../database/Conn.php";
  require_once dirname(__FILE__)."/../models/User.php";
  require_once dirname(__FILE__)."/../services/UserService.php";
  require_once dirname(__FILE__)."/../services/ImageUpload.php";
  require_once dirname(__FILE__)."/../validations/EmailValidation.php";
  require_once dirname(__FILE__)."/../helpers/helpers.php";
  require_once dirname(__FILE__)."/../domain/IUserController.php";

  class UserController {
    public function insert() {
      $folderUsers = '../../tmp/users/';
      $imagePath = upload($folderUsers, 'users');
      $name = $_POST['name'];
      $birthDate = $_POST['birthDate'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $validEmail = emailValidation($email);

      if ($imagePath === '' || $validEmail == false || empty($name) || empty($birthDate) || empty($email) || empty($address)) {
        redirect("/failure");
      } else {
        $user = new User();
        $user->setName($name);
        $user->setBirthDate($birthDate);
        $user->setEmail($email);
        $user->setPhoto($imagePath);
        $user->setAddress($address);
    
        $service = new UserService(new Conn("localhost","pets","root", ""), $user);
        $userId = $service->save();
        redirect("/success");
      }
    }

    public function update($id) {
      // $id = localStorage.getItem("user_id"); 
      $folderUsers = '../../tmp/users/';
      $imagePath = upload($folderUsers, 'users');
      $name = $_POST['name'];
      $birthDate = $_POST['birthDate'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $validEmail = emailValidation($email);

      if ($imagePath === '' || $validEmail == false || empty($name) || empty($birthDate) || empty($email) || empty($address)) {
        redirect("/failure");
      } else {
        $user = new User();
        // $user->setId($id);
        $user->setName($name);
        $user->setBirthDate($birthDate);
        $user->setEmail($email);
        $user->setPhoto($imagePath);
        $user->setAddress($address);
    
        $service = new UserService(new Conn("localhost","pets","root", ""), $user);
        $userId = $service->save();
        redirect("/success");
      }
    }
  }
  
?>
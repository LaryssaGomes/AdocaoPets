<?php
  require_once "../database/Conn.php";
  require_once "../models/User.php";
  require_once "../services/UserService.php";
  require_once "../services/ImageUpload.php";
  require_once "../validations/EmailValidation.php";
  require_once "../helpers/helpers.php";
  require_once "../domain/IUserController.php";

  // implements IUserController 
  class UserController {
    public function insert() {
      $folderUsers = '../../tmp/users/';
      $imagePath = upload($folderUsers, 'users');
      $name = $_POST['name'];
      $birthDate = $_POST['birthDate'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $validEmail = emailValidation($email);
      
      if ($imagePath !== '' || $validEmail == false || empty($name) || empty($birthDate) || empty($email) || empty($address)) {
        redirect("/failure");
      } else {
        $user = new User();
        $user->setName($name);
        $user->setBirthDate($birthDate);
        $user->setEmail($email);
        $user->setPhoto($imagePath);
        $user->setAddress($address);
    
        $service = new UserService($user);
        $userId = $service->save();
        redirect("/success");
      }
    }
  }
?>
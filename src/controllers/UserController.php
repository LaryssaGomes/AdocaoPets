<?php
  require_once dirname(__FILE__)."/../database/Conn.php";
  require_once dirname(__FILE__)."/../models/User.php";
  require_once dirname(__FILE__)."/../services/UserService.php";
  require_once dirname(__FILE__)."/../services/ImageUpload.php";
  require_once dirname(__FILE__)."/../validations/EmailValidation.php";
  require_once dirname(__FILE__)."/../helpers/helpers.php";
  require_once dirname(__FILE__)."/../domain/IUserController.php";

  session_start();

  class UserController {
    public function insert() {
      $folderUsers = '../../tmp/users/';
      $imagePath = upload($folderUsers, 'users');
      $name = $_POST['name'];
      $birthDate = $_POST['birthDate'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $validEmail = emailValidation($email);
      $password = md5($_POST['password']); # adicionado
      if ($imagePath === '' || $validEmail == false || empty($name) || empty($birthDate) || empty($email) || empty($address) || empty($password)) {
        redirect("/failure");
      } else {
        $user = new User();
        $user->setName($name);
        $user->setBirthDate($birthDate);
        $user->setEmail($email);
        $user->setPhoto($imagePath);
        $user->setAddress($address);
        $user->setPassword($password); # adicionado
    
        $service = new UserService(new Conn("localhost","pets","root", ""), $user);
        $userId = $service->save();
        redirect("/success/registerUser.html");
      }
    }

    public function update($id) {
      // $id = localStorage.getItem("user_id"); 
      $id = $_SESSION["id_usuario"];
      $folderUsers = '../../tmp/users/';
      $imagePath = upload($folderUsers, 'users');
      $name = $_POST['name'];
      $birthDate = $_POST['birthDate'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $validEmail = emailValidation($email);
      $password = md5($_POST['password']); # adicionado
      echo $address;

      if ($validEmail == false || empty($name) || empty($birthDate) || empty($email) || empty($address) || empty($password) || empty($id)) {
        redirect("/failure");
      } else {
        $user = new User();
        $user->setId($id);
        $user->setName($name);
        $user->setBirthDate($birthDate);
        $user->setEmail($email);
        $user->setPhoto($imagePath);
        $user->setAddress($address);
        $user->setPassword($password); # adicionado
    
        $service = new UserService(new Conn("localhost","pets","root", ""), $user);
        $userId = $service->update();
        redirect("/success/registerUser.html");
      }
    }

    public function delete($id){
      echo "É esse id: " . $id;

      if(empty($id)){
        redirect("/failure");
      }else{
        $user = new User;
        $user->setId($id);

        $service = new UserService(new Conn("localhost","pets","root", ""), $user);
        $userId = $service->delete();
        redirect("/success/deleteUser.html");
      }
    }
  }
  
?>
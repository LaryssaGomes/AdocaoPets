<?php
  require_once "../database/Conn.php";
  require_once "../models/User.php";
  require_once "../services/UserService.php";
  require_once "../services/ImageUpload.php";
  require_once "../validations/EmailValidation.php";

  $db = new Conn('localhost','pets','root', '');

  $folderUsers = '../../tmp/users/';
  $entity = 'users';
  $imagePath = upload($folderUsers, $entity);
  
  if ($imagePath !== '') {
    $name = $_POST['name'];
    $birthDate = $_POST['birthDate'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $validEmail = emailValidation($email);
    
    if ($validEmail == false) {
      echo 'Informe um e-mail válido';
      return;
    }

    if (empty($name) || empty($birthDate) || empty($email) || empty($address)) {
      // echo 'Preencha todos os dados.';
      header ("location: http://localhost/pets/src/presentation/failure");
    } else {
      $user = new User;
      $user->setName($name);
      $user->setBirthDate($birthDate);
      $user->setEmail($email);
      $user->setPhoto($imagePath);
      $user->setAddress($address);
  
      $service = new UserService($db, $user);
      $userId = $service->save();
      header ("location: http://localhost/pets/src/presentation/success");
    }
  } else {
    echo 'Falha ao salvar imagem.';
  }
?>
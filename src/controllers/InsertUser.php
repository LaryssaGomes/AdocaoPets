<?php
  require_once "../database/Conn.php";
  require_once "../models/User.php";
  require_once "../services/UserService.php";
  require_once "../services/ImageUpload.php";

  $db = new Conn('localhost','pets','root', '');

  $folderUsers = '../../tmp/users/';
  $entity = 'users';
  $imagePath = upload($folderUsers, $entity);
  
  if ($imagePath !== '') {
    $name = $_POST['name'];
    $birthDate = $_POST['birthDate'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $user = new User;
    $user->setName($name);
    $user->setBirthDate($birthDate);
    $user->setEmail($email);
    $user->setPhoto($imagePath);
    $user->setAddress($address);

    $service = new UserService($db, $user);
    $userId = $service->save();
    header ("location: http://localhost/pets/src/presentation/success");
  } else {
    echo 'Falha ao salvar imagem.';
  }
?>
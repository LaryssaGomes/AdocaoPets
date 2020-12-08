<?php
  require_once "database/Conn.php";
  require_once "models/Pet.php";
  require_once "models/User.php";
  require_once "services/PetService.php";
  require_once "services/UserService.php";
  require_once "./services/ImageUpload.php";

  $db = new Conn('localhost','pets','root', '');

  $imagePath = upload();
  
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
    print_r($user->getPhoto());

    $service = new UserService($db, $user);
    $userId = $service->save();
  } else {
    echo 'Falha ao salvar imagem.';
  }

  // $pet = new Pet;
  // $pet->setPhoto("texto");
  // $pet->setName("Junior");
  // $pet->setDescription("oooooo");
  // $pet->setType("Cana brava");
  // $pet->setUserId($userId);

  // $service = new PetService($db, $pet);
  // print_r($service->save());
?>
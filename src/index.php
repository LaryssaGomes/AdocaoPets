<?php
  require_once "database/Conn.php";
  require_once "models/Pet.php";
  require_once "models/User.php";
  require_once "services/PetService.php";
  require_once "services/UserService.php";

  $db = new Conn('localhost','pets','root', '');

  $user = new User;
  $user->setName("Junior");
  $user->setBirthDate("10/20/2001");
  $user->setEmail("oooooo");
  $user->setPhoto("texto");
  $user->setAddress("Cana brava");
  print_r($user);

  $service = new UserService($db, $user);
  $userId = $service->save();

  $pet = new Pet;
  $pet->setPhoto("texto");
  $pet->setName("Junior");
  $pet->setDescription("oooooo");
  $pet->setType("Cana brava");
  $pet->setUserId($userId);

  $service = new PetService($db, $pet);
  print_r($service->save());
?>
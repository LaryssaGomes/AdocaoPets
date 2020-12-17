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
  
  /* Funcionou Delete
  $user = new User;
     
  $service = new UserService($db, $user);
  print_r($service->delete(1));
  */
  /* Funcionou Lista dados
  $user = new User;
     
  $service = new UserService($db, $user);
  print_r($service->list());
  */
  /* Funcionou Atualizar
  $user = new User;
  $user -> setId(2);
  $user -> setName("ERISVALDO CANDIDO DOS SANTOS");
  $user -> setBirthDate('2020-12-16');
  $user -> setEmail('maria@gmail.com');
  $user -> setPhoto('jpg');
  $user -> setAddress('Rua Sete Setembro Centro Sao Sebastiao, Casa');
  $service = new UserService($db, $user);
  print_r($service->update());
  */
  
  if ($imagePath !== '') {
    $name = $_POST['name'];
    $birthDate = $_POST['birthDate'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $validEmail = emailValidation($email);
    
    if ($validEmail == false) {
      // echo 'Informe um e-mail válido';
      // return;
      header ("location: http://localhost:80/AdocaoPets/src/presentation/failure");
    }

    if (empty($name) || empty($birthDate) || empty($email) || empty($address)) {
      // echo 'Preencha todos os dados.';
      header ("location: http://localhost:80/AdocaoPets/src/presentation/failure");
    } else {
      $user = new User;
      $user->setName($name);
      $user->setBirthDate($birthDate);
      $user->setEmail($email);
      $user->setPhoto($imagePath);
      $user->setAddress($address);
  
      $service = new UserService($db, $user);
      $userId = $service->save();
      header ("location: http://localhost:80/AdocaoPets/src/presentation/success");
    }
  } else {
    // echo 'Falha ao salvar imagem.';
    header ("location: http://localhost:80/AdocaoPets/src/presentation/failure");
  }
  
?>
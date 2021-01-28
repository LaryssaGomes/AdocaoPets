<?php
  require_once "./UserController.php";

  $method = $_SERVER['REQUEST_METHOD'];
  // $request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

  switch ($method) {
    case 'PUT':
      // atualizar
      // $userController = new UserController(); // já tá pronto
      // $userController->update($_POST);
      break;
    case 'POST':
      $userController = new UserController(); // cadastrar - já tá pronto
      $userController->insert($_POST);
      break;
    case 'GET':
      // buscar dados
      break;
    case 'DELETE':
      echo 'You are using '.$method.' Method';
      // deletar
      break;
    default:
      handle_error($request);  
      break;
  }
?>
<?php
  require_once "./UserController.php";

  session_start();

  if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["nome_usuario"])){
    header("Location: ../presentation/home/index.html");
    exit;
  }

  $password = $_POST["password"];
  $password2 = $_POST["password2"];

  if($password == $password2){
    $userController = new UserController();
    $userController->update($_POST);
  }else{
    header("Location: ../presentation/editUser/editUser.php");
  }
?>
?>
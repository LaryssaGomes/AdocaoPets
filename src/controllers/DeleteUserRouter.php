<?php
    require_once "./UserController.php";

    session_start();

    if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["nome_usuario"])){
      header("../presentation/home/index.html"); // lembrar de consertar
      exit;
    }

    $id = $_SESSION["id_usuario"];
    $userController = new UserController();
    $userController->delete($id);
    //header("../presentation/home/index.html");
?>
  
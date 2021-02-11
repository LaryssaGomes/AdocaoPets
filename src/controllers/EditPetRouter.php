<?php
  require_once "./PetController.php";

  session_start();

  if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["nome_usuario"])){
    header("Location: ../../home/index.html");
    exit;
  }

  $petController = new PetController();
  $petController->update($_POST);
?>
?>
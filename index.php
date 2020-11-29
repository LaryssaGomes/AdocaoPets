<?php
require_once"IConn.php";
require_once"Conn.php";
require_once"IPets.php";
require_once"Pets.php";
require_once"IUsuario.php";
require_once"Usuario.php";
require_once"ServicePets.php";
require_once"ServiceUsuario.php";
$db = new Conn('localhost','pets','root', '');
$pets = new Pets;
$usuario = new Usuario;
$usuario ->setNome("Junior")
      ->setDataDeNascimento("10/20/2001")
      ->setEmail("oooooo")
      ->setFoto("texto")
      ->setEndereco("Cana brava");
print_r($usuario);
$service = new ServiceUsuario($db, $usuario);
print_r($service->save());
/*Cadastro de pets
$pets ->setFoto("texto")
      ->setNome("Junior")
      ->setDescricao("oooooo")
      ->setTipo("Cana brava");

$service = new ServicePets($db, $pets);
print_r($service->save());
*/
?>
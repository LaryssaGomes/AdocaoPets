<?php
require_once"IConn.php";
require_once"Conn.php";
require_once"IPets.php";
require_once"Pets.php";
require_once"ServicePets.php";

$db = new Conn('localhost','pets','root', '');
$pets = new Pets;
/*Cadastro de pets
$pets ->setFoto("texto")
      ->setNome("Junior")
      ->setDescricao("oooooo")
      ->setTipo("Cana brava");

$service = new ServicePets($db, $pets);
print_r($service->save());
*/
?>
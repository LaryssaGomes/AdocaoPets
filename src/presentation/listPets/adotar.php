<?php
  define('HOST', 'localhost');
  define('USER', 'root');
  define('PASS', '');
  define('DBNAME', 'pets');

  $conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);

  session_start();

  if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["nome_usuario"])){
    header("Location:./");
    exit;
  }


  $id = isset($_POST["type"])?$_POST["type"] : null;

  $query = "SELECT * FROM pets WHERE id = :id";
  $stm = $conn->prepare($query);
  $stm->bindValue(":id", $id);
  $stm->execute();
  $data = $stm->fetchAll(PDO:: FETCH_OBJ);

  foreach($data as $valor){
    echo "Foto: " . $valor->photo . "<br>";
    echo "Nome: " . $valor->name . "<br>";
    echo "Tipo: " . $valor->type . "<br>";
    echo "Descrição: " . $valor->description . "<br>";
  }

  $query = "DELETE FROM pets WHERE id = ?";
  $stm = $conn->prepare($query);
  $retorno = $stm->execute(array($id));

  if($retorno){ 
    echo "<script type= 'text/javascript'>";
    header("Location: ../success/adoptionPet.html");
    exit();

    
  }else{
      echo "<script type= 'text/javascript'>alert('Falha ao adotar pet!');</script>";
  }
?>
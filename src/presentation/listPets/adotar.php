<?php
  define('HOST', 'localhost');
  define('USER', 'root');
  define('PASS', 'laryssa');
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

  $query = "UPDATE pets SET adoption_state = 1 WHERE id = ?";
  $stm = $conn->prepare($query);
  $retorno = $stm->execute(array($id));
// Registros 
  require_once "../../../src/controllers/InsertRecord.php";
  require_once "../../../src/models/Record.php";
  require_once "../../../src/database/Conn.php";

  $db = new Conn("localhost","pets","root", "laryssa");
  $record_info = new InsertRecord(new Record);
  $record_info->get($_SESSION["id_usuario"], $id, $db);

  if($retorno){ 
    echo "<script type= 'text/javascript'>";
    header("Location: ../success/adoptionPet.html");
    exit();

    
  }else{
      echo "<script type= 'text/javascript'>alert('Falha ao adotar pet!');</script>";
  }
?>
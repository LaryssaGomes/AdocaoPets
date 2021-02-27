<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DBNAME', 'pets');

    $conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);

    require_once("./verifica.php");

    $user = $_SESSION['id_usuario'];

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $del = 'DELETE FROM users WHERE id = :id';
        $deletar = $conn->prepare($del);
        $deletar->bindValue(':id', $user);
        $retorno = $deletar->execute();
        header("Location: ../home/index.html");
    }
    catch(PDOException $e)
    {
    echo $e->getMessage();
    }
    require_once("../../controllers/UserController.php");
    ?>
  
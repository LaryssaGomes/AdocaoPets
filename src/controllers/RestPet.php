<?php
    require_once "./PetController.php";

    $method = $_SERVER['REQUEST_METHOD'];
    // $request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
  
    switch ($method) {
        case 'PUT':
            // atualizar
            // $PetController = new PetController(); // já tá pronto
            // $PetController->update($_POST);
            break;
        case 'POST':
            $PetController = new PetController(); // cadastrar
            $PetController->insert($_POST);
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
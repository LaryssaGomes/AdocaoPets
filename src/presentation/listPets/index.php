<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DBNAME', 'pets');

    $conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="../css/global.css" rel="stylesheet" />
        <link href="./list-styles.css" rel="stylesheet" />
        <link
            href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700"
            rel="stylesheet"
            type="text/css"
        />
        <script
        src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"
        crossorigin="anonymous"
        ></script>
        <title>Lista de pets</title>
    </head>
    <body>
        
        <?php
        //SQL para selecionar os registros
        $query = "SELECT * FROM pets";

        //Seleciona os registros
        $result = $conn->prepare($query);
        $result->execute();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="box-pets">
                <?php $photo = $row['photo'];
                echo "<img src='$photo' />";
                echo "Nome: " . $row['name'] . "<br>";
                echo "Id: " . $row['id'] . "<br>";
                echo "Descrição: " . $row['description'] . "<br>";
                echo "Tipo: " . $row['type'] . "<br>";
        }?>
            </div>
    </body>
</html>

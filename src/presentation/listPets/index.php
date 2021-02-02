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
        <link
            href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700"
            rel="stylesheet"
            type="text/css"
        />
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
        <script
        src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"
        crossorigin="anonymous"
        ></script>
        <title>Lista de pets</title>
        <style type="text/css">

            .container1 {
                margin: 10px;
            }
            .circle-image {
            display: block;
            border-radius: 50%;
            overflow: hidden;
            width: 300px;
            height: 300px;
            position: relative;
            
            }
            .circle-image img {
            width: 100%;
            height: 100%;
            object-fit:cover;
            }
            
        </style>
    </head>
    
    <body>
        <div class="container">
            <div class="panel">
                <div class="panel-heading">
                    <h1>Lista de pets</h1>
                </div>
                <?php
                //SQL para selecionar os registros
                $query = "SELECT * FROM pets";

                //Seleciona os registros
                $result = $conn->prepare($query);
                $result->execute();

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) { 
                        $photo = $row['photo']; ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class=" col-md-9 col-lg-9 "> 
                                    <div class="circle-image">
                                        <?php echo "<img src='$photo'/>"; ?>
                                    </div>
                                    <?php echo "Nome: " . $row['name'] . "<br>";
                                    echo "Id: " . $row['id'] . "<br>";
                                    echo "Descrição: " . $row['description'] . "<br>";
                                    echo "Tipo: " . $row['type'] . "<br>" . "<br>" . "<br>" . "<br>";
                }?>
                                </div>
                            </div>
                        </div>
            </div>    
    </body>
</html>

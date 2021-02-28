<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DBNAME', 'pets');

    $conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);

    session_start();

    if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["nome_usuario"])){
      header("Location:../home/index.html");
      exit;
    }

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
        <title>Exluir pet</title>
       
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
            .btn-pet{
            background-color: black;
            color: white;
		        }   
        </style>
    </head>

    <body>  
        <div class="container">
          <div class="col-xs-6 .col-sm-4">
            <div class="painel">
              <div class="panel-heading">
                  <h1>Exluir Pet</h1>
                  </br>
              </div>
            <?php
            //SQL para selecionar os registros

            $id = $_SESSION["id_usuario"];
            $query =  'SELECT * FROM pets WHERE user_id=:id';
            $stm = $conn->prepare($query);
            $stm->bindValue(":id", $id);
            $stm->execute();
            $data = $stm->fetchAll(PDO:: FETCH_OBJ);

            foreach ($data as $valor) {
              $valor->photo . "<br>"; ?> 
              <div class="panel=body">
                <div class="row">
                  <div class=" col-md-9 col-lg-9 "> 
                    <div class="circle-image">
                      <?php echo "<img src='$valor->photo'/>"; ?>
                    </div>
                    <?php echo "Nome: " . $valor->name . "<br>";
                    echo "Id: " . $valor->id . "<br>";
                    echo "Descrição: " . $valor->description . "<br>";
                    echo "Tipo: " . $valor->type ?>
                  </div>
                </div>
                <form action="../../controllers/DeletePetRouter.php" method="POST">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <input type="radio" value="<?php echo $valor->id;?>" name="type"> Selecionar</input>
                </div>
                </br></br>
              </div>
            <?php 
            }
            ?>
              </br>
              <button type="submit" class="btn btn-pet">Exluir pet</button>
              </br>
              <a class="link" href="../signin/data.php">
                <i class="fas fa-arrow-left"></i>
                Voltar
              </a>
              </form>
            </div>
          </div>
        </div>
    </body>
</html>

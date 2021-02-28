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

    $id = $_SESSION["id_usuario"];

    $qtd = $conn->query("SELECT count(*) FROM pets WHERE user_id=$id")->fetchColumn();

    $total_reg = "2"; // número de registros por página

    $pagina=$_GET['pagina'];
    if (!$pagina) {
    $pc = "1";
    } else {
    $pc = $pagina;
    }

    $inicio = $pc - 1;
    $inicio = $inicio * $total_reg;

    //SQL para selecionar os registros
    // $query =  'SELECT * FROM pets WHERE adoption_state <> 1 or adoption_state is null and user_id <> :n';
    $id = $_SESSION["id_usuario"];
    $query =  'SELECT * FROM pets WHERE user_id <> :id and adoption_state <> 1 or adoption_state is null LIMIT :inicio, :fim';
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":inicio", $inicio, PDO::PARAM_INT);
    $stmt->bindParam(":fim", $total_reg, PDO::PARAM_INT);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $limite = $stmt->fetchAll(PDO:: FETCH_OBJ);

    $tr = $qtd; // verifica o número total de registros
    $tp = $tr / $total_reg; // verifica o número total de páginas
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Adotar Pet</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" 
	      rel="stylesheet" id="bootstrap-css">
        <style type="text/css">
           .circle-image {
		      display: inline-block;
		      border-radius: 50%;
		      overflow: hidden;
		      width: 110px;
		      height: 110px;
		    }
	    	.circle-image img {
		      width: 100%;
		      height: 100%;
		      object-fit:cover;
		    }
        </style>
         <link
            href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700"
            rel="stylesheet"
            type="text/css"
          />
          <script
            src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"
            crossorigin="anonymous"
          ></script>
    </head>
    <body>
  <div class="container">
  <div class="row">
      <div class="col-xs-6 .col-sm-4">
          <div class="panel">
            <div class="painel-heading">
                <h1>Adotar Pet</h1>
            </div>
            <div class="panel-body">
                 <?php
                   foreach ($limite as $valor) {
                   $photo = $valor->photo; 
                ?>
                <table class="table table-user-information">
                  <tbody>
                      <tr>
                        <?php
                          echo "<span class = 'circle-image'>
                          <img src='$photo'/></span><br/><br/>";
                        ?>
                        <td>Nome</td>
                        <td>Descrição</td>
                        <td>Tipo</td>
                      </tr> 
                      <tr>
                        <td>
                          <?php
                            echo "" . $valor->name . "<br>";?>
                        </td>
                        <td>
                          <?php
                            echo "" . $valor->description . "<br>";?>
                        </td>
                        <td>
                          <?php
                          echo "" . $valor->type . "<br>";?>
                        </td>
                      </tr>
                      <form action="./adotar.php" method="POST">
                      <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <input type="radio" value="<?php echo $valor->id;?>" name="type"> Selecionar</input>
                      </div>
                      </br></br>
                    <?php
                      }
                    ?>
            </tbody>
          </table>
          </br>
          <button type="submit" class="btn btn-pet">adotar</button>
          </br>
          </form>
         <?php echo "Pagina " . $pc . "<br>"; ?>
         <?php 
          // agora vamos criar os botões "Anterior e próximo"
          $anterior = $pc -1;
          $proximo = $pc +1;
          if ($pc>1) {
          echo " <a href='?pagina=$anterior'><- Anterior</a><br> ";
          }
          echo "|";
          if ($pc<$tp) {
          echo " <a href='?pagina=$proximo'>Próxima -></a><br>";
          }

          $a = "./data.php";
        ?>
         <a class="link" href="../signin/data.php">
        <i class="fas fa-arrow-left"></i>
        Voltar
        </a>
      </div>
          </div>
      </div>
   </div>
</div> 
</body>
</html>

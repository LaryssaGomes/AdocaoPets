<!DOCTYPE html>
<?php 
  session_start();

  if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["nome_usuario"])){
    header("Location:../home/index.html");
    exit;
  }

  $id = $_POST["type"];
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../css/global.css" rel="stylesheet" />
    <link href="signup-styles.css" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700"
      rel="stylesheet"
      type="text/css"
    />
    <script
      src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"
      crossorigin="anonymous"
    ></script>
    <title>Editar Pet</title>
  </head>
  <body>
    <div id="signup">
      <main>
        <h1>Adote.</h1>
        <form
          action="../../controllers/EditPetRouter.php"
          method="POST"
          enctype="multipart/form-data"
        >
          <div class="input-block">
            <label for="photo">Foto do pet:</label>
            <input type="file" name="photo" id="photo" />
          </div>
          <div class="input-block">
            <label for="name">Nome do pet:</label>
            <input type="text" placeholder="Doguinho" name="name" id="name" />
          </div>
          <div class="input-block">
            <label for="description">Descrição:</label>
            <input
              type="text"
              placeholder="Fale sobre ele"
              name="description"
              id="description"
            />
          </div>
          <div class="input-block">
            <label for="type">Tipo:</label>
            <select name="type" id="type">
              <option value="">Selecione um tipo</option>
              <option value="dog">Doguinho</option>
              <option value="cat">Gatinho</option>
              <option value="bird">Passarinho</option>
            </select>
          </div>
          <div class="input-block">
          <input type="checkbox" value="<?php echo $id;?>" name="id"> aceitar edição de dados</input>
          </div>
          <button class="form-btn" type="submit">Salvar</button>
        </form>
        <!--<a class="link" href="../home">-->
        <a class="link" href="../signin/data.php">
          <i class="fas fa-arrow-left"></i>
          Voltar
        </a>
      </main>
      <aside></aside>
    </div>
  </body>
</html>

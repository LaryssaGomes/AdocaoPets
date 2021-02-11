<!DOCTYPE html>
<?php
  require_once "./verifica.php";
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../css/global.css" rel="stylesheet" />
    <link href="sign-styles.css" rel="stylesheet" /><!--Alterado a palavra sinup para sign-->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700"
      rel="stylesheet"
      type="text/css"
    />
    <script
      src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"
      crossorigin="anonymous"
    ></script>
    <title>Cadastre-se</title>
  </head>
  <body>
    <div id="signup">
      <main>
        <h1>Adote.</h1>
        <form
          action="./editar.php"
          method="POST"
          enctype="multipart/form-data"
        >
          <!--<div class="input-block">
            <label for="photo">Sua melhor foto:</label>
            <input type="file" name="photo" id="photo" />
          </div>-->
          <div class="input-block">
            <label for="name">Seu nome:</label>
            <input
              type="text"
              placeholder="Fulano de tal"
              name="name"
              id="name"
            />
          </div>
          <div class="input-block">
            <label for="email">Seu e-mail:</label>
            <input placeholder="fulano@gmail.com" name="email" id="email" />
          </div>
          <div class="input-block">
            <label for="birthDate">Data do seu nascimento:</label>
            <input type="date" name="birthDate" id="birthDate" />
          </div>
          <div class="input-block">
            <label for="address">Seu endereço:</label>
            <input
              type="text"
              placeholder="Sua rua e cidade"
              name="address"
              id="address"
            />
          </div>
          <div class="input-block">
            <label for="password">Senha:</label>
            <input
              type="password"
              placeholder="********"
              name="password"
              id="password"
            />
          </div>
          <button class="form-btn" type="submit">Salvar</button>
        </form>
        <a class="link" href="../home">
          <i class="fas fa-arrow-left"></i>
          Voltar
        </a>
      </main>
      <aside></aside>
    </div>
  </body>
</html>

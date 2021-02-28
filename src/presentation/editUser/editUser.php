<!DOCTYPE html>
<?php
  session_start();

  if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["nome_usuario"])){
    header("Location: ../../home/index.html");
    exit;
  }
?>
<html>
  <head>
    	<meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet"
       id="bootstrap-css">
  	   <title>Adote. - adoção de animais</title>
  </head>
  <body>
      <div class="container bootstrap snippet">
        <div class="row">
    		  <div class="col-sm-10">
            <h1>Dados</h1>
          </div>
        </div>
        <div class="row">
    		  <!--<div class="col-sm-3">
            <div class="text-center">
          	  <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
          		<h6>Carregue outra foto...</h6>
          		<input type="file" class="text-center center-block file-upload">
        		</div>
          </div>-->
          <div class="col-sm-9">
        	 <div class="tab-content">
              <div class="tab-pane active" id="home">

                <form 
                  class="form" action="../../controllers/EditUserRouter.php"
                  method="post" 
                  enctype="multipart/form-data" 
                  id="registrationForm"
                  >

                  <div class="input-block">
                    <label for="photo">Sua melhor foto:</label>
                    <input type="file" name="photo" id="photo" />
                  </div>
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
                  <div class="input-block">
                    <label for="password2">Confirme a senha:</label>
                    <input
                      type="password"
                      placeholder="********"
                      name="password2"
                      id="password2"
                    />
                  </div>
                  <button class="form-btn" type="submit">Salvar</button>
                </form>
                <a class="link" href="../signin/data.php">
                  <i class="fas fa-arrow-left"></i>
                  Voltar
                </a>
              </div>
            </div>
  		    </div>
        </div>                                                   
  </body>
</html>
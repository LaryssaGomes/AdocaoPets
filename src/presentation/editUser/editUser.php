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
          </div>--->
          <div class="col-sm-9">
        	 <div class="tab-content">
              <div class="tab-pane active" id="home">

                <form class="form" action="../../controllers/EditUserRouter.php" method="post" id="registrationForm">

                  <div class="form-group">
                    <div class="col-xs-6">
                      <label for="first_name"><h4>Nome</h4></label>
                      <input type="text" class="form-control" name="name" id="first_name" placeholder="Fulano">
                    </div>
                  </div>
         
                  <div class="form-group">
                    <div class="col-xs-6">
                      <label for="email"><h4>Email</h4></label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="fulanodetal@gmail.com" title="enter your email.">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-xs-6">
                      <label for="birthDate">Data do seu nascimento:</label>
                      <input type="date" name="birthDate" id="birthDate" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-xs-6">
                      <label for="adress"><h4>Endereço</h4></label>
                        <input type="text" class="form-control" name="address" id="adress" placeholder="Rua, Número, Bairro, Cidade, Estado">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-xs-6">
                      <label for="password"><h4>Senha</h4></label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="********">
                    </div>
                  </div>

                  <div class="form-group">  
                    <div class="col-xs-6">
                      <label for="password2"><h4>Confirme a senha</h4></label>
                        <input type="password" class="form-control" name="password2" id="password2" placeholder="********">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-xs-12">
                      <br>
                      <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign">
                      </i> Salvar</button>
                    </div>
                  </div>
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
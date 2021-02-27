<?php
    # http://localhost/AdocaoPets/src/presentation/signin/teste.php
    session_start();

    ini_set("display_errors", 1);

    /*define{'SERVER', 'localhost'};
    define{'BDNAME', 'pets'};
    define{'USER', 'root'};
    define{'PASSWORD', ''};*/

    try{
      $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8");
      $db = new PDO("mysql:host=localhost; dbname=pets", "root", "laryssa", $opcoes);

      $email = isset($_POST["email"]) ? $_POST["email"] : null;
      $password = isset($_POST["password"]) ? md5(trim($_POST["password"])) : null;

      if (empty($email) || empty($password)) {
        header('Location: /AdocaoPets/src/presentation/signin/index.html');
        
      }

      $sql = "SELECT id, name, email, password FROM users WHERE email = :email";
      $stm = $db->prepare($sql);
      $stm->bindValue(":email", $email);
      $stm->execute();
      $data = $stm->fetch(PDO::FETCH_OBJ); # PDO::FETCH_OBJ instancia a consulta como objeto para poder apresenta-la por meio de uma consulta a objetos.

      $email_user = $data->email;
      $password_user = $data->password;
      

      if($email_user == $email and $password_user == $password){
        $_SESSION["id_usuario"]= $data->id;
		    $_SESSION["nome_usuario"] = stripslashes($data->name);
        header('Location: /AdocaoPets/src/presentation/signin/data.php');
        # exit;
        
      }
      else{
        header('Location: /AdocaoPets/src/presentation/signin/index.html');
      
      }

    }catch(PDOException $erro){

      echo "Mensagem de erro: " . $erro->getMessage() . "<br>";
      echo "Endereço do arquivo: " . $erro->getFile() . "<br>";
      echo "Linha do erro: " . $erro->getLine() . "<br>";
    }


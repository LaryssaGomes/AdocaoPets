<?php
  require_once dirname(__FILE__)."/../domain/IConn.php";

  class Conn implements IConn {
    private $host;
    private $dbname;
    private $user;
    private $password = '';
    
    public function __construct($host = 'localhost', $dbname = 'pets', $user = 'root', $password = '' ){
      $this->host = $host;
      $this->dbname = $dbname;
      $this->user = $user;
      $this->password = '';
    }
    
    public function connect(){
      try{
        return new \PDO(
          'mysql:host='.$this->host.';dbname='.$this->dbname,
          $this->user,
          $this->password
        );
        
      }catch(PDOException $e){
        echo 'Error! Message: '.$e->getMessage()."Code".$e->getCode();
        exit;
      }
    }
  }
?>
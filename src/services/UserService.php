<?php
  require_once dirname(__FILE__)."/../domain/IConn.php";
  require_once dirname(__FILE__)."/../domain/IUser.php";
  // require_once "../database/Conn.php";

  // $db = new Conn("localhost","pets","root", "");
  // $db->connect();

  class UserService {
    private $db;
    private $user;
    // private $db = new Conn("localhost","pets","root", "");
    
    public function __construct(IConn $db, IUser $user) {
      $this->db = $db->connect();
      $this->user = $user;
    }

    public function save() {
      try {
        $query = "insert into users (`name`,`birthdate`,`email`,`photo`,`address`,`password`)
              VALUES (:name,:birthdate,:email,:photo,:address,:password)"; # adicionado
    
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":name", $this->user->getName());
        $stmt->bindValue(":birthdate", $this->user->getBirthDate());
        $stmt->bindValue(":email", $this->user->getEmail());
        $stmt->bindValue(":photo", $this->user->getPhoto());
        $stmt->bindValue(":address", $this->user->getAddress());
        $stmt->bindValue(":password", $this->user->getPassword()); # adicionado
        $stmt->execute();

        return $this->db->lastInsertId();
      } catch(PDOException $e) {
        echo 'Error! Message: '.$e->getMessage()."Code".$e->getCode();
        exit;
      } 
    }
    
    public function delete(){
      $query = "DELETE FROM users WHERE `id`=:id";
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(":id", $this->user->getId());
      $ret = $stmt->execute();
      return $ret;
    }
    
    public function update(){
      $query = "update `users` set `name`=?, `birthdate`=? ,`email`=?, `photo`=?, `address`=?, `password`=?  where `id`=?";
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(1,$this->user->getName());
      $stmt->bindValue(2,$this->user->getBirthDate());
      $stmt->bindValue(3,$this->user->getEmail());
      $stmt->bindValue(4,$this->user->getPhoto());
      $stmt->bindValue(5,$this->user->getAddress());
      $stmt->bindValue(6,$this->user->getPassword()); # adicionado
      $stmt->bindValue(7,$this->user->getId());
      $ret = $stmt->execute();
      return $ret;
    }

    public function list(){
      $query = "select * from users";
      $stmt = $this->db->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll();
    }
    
    public function find($id){
      $query = "select * from users where `id`=:id";
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(":id",$id);
      $stmt->execute();
      return $stmt->fetch(\PDO::FETCH_ASSOC);
  }
  }
?>
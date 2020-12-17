<?php
  require_once "../domain/IConn.php";
  require_once "../domain/IUser.php";

  class UserService {
    private $db;
    private $user;
    
    public function __construct(IConn $db, IUser $user){
      $this->db = $db->connect();
      $this->user = $user;
    }

    public function save() {
      $query = "insert into users (`name`,`birthdate`,`email`,`photo`,`address`) 
            VALUES (:name,:birthdate,:email,:photo,:address)";
  
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(":name", $this->user->getName());
      $stmt->bindValue(":birthdate", $this->user->getBirthDate());
      $stmt->bindValue(":email", $this->user->getEmail());
      $stmt->bindValue(":photo", $this->user->getPhoto());
      $stmt->bindValue(":address", $this->user->getAddress());
      $stmt->execute();

      return $this->db->lastInsertId();
    }
    
    public function delete($id){
      $query = "delete from users where `id`=:id";
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(":id",$id);
      $ret = $stmt->execute();
      return $ret;
    }
    
    public function update(){
      $query = "update `users` set `name`=?, `birthdate`=? ,`email`=? , `photo`=?, `address`=?  where `id`=?";
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(1,$this->user->getName());
      $stmt->bindValue(2,$this->user->getBirthDate());
      $stmt->bindValue(3,$this->user->getEmail());
      $stmt->bindValue(4,$this->user->getPhoto());
      $stmt->bindValue(5,$this->user->getAddress());
      $stmt->bindValue(6,$this->user->getId());
      $ret = $stmt->execute();
      return $ret;
    }
    public function list(){
      $query = "select * from users";
      $stmt = $this->db->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll();
    }
  }
?>
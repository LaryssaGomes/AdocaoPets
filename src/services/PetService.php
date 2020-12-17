<?php
  require_once "../domain/IConn.php";
  require_once "../domain/IPet.php";

  class PetService {
    private $db;
    private $pet;
    
    public function __construct(IConn $db, IPet $pet){
      $this->db = $db->connect();
      $this->pet = $pet;
    }
    
    public function save(){
      $query = "insert into pets (`photo`,`name`,`description`,`type`,`user_id`) VALUES (:photo,:name,:description,:type,:user_id)";
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(":photo", $this->pet->getPhoto());
      $stmt->bindValue(":name", $this->pet->getName());
      $stmt->bindValue(":description", $this->pet->getDescription());
      $stmt->bindValue(":type", $this->pet->getType());
      $stmt->bindValue(":user_id", $this->pet->getUserId());
      $stmt->execute();

      return $this->db->lastInsertId();
    }

    public function delete($id){
      $query = "delete from pets where `id`=:id";
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(":id",$id);
      $ret = $stmt->execute();
      return $ret;
    }
    
    public function update(){
      $query = "update `pets` set `photo`=?, `name`=?, `description`=? ,`type`=? , `user_id`=? where `id`=?";
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(1,$this->pet->getPhoto());
      $stmt->bindValue(2,$this->pet->getName());
      $stmt->bindValue(3,$this->pet->getDescription());
      $stmt->bindValue(4,$this->pet->getType());
      $stmt->bindValue(5,$this->pet->getUserId());
      $stmt->bindValue(6,$this->pet->getId());
      $ret = $stmt->execute();
      return $ret;
    }

    public function list(){
      $query = "select * from pets";
      $stmt = $this->db->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll();
    }
  }
?>
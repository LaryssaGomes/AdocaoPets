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
  }
?>
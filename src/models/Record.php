<?php
  require_once "../../domain/IRecord.php";
  
  class Record implements IRecord {
    private $id;
    private $userId;
    private $petId;
 
    
    public function getId(){
      return $this->id;
    }
    
    public function setId($id) {
      $this->id = $id;
    }

    public function getUserId() {
      return $this->userId;
    }
      
    public function setUserId($userId) {
      $this->userId = $userId;
    }
    public function getPetId() {
      return $this->petId;
    }
    public function setPetId($petId) {
      $this->petId = $petId;
    }

  }
?>
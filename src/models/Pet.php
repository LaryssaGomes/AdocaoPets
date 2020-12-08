<?php
  require_once "domain/IPet.php";
  
  class Pet implements IPet {
    private $id;
    private $photo;
    private $name;
    private $description;
    private $type;
    private $userId;
    
    public function getId(){
      return $this->id;
    }
    
    public function setId($id) {
      $this->id = $id;
    }
    
    public function getPhoto(){
      return $this->photo;
    }
    
    public function setPhoto($photo) {
      $this->photo = $photo;
    }
    
    public function getName() {
      return $this->name;
    }
    
    public function setName($name) {
      $this->name = $name;
    }
    
    public function getDescription() {
      return $this->description;
    }
    
    public function setDescription($description) {
      $this->description = $description;
    }
    
    public function getType() {
      return $this->type;
    }
    
    public function setType($type) {
      $this->type = $type;
    }

    public function getUserId() {
      return $this->userId;
    }
    
    public function setUserId($userId) {
      $this->userId = $userId;
    }
  }
?>
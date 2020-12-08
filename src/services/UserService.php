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
  }
?>
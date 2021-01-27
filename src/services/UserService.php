<?php
  require_once "../domain/IConn.php";
  require_once "../domain/IUser.php";
  require_once "../database/Conn.php";

  $db = new Conn("localhost","pets","root", "");
  $db->connect();

  class UserService {
    // private $db;
    private $user;
    // private $db = new Conn("localhost","pets","root", "");
    
    public function __construct(IUser $user) {
      // $this->db = $db->connect();
      $this->user = $user;
    }

    public function save() {
      try {
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
      } catch(PDOException $e) {
        echo 'Error! Message: '.$e->getMessage()."Code".$e->getCode();
        exit;
      } 
    }
  }
?>
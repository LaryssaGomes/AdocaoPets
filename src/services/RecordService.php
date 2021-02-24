<?php
  require_once dirname(__FILE__)."/../domain/IConn.php";
  require_once dirname(__FILE__)."/../controllers/insertRecord.php";
  require_once "../../models/Record.php";
  require_once "../../database/Conn.php";
  // require_once "../database/Conn.php";

  // $db = new Conn("localhost","pets","root", "");
  // $db->connect();

  class RecordService {
    private $db;
    public $record;
    // private $db = new Conn("localhost","pets","root", "");
    
    public function __construct( Conn $db, $record) {
      $this->db = $db->connect();
      $this->record = $record;
    }
    public function save(){
        
      $query = "insert into records (`pet_id`,`user_id`) VALUES (:pet_id,:user_id)";
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(":pet_id", $this->record->getPetId());
      $stmt->bindValue(":user_id", $this->record->getUserId());
      $stmt->execute();

      return $this->db->lastInsertId();
    }
    public function list(){
      $query = "select * FROM records ";
    }

}
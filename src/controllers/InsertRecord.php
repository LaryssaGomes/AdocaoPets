<?php
require_once "../../database/Conn.php";
require_once "../../models/Record.php";
require_once "../../services/RecordService.php";

class InsertRecord {
    public $record;
    
    public function __construct (Record $record) {
        $this->record = $record;
    }
    public function get($userId, $petId, Conn $db) {

        $this->record->setUserId($userId);
        $this->record->setPetId($petId);
        
        $service = new RecordService($db, $this->record);
        $service->save();
    }

}


//$service = new RecordService($db, $record);
//$service->save();
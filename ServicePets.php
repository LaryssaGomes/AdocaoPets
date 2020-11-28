<?php
class ServicePets{

    private $db;
    private $pets;

    public function __construct(IConn $db ,IPets $pets){
        $this->db = $db->connect();
        $this->pets = $pets;
    }


    public function save(){
        $query = "insert into pets (`foto`,`nome`,`descricao`,`tipo`) VALUES (:foto,:nome,:descricao,:tipo)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":foto",$this->pets->getFoto());
        $stmt->bindValue(":nome",$this->pets->getNome());
        $stmt->bindValue(":descricao",$this->pets->getDescricao());
        $stmt->bindValue(":tipo",$this->pets->getTipo());
        $stmt->execute();
        return $this->db->lastInsertId();
    }
}
?>
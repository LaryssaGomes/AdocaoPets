<?php
class ServiceUsuario{

    private $db;
    private $usuario;

    public function __construct(IConn $db ,IUsuario $usuario){
        $this->db = $db->connect();
        $this->usuario = $usuario;
    }


    public function save(){
        $query = "insert into usuario (`) VALUES ()";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":foto",$this->usuario->getFoto());
        
        $stmt->execute();
        return $this->db->lastInsertId();
    }
}
?>
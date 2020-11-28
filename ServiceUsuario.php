<?php
class ServiceUsuario{

    private $db;
    private $usuario;

    public function __construct(IConn $db ,IUsuario $usuario){
        $this->db = $db->connect();
        $this->usuario = $usuario;
    }


    public function save(){
        $query = "insert into usuario (`nome`,`datadenascimento`,`email`,`foto`,`endereco`) VALUES (:nome,:datadenascimento,:email,:foto,:endereco)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":nome",$this->usuario->getNome());
        $stmt->bindValue(":datadenascimento",$this->usuario->getDataDeNascimento());
        $stmt->bindValue(":email",$this->usuario->getEmail());
        $stmt->bindValue(":foto",$this->usuario->getFoto());
        $stmt->bindValue(":endereco",$this->usuario->getEndereco());
        $stmt->execute();
        return $this->db->lastInsertId();
    }
}
?>
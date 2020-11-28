<?php
class Pets implements IPets{
    private $id;
    private $foto;
    private $nome;
    private $descricao;
    private $tipo;

    public function getId(){
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    public function getFoto(){
        return $this->foto;
    }
    public function setFoto($foto) {
        $this->foto = $foto;
        return $this;
    }
    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }
    public function getDescricao() {
        return $this->descricao;
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }
    public function getTipo() {
        return $this->tipo;
    }
    public function setTipo($tipo) {
        $this->tipo = $tipo;
        return $this;
    }
}
?>
<?php
class Usuario implements IUsuario{
    private $id;
    private $nome;
    private $datadenascimento;
    private $email;
    private $foto;
    private $endereco;

    public function getId(){
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }
    public function getDataDeNascimento() {
        return $this->datadenascimento;
    }
    public function setDataDeNascimento($datadenascimento) {
        $this->datadenascimento = $datadenascimento;
        return $this;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }
    public function getFoto(){
        return $this->foto;
    }
    public function setFoto($foto) {
        $this->foto = $foto;
        return $this;
    }
    public function getEndereco() {
        return $this->endereco;
    }
    public function setEndereco($endereco) {
        $this->endereco = $endereco;
        return $this;
    }
  
}
?>
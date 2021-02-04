<?php
  require_once dirname(__FILE__)."/../domain/IUser.php";

  class User implements IUser {
    private $id;
    private $name;
    private $birthDate;
    private $email;
    private $photo;
    private $address;
    private $password; # adicionado
    
    public function getId(){
      return $this->id;
    }
    
    public function setId($id) {
      $this->id = $id;
    }
    
    public function getName() {
      return $this->name;
    }
    
    public function setName($name) {
      $this->name = $name;
    }
    
    public function getBirthDate() {
      return $this->birthDate;
    }
    
    public function setBirthDate($birthDate) {
      $this->birthDate = $birthDate;
    }
    
    public function getEmail() {
      return $this->email;
    }
    
    public function setEmail($email) {
      $this->email = $email;
    }
    
    public function getPhoto(){
      return $this->photo;
    }
    
    public function setPhoto($photo) {
      $this->photo = $photo;
    }
    
    public function getAddress() {
      return $this->address;
    }
    
    public function setAddress($address) {
      $this->address = $address;
    }
    public function getPassword() {
      return $this->password;
    } # adicionado
    
    public function setPassword($password) {
      $this->password = $password;
    } # adicionado
  }
?>
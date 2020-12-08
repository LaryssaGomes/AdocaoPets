<?php
  interface IUser {
    public function getId();
    public function setId($id);
    public function getName();
    public function setName($name);
    public function getBirthDate();
    public function setBirthDate($birthDate);
    public function getEmail();
    public function setEmail($email);
    public function getPhoto();
    public function setPhoto($photo);
    public function getAddress();
    public function setAddress($address);
  }
?>
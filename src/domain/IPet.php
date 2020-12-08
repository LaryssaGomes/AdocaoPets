<?php
  interface IPet {
    public function getId();
    public function setId($id);
    public function getPhoto();
    public function setPhoto($photo);
    public function getName();
    public function setName($name);
    public function getDescription();
    public function setDescription($description);
    public function getType();
    public function setType($type);
    public function getUserId();
    public function setUserId($userId);
  }
?>
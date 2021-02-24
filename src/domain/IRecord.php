<?php
  interface IRecord {
    public function getId();
    public function setId($id);
    public function getUserId();
    public function setUserId($userId);
    public function getPetId();
    public function setPetId($petId);
  }
?>
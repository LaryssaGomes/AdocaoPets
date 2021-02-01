<?php
  interface IUserController {
    public function insert();
    public function find($id);
    public function update($id);
    public function delete($id);
    public function findAll();
  }
?>
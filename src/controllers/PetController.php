<?php
  require_once dirname(__FILE__)."/../database/Conn.php";
  require_once dirname(__FILE__)."/../models/Pet.php";
  require_once dirname(__FILE__)."/../services/PetService.php";
  require_once dirname(__FILE__)."/../services/ImageUpload.php";
  require_once dirname(__FILE__)."/../helpers/helpers.php";
  require_once dirname(__FILE__)."/../domain/IPetController.php";

  session_start();

  class PetController {
    public function insert() {
      $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8");
      $db = new PDO("mysql:host=localhost; dbname=pets", "root", "", $opcoes);

      $email = $_POST["userEmail"];

      $query = "SELECT id FROM users WHERE email=:email";
      $stmt = $db->prepare($query);
      $stmt->bindValue(":email", $email);
      $stmt->execute();
      $id = $stmt->fetch(PDO::FETCH_OBJ);

      $name = $_POST['name'];
      $folderUsers = '../../tmp/pets/';
      $imagePath = upload($folderUsers, 'pets');
      $description = $_POST['description'];
      $type = $_POST['type'];
      $userId = $id->id;
  
      if ($imagePath === '' || empty($name) || empty($description) || empty($type) || empty($userId)) {
        // echo 'Preencha todos os dados.';
        redirect("/failure");
      } else {
        $pet = new Pet;
        $pet->setPhoto($imagePath);
        $pet->setName($name);
        $pet->setDescription($description);
        $pet->setType($type);
        $pet->setUserId($userId);
    
        $service = new PetService(new Conn("localhost","pets","root", ""), $pet);
        $petId = $service->save();
        redirect("/success/registerPet.html");
      }
    }

    public function update($id) {
      $name = $_POST['name'];
      $folderUsers = '../../tmp/pets/';
      $imagePath = upload($folderUsers, 'pets');
      $description = $_POST['description'];
      $type = $_POST['type'];
      //$userId = $_POST['userId'];
      $id = $_POST['id'];
  
      if (empty($name) || empty($description) || empty($type) || empty($id)) {
        // echo 'Preencha todos os dados.';
        redirect("/failure");
      } else {
        $pet = new Pet;
        $pet->setPhoto($imagePath);
        $pet->setName($name);
        $pet->setDescription($description);
        $pet->setType($type);
        //$pet->setUserId($userId);
        $pet->setId($id);
    
        $service = new PetService(new Conn("localhost","pets","root", ""), $pet);
        $petId = $service->update();
        redirect("/success/registerPet.html");
      }
    }
    public function delete($id){
      if(empty($id)){
        redirect("/failure");
      }else{
        $pet = new Pet;
        $pet->setId($id);

        $service = new PetService(new Conn("localhost","pets","root", ""), $pet);
        $petId = $service->delete();
        redirect("/success/deletePet.html");
      }
    }
  }
  
?>
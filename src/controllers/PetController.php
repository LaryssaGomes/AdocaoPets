<?php
    require_once dirname(__FILE__)."/../database/Conn.php";
    require_once dirname(__FILE__)."/../models/Pet.php";
    require_once dirname(__FILE__)."/../services/PetService.php";
    require_once dirname(__FILE__)."/../services/ImageUpload.php";
    require_once dirname(__FILE__)."/../helpers/helpers.php";
    require_once dirname(__FILE__)."/../domain/IPetController.php";

    class PetController {
        public function insert() { //cadastro de pets 
            $folderUsers = '../../tmp/users/';
            $imagePath = upload($folderUsers, 'users');
            $name = $_POST['name'];
            $description = $_POST['description'];
            $type = $_POST['type'];
            $userId = $_POST['userId'];

            if ($imagePath === '' || empty($name) || empty($description) || empty($type) || empty($userId)) {
                redirect("/failure");
              } else {
                $pet = new Pet();
                $pet->setName($name);
                $pet->setDescription($description);
                $pet->setType($type);
                $pet->setPhoto($imagePath);
                $pet->setUserId($userId);
            
                $service = new PetService(new Conn("localhost","pets","root", ""), $pet);
                $userId = $service->save();
                redirect("/success");
              }
        }

    }
?>
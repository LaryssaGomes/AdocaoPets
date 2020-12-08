<?php
  function upload() {
    $extensions = array("png", "jpeg", "jpg");
    $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

    if (in_array($ext, $extensions)) {
      $folder = "../tmp/";
      $tmp = $_FILES['photo']['tmp_name'];
      $newName = uniqid().".$ext";
  
      if (move_uploaded_file($tmp, $folder.$newName)):
        $imagePath = "http://localhost/pets/tmp/".$newName; 
      else: 
        $imagePath = '';
      endif;
    } else {
      $imagePath = '';
    } 
  
    return $imagePath;
  }
?>
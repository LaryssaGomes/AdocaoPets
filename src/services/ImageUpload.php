<?php

  function upload($folder, $entity) {
    $extensions = array("png", "jpeg", "jpg");
    $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

    if (in_array($ext, $extensions)) {
      $tmp = $_FILES['photo']['tmp_name'];
      $newName = uniqid().".$ext";

      if (move_uploaded_file($tmp, $folder.$newName)):
        $imagePath = "http://localhost/AdocaoPets/tmp/".$entity."/".$newName; 
      else:
        $imagePath = '';
      endif;
    } else {
      $imagePath = '';
    } 

    return $imagePath;
  }
?>
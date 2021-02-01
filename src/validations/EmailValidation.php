<?php
  // Define uma função que poderá ser usada para validar e-mails usando regexp
  function emailValidation($email) {
    $conta = "/^[a-zA-Z0-9\._-]+@";
    $dominio = "[a-zA-Z0-9\._-]+.[.]";
    $extensao = "([a-zA-Z]{2,4})$/";
    $pattern = $conta . $dominio . $extensao;

    if (preg_match($pattern, $email)) {
      return true;
    } else {
      return false;
    }
  }
?>
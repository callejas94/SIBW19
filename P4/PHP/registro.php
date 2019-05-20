<?php

  require_once 'bd.php';
  require_once 'validation.php';


//Variables para el registro del usuario
$username = $password = $email = $nombre = $permiso = "";
$username_err = $password_err = $email_err = $nombre_err = $permiso_err = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(empty(Input::validateStr($_POST["username"]))){
    $username_err = "Introduzca nombre de usuario";
  } else{
    $username = Input::validateStr($_POST["username"]);
  }

  if(empty(Input::validateStr($_POST["password"]))){
      $password_err = "Introduzca su contraseña";
  } else{
      $password = Input::validateStr($_POST["password"]);
  }

  if(empty(Input::validateEmail($_POST["email"]))){
      $email_err = "Introduzca su email";
  } else{
      $email = Input::validateEmail($_POST["email"]);
  }

  if(empty(Input::validateStr($_POST["nombre"]))){
      $nombre_err = "Introduzca su nombre";
  } else{
      $nombre = Input::validateStr($_POST["nombre"]);
  }
  if(Input::validateInt($_POST["permiso"]) < 0 && Input::validateInt($_POST["permiso"]) > 4){
      $permiso_err = "Introduzca su permiso";
  } else{
      $permiso = Input::validateInt($_POST["permiso"]);
  }

  if(empty($username_err) && empty($password_err) && empty($email_err) && empty($nombre_err) && empty($permiso_err)){
    registroUsuario($username, $password, $email, $nombre, $permiso);
    header('Location: loginScreen');
  }
  else{
    echo $username_err . " " . $password_err . " " . $email_err . " " . $nombre_err . " " . $permiso_err;
  }
}


 ?>

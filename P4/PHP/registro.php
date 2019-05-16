<?php


//Variables para el registro del usuario
$username = $password = $email = $nombre = $permiso;
$username_err = $password_err = $email_err = $nombre_err = $permiso_err;

if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(empty(trim($_POST["username"]))){
    $username_err = "Introduzca nombre de usuario";
  } else{
    $username = trim($_POST["username"]);
  }

  if(empty(trim($_POST["password"]))){
      $password_err = "Introduzca su contraseña";
  } else{
      $password = trim($_POST["password"]);
  }

  if(empty(trim($_POST["email"]))){
      $email_err = "Introduzca su email";
  } else{
      $email = trim($_POST["email"]);
  }

  if(empty(trim($_POST["nombre"]))){
      $nombre_err = "Introduzca su nombre";
  } else{
      $nombre = trim($_POST["nombre"]);
  }
  if(empty(trim($_POST["permiso"]))){
      $permiso_err = "Introduzca su permiso";
  } else{
      $permiso = trim($_POST["permiso"]);
  }

  if(empty($username_err) && empty($password_err) && empty($email_err) && empty($nombre_err) && empty($permiso_err)){
    registroUsuario($username, $password, $email, $nombre, $permiso);
  }
}


 ?>

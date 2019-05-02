<?php
require_once '../vendor/autoload.php';
require_once 'bd.php';
require_once 'validation.php';


$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, [
  'debug' => true,
]);

//Debug
$twig->addExtension(new \Twig\Extension\DebugExtension());

//Iniciamos la sesión
session_start();

//Variables del usuario
$username = $password = "";
$username_err = $password_err = "";
$nombre = $email = $permisos = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

  // Comprobamos campo nickname
  if(empty(trim($_POST["username"]))){
      $username_err = "Introduzca su nombre de usuario";
  } else{
      $username = trim($_POST["username"]);
  }

  // Comprobamos campo password
  if(empty(trim($_POST["password"]))){
      $password_err = "Introduzca su contraseña";
  } else{
      $password = trim($_POST["password"]);
  }


  //Comprobamos las credenciales
  if(empty($username_err) && empty($password)){
    loginUsuario($username, $password);
  }
}


 ?>

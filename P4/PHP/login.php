<?php
require_once '../vendor/autoload.php';
require_once 'bd.php';
require_once 'validation.php';
require_once 'session.php';



$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, [
  'debug' => true,
]);

//Debug
$twig->addExtension(new \Twig\Extension\DebugExtension());


//Variables del usuario
$username = $password = "";
$username_err = $password_err = "";
$nombre = $email = $permisos = "";
$session = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

  // Comprobamos campo nickname
  if(empty(Input::validateStr($_POST["username"]))){
      $username_err = "Introduzca su nombre de usuario";
  } else{
      $username = Input::validateStr($_POST["username"]);
  }

  // Comprobamos campo password
  if(empty(Input::validateStr($_POST["password"]))){
      $password_err = "Introduzca su contraseña";
  } else{
      $password = Input::validateStr($_POST["password"]);
  }


  //Comprobamos las credenciales
  if(empty($username_err) && empty($password_err)){
    if(loginUsuario($username, $password)){
      $session = Session::getInstance();
      var_dump( $session);
      //$session.startSession();
      $session->loggedin = true;
      var_dump( $username);
      $session->username = $username;

      $session->nickname = 'Someone';
      $session->age = 18;

      var_dump( isset( $session->nickname ));
      var_dump( $session->nickname );

      echo "LAS VARIABLES\n";
      var_dump( $session);

    }
  }
}


?>

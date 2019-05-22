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

$arrayMods = array();
$nuevoUsername = $nuevaPass = $nuevoEmail = $nuevoNombre = $nuevosPermisos ="";


//Primero comprobamos los campos que hay rellenos, los que estén vacíos asumiremos que no se quieren cambiar
if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(empty(Input::validateStr($_POST["username"]))){
      $arrayMods[0] = false;
  } else{
      $nuevoUsername = Input::validateStr($_POST["username"]);
      $arrayMods[0] = true;
  }
  if(empty(Input::validateStr($_POST["password"]))){
      $arrayMods[1] = false;
  } else{
      $nuevaPass = Input::validateStr($_POST["password"]);
      $arrayMods[1] = true;
  }
  if(empty(Input::validateStr($_POST["email"]))){
      $arrayMods[2] = false;
  } else{
      $nuevoEmail = Input::validateStr($_POST["email"]);
      $arrayMods[2] = true;
  }
  if(empty(Input::validateStr($_POST["nombre"]))){
      $arrayMods[3] = false;
  } else{
      $nuevoNombre = Input::validateStr($_POST["nombre"]);
      $arrayMods[3] = true;
  }
  if(empty(Input::validateStr($_POST["permiso"])) || Input::validateStr($_POST["permiso"]) == 0){
      $arrayMods[4] = false;
  } else{
      $nuevosPermisos = Input::validateStr($_POST["permiso"]);
      $arrayMods[4] = true;
  }

  $session = Session::getInstance();

  if(cambiarDatosPersonales($arrayMods,$nuevoUsername,$nuevaPass,$nuevoEmail,$nuevoNombre,$nuevosPermisos, $session)){
    echo "Correctisimo";
    header("Location: panelDeControl");
  }
}





?>

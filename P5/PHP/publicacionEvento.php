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


$nuevoUsername = $nuevaPass = $nuevoEmail = $nuevoNombre = $nuevosPermisos ="";


//Primero comprobamos los campos que hay rellenos, los que estén vacíos asumiremos que no se quieren cambiar

  $session = Session::getInstance();

  if($session != null && ($session->permisos == 0 || $session->permisos == 1)){
    if (isset($_GET['id'])) {
      $id = Input::validateInt((int) $_GET['id']);
    }
    else {
      die('Sin id');
    }


    if(cambiarPublicacionEvento($id)){
      header('Location: /P5/panelDeControl');
    }
  }





?>

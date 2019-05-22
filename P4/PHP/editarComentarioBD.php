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

$nuevoMensaje="";


//Primero comprobamos los campos que hay rellenos, los que estén vacíos asumiremos que no se quieren cambiar
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(empty(Input::validateStr($_POST["texto"]))){
    $nuevoMensaje ="";
  } else{
    $nuevoMensaje=Input::validateStr($_POST["texto"]);
    $nuevoMensaje.=" (Comentario modificado por un moderador)";
  }

  $session = Session::getInstance();
  if(cambiarComentario($_POST["id"],$nuevoMensaje)){
    echo "Correcto";
    header('Location: panelDeControl');
  }
  else{
    echo "error al cambiar el comentario";
  }
}


?>

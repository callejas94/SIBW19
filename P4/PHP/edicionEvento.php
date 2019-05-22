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
/*
nombre
fecha
imagen
descripcion
pie
link
etiqueta
publicacion
modificacion
foto_portada
video
*/

//Primero comprobamos los campos que hay rellenos, los que estén vacíos asumiremos que no se quieren cambiar
if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(empty(Input::validateStr($_POST["nombre"]))){
      
  } else{
      $nuevoNombre = Input::validateStr($_POST["nombre"]);
      
  }
  if(empty(Input::validateStr($_POST["imagen"]))){
      
  } else{
      $nuevaImagen = Input::validateStr($_POST["imagen"]);
      
  }
  if(empty(Input::validateStr($_POST["descripcion"]))){
      
  } else{
      $nuevaDescripcion = Input::validateStr($_POST["descripcion"]);
      
  }
  if(empty(Input::validateStr($_POST["pie"]))){
      
  } else{
      $nuevoPie = Input::validateStr($_POST["pie"]);
      
  }
  if(empty(Input::validateStr($_POST["link"]))){
      
  } else{
      $nuevoLink = Input::validateStr($_POST["link"]);
      
  }
  if(empty(Input::validateStr($_POST["etiqueta"]))){
      
  } else{
      $nuevoEtiqueta = Input::validateStr($_POST["etiqueta"]);
      
  }
  if(empty(Input::validateStr($_POST["publicacion"]))){
      
  } else{
      $nuevoPublicacion = Input::validateStr($_POST["publicacion"]);
      
  }
  if(empty(Input::validateStr($_POST["foto_portada"]))){
      
  } else{
      $nuevoFotoPortada = Input::validateStr($_POST["foto_portada"]);
      
  }
  if(empty(Input::validateStr($_POST["video"]))){
      
  } else{
      $nuevoVideo = Input::validateStr($_POST["video"]);
      
  }





  $session = Session::getInstance();
  
  if(cambiarDatosPersonales($arrayMods,$nuevoUsername,$nuevaPass,$nuevoEmail,$nuevoNombre,$nuevosPermisos, $session)){
    echo "Correctisimo";
  }
}





?>

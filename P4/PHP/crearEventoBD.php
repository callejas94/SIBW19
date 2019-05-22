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

$nuevoNombre = $nuevaImagen = $nuevaDescripcion = $nuevoPie = $nuevoLink = $nuevaPublicacion = $nuevaFotoPortada = $nuevaEtiqueta = $nuevoVideo = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(empty(Input::validateStr($_POST["nombre"]))){
      die("error");
  } else{
      $nuevoNombre = Input::validateStr($_POST["nombre"]);
  }
  if(empty(Input::validateStr($_POST["imagen"]))){
      die("error");
  } else{
      $nuevaImagen = Input::validateStr($_POST["imagen"]);
  }
  if(empty(Input::validateStr($_POST["descripcion"]))){
      die("error");
  } else{
      $nuevaDescripcion = Input::validateStr($_POST["descripcion"]);
  }
  if(empty(Input::validateStr($_POST["pieFoto"]))){
      die("error");
  } else{
      $nuevoPie = Input::validateStr($_POST["pieFoto"]);
  }
  if(empty(Input::validateStr($_POST["link"]))){
      $nuevoLink="";
  } else{
      $nuevoLink = Input::validateStr($_POST["link"]);
  }
  if(empty(Input::validateStr($_POST["etiqueta"]))){
      $nuevaEtiqueta = "";
  } else{
      $nuevaEtiqueta = Input::validateStr($_POST["etiqueta"]);
  }
  if(empty(Input::validateDate($_POST["fecha"]))){
      die("error");
  } else{
      $nuevaFecha = Input::validateDate($_POST["fecha"]);
      $datetime = new DateTime();
      $nuevaPublicacion = $datetime->format('Y-m-d H:i:s');
  }
  if(empty(Input::validateStr($_POST["fotoPortada"]))){
      $nuevaFotoPortada = $nuevaImagen;
  } else{
      $nuevaFotoPortada = Input::validateStr($_POST["fotoPortada"]);
  }
  if(empty(Input::validateStr($_POST["video"]))){
      $nuevoVideo = "";
  } else{
      $nuevoVideo = Input::validateStr($_POST["video"]);
  }

  $arrayDatos = array($nuevoNombre , $nuevaFecha ,$nuevaImagen , $nuevaDescripcion , $nuevoPie , $nuevoLink , $nuevaPublicacion , $nuevaFotoPortada , $nuevaEtiqueta , $nuevoVideo);

  if(crearEvento($arrayDatos)){
    header('Location: /P4/panelDeControl');
  }else{
    echo("Error");
  }
}


?>

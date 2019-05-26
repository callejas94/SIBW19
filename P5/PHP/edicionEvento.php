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

    $nuevoNombre = $nuevaImagen = $nuevaDescripcion = $nuevoPie = $nuevoLink = $nuevaPublicacion = $nuevaFotoPortada = $nuevaEtiqueta = $nuevoVideo = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

      if(empty(Input::validateStr($_POST["nombre"]))){
          $nuevoNombre = "";
      } else{
          $nuevoNombre = Input::validateStr($_POST["nombre"]);
      }
      if(empty(Input::validateStr($_POST["imagen"]))){
          $nuevaImagen = "";
      } else{
          $nuevaImagen = Input::validateStr($_POST["imagen"]);

      }
      if(empty(Input::validateStr($_POST["descripcion"]))){
          $nuevaDescripcion = "";
      } else{
          $nuevaDescripcion = Input::validateStr($_POST["descripcion"]);

      }
      if(empty(Input::validateStr($_POST["pie"]))){
          $nuevoPie = "";
      } else{
          $nuevoPie = Input::validateStr($_POST["pie"]);

      }
      if(empty(Input::validateStr($_POST["link"]))){
          $nuevoLink = "";
      } else{
          $nuevoLink = Input::validateStr($_POST["link"]);

      }
      if(empty(Input::validateStr($_POST["etiqueta"]))){
          $nuevaEtiqueta = "";
      } else{
          $nuevaEtiqueta = Input::validateStr($_POST["etiqueta"]);

      }

      if(empty(Input::validateDate($_POST["fecha"]))){
          $nuevaFecha = "";
      } else{
          $nuevaFecha = Input::validateDate($_POST["fecha"]);

      }
      if(empty(Input::validateDate($_POST["publicacion"]))){
          $nuevaPublicacion = "";
      } else{
          $nuevaPublicacion = Input::validateDate($_POST["publicacion"]);

      }
      if(empty(Input::validateStr($_POST["foto_portada"]))){
          $nuevaFotoPortada = "";
      } else{
          $nuevaFotoPortada = Input::validateStr($_POST["foto_portada"]);

      }
      if(empty(Input::validateStr($_POST["video"]))){
          $nuevoVideo = "";
      } else{
          $nuevoVideo = Input::validateStr($_POST["video"]);
      }



      $arrayDatos = array($nuevoNombre , $nuevaFecha ,$nuevaImagen , $nuevaDescripcion , $nuevoPie , $nuevoLink , $nuevaPublicacion , $nuevaFotoPortada , $nuevaEtiqueta , $nuevoVideo);




      if(cambiarDatosEvento($arrayDatos, $id)){
        header('Location: /P5/panelDeControl');
      }
    }
  }





?>

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

  $session = Session::getInstance();

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($session->permisos == 0){
      if(empty(Input::validateStr($_POST["permisos"])) && Input::validateStr($_POST["permisos"]) != "0"){
        die("Error en nuevos permisoos");
      }else{
        $nuevosPermisos=Input::validateInt($_POST["permisos"]);
      }
      if(empty(Input::validateStr($_POST["avatar"]))){
        die("Error en avatar");
      }else{
        $avatar=Input::validateStr($_POST["avatar"]);
      }
      $antiguosPermisos=Input::validateStr($_POST["otros"]);

      if(cambiarPermisos($nuevosPermisos,$avatar,$antiguosPermisos)){
        echo "Correcto";
        header('Location: panelDeControl');
      }else{
        echo "Error en cambiar permisos";
      }
    }
  }


?>

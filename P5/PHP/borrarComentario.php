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

  if($session != null && ($session->permisos == 0 || $session->permisos == 2)){
    if (isset($_GET['id'])) {
      $id = Input::validateInt((int) $_GET['id']);
      if(borrarComentario($id)){
        echo "Borrado correcto";
      }

    }
    else {
      die('Sin id');
    }
    header('Location: http://localhost/P5/panelDeControl');
  }
  else{
    header('Location: error');
  }

?>

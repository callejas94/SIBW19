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

  if($session != null && ($session->permisos == 0 || $session->permisos == 1)){
    if (isset($_GET['id'])) {
      $id = Input::validateInt((int) $_GET['id']);
      $arrayEventos=getEvento($id);
      $menu=getMenu();
    }
    else {
      die('Sin id');
    }


    $template = $twig->load("editarEvento.html");
    echo $template->render(['elEvento' => $arrayEventos,'elMenu' => $menu]);
  }
  else{
    header('Location: error');
  }

?>

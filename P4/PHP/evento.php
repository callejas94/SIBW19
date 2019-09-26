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

  if (isset($_GET['id'])) {
    $id = Input::validateInt((int) $_GET['id']);
    $arrayEventos=getEvento($id);
    $comentarios=getComentariosEvento($id);
    $menu=getMenu();
    $prohibidas=getPalabrasProhibidas();
  }
  else {
    die('Sin id');
  }
  $session = Session::getInstance();

  $template = $twig->load("evento.html");
  echo $template->render(['elEvento' => $arrayEventos,'comentarios' => $comentarios, 'prohibidas' => $prohibidas, 'elMenu' => $menu, 'sesionActual' => $session->loggedin]);

?>

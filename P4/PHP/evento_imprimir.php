<?php
  require_once '../vendor/autoload.php';
  require_once 'bd.php';
  require_once 'validation.php';


  $loader = new \Twig\Loader\FilesystemLoader('../templates');
  $twig = new \Twig\Environment($loader, [
    'debug' => true,
  ]);

  //Debug
  $twig->addExtension(new \Twig\Extension\DebugExtension());

  if (isset($_GET['id'])) {
    $id = Input::validateInt((int) $_GET['id']);
    $arrayEventos=getEvento($id);
  } else {
    die('Sin id');
  }




  $template = $twig->load("evento_imprimir_especializado.html");
  echo $template->render(['elEvento' => $arrayEventos]);

?>

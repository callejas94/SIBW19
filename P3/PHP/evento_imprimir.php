<?php
  require_once '../vendor/autoload.php';
  require_once 'bd.php';


  $loader = new \Twig\Loader\FilesystemLoader('../templates');
  $twig = new \Twig\Environment($loader, [
    'debug' => true,
  ]);

  //Debug
  $twig->addExtension(new \Twig\Extension\DebugExtension());

  if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
  } else {
    die('Sin id');
  }

  $arrayEventos=getEvento($id);


  $template = $twig->load("evento_imprimir_especializado.html");
  echo $template->render(['elEvento' => $arrayEventos]);

?>

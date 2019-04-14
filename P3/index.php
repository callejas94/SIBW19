<?php
  require_once 'vendor/autoload.php';
  require_once 'PHP/bd.php';


  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader, [
    'debug' => true,
  ]);

  //Debug
  $twig->addExtension(new \Twig\Extension\DebugExtension());

  $arrayEventos=eventosGeneral();

  $template = $twig->load("principal.html");
  echo $template->render(['eventos' => $arrayEventos]);

?>

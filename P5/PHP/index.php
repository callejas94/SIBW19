<?php
  require_once '../vendor/autoload.php';
  require_once 'bd.php';


  $loader = new \Twig\Loader\FilesystemLoader('../templates');
  $twig = new \Twig\Environment($loader, [
    'debug' => true,
  ]);

  //Debug
  $twig->addExtension(new \Twig\Extension\DebugExtension());

  //Iniciamos la sesión
  session_start();

  $menu=getMenu();
  $arrayEventos=eventosGeneral();

  $template = $twig->load("principal.html");
  echo $template->render(['eventos' => $arrayEventos, 'elMenu' => $menu]);

?>

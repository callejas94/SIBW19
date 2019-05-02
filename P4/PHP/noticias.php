<?php
  require_once '../vendor/autoload.php';
  require_once 'bd.php';


  $loader = new \Twig\Loader\FilesystemLoader('../templates');
  $twig = new \Twig\Environment($loader, [
    'debug' => true,
  ]);

  //Debug
  $twig->addExtension(new \Twig\Extension\DebugExtension());


  $lasNoticias=getNoticias();
  $menu=getMenu();




  $template = $twig->load("noticias.html");
  echo $template->render(['lasNoticias' => $lasNoticias,'elMenu' => $menu]);

?>
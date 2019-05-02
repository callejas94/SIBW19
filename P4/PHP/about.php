<?php
  require_once '../vendor/autoload.php';
  require_once 'bd.php';


  $loader = new \Twig\Loader\FilesystemLoader('../templates');
  $twig = new \Twig\Environment($loader, [
    'debug' => true,
  ]);

  //Debug
  $twig->addExtension(new \Twig\Extension\DebugExtension());


  $pagina=getSobreNosotros();
  $menu=getMenu();




  $template = $twig->load("about.html");
  echo $template->render(['laPagina' => $pagina,'elMenu' => $menu]);

?>

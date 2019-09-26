<?php
  require_once '../vendor/autoload.php';
  require_once 'bd.php';
  require_once 'session.php';


  $loader = new \Twig\Loader\FilesystemLoader('../templates');
  $twig = new \Twig\Environment($loader, [
    'debug' => true,
  ]);

  //Debug
  $twig->addExtension(new \Twig\Extension\DebugExtension());

 
  $menu=getMenu();
  $session = Session::getInstance();

  if($session->loggedin){
    header('Location: panelDeControl');
  }
  else{
    $template = $twig->load("login.html");
    echo $template->render([ 'elMenu' => $menu]);
  }


?>

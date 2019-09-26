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
    $valores=array($session->username , $session->nombre, $session->email, $session->permisos);


    $template = $twig->load("panelDeControl.html");
    switch($session->permisos){
      case 3:
        echo $template->render([ 'elMenu' => $menu, 'usuario' => $valores]);
        break;
      case 2:
        $comentarios = getAllComentariosEvento();
        echo $template->render([ 'elMenu' => $menu, 'usuario' => $valores, 'comentarios' => $comentarios]);
        break;
      case 1:
        $eventos = getAllEventos();
        echo $template->render([ 'elMenu' => $menu, 'usuario' => $valores, 'eventos' => $eventos]);
        break;
      case 0:
        $comentarios = getAllComentariosEvento();
        $eventos = getAllEventos();
        $usuarios = getAllUsuarios();
        echo $template->render([ 'elMenu' => $menu, 'usuario' => $valores, 'comentarios' => $comentarios,'eventos' => $eventos, 'usuarios' => $usuarios]);
        break;
    }
  }
  else{
    header('Location: error');
  }

?>

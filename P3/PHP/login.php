<?php
  require_once 'bd.php';
  require_once 'validation.php';

  if (isset($_REQUEST['id']) && isset($_REQUEST["postear"])) {
    $id = Input::validateInt((int) $_REQUEST['id']);
    //$comment = Input::validateStr($_REQUEST["a"]);
    $comment = Input::validateStr($_REQUEST['texto']);
    $user = Input::validateStr($_REQUEST["nombreUsuario"]);
    $email = Input::validateEmail($_REQUEST["email"]);
    $elValor = postComment($id, $user, $email, "texto");
    echo '<h2>'. $elValor .'</h2>';
    header("http://localhost/P3/evento/".$id);
  }
  else{
    die('Sin id o submit'. $_REQUEST['id'] . $_REQUEST['postear']);
  }



  //Input::check($_POST["nombreUsuario"], $_POST["email"], $_POST["comment"]);

?>

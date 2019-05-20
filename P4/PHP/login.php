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


//Variables del usuario
$username = $password = "";
$username_err = $password_err = "";
$nombre = $email = $permisos = "";
$session = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

  // Comprobamos campo nickname
  if(empty(Input::validateStr($_POST["username"]))){
      $username_err = "Introduzca su nombre de usuario";
  } else{
      $username = Input::validateStr($_POST["username"]);
  }

  // Comprobamos campo password
  if(empty(Input::validateStr($_POST["password"]))){
      $password_err = "Introduzca su contraseña";
  } else{
      $password = Input::validateStr($_POST["password"]);
  }


  //Comprobamos las credenciales
  if(empty($username_err) && empty($password_err)){
    if(loginUsuario($username, $password)){
      $session = Session::getInstance();
      //var_dump( $session);
      
      //var_dump( $username);
      //$session->username = $username;

      $valores = getUsuario($username);
      //var_dump( $valores );


      //var_dump( isset( $session->nickname ));
      //var_dump( $session->nickname );

      /*
      
      0-> username, 
      1-> nombre, 
      2-> email, 
      3-> permisos

      */
      $session->loggedin = true;
      $session->username = $valores[0];
      $session->nombre = $valores[1];
      $session->email = $valores[2];
      $session->permisos = $valores[3];

      var_dump( isset( $session->loggedin ));
      var_dump( isset( $session->username ));
      var_dump( isset( $session->nombre ));
      var_dump( isset( $session->email ));
      var_dump( isset( $session->permisos ));

      var_dump( $session->loggedin );
      var_dump( $session->username );
      var_dump( $session->nombre );
      var_dump( $session->email );
      var_dump( $session->permisos );


      // QUE CUANDO ESTE LOGUEADO TIRE PARA EL PANEL DE CONTROL
      // ESTO HARIA QUE FUESE DIRECTAMENTE A : http://localhost/P4/panelDeControl
      //header('Location: panelDeControl');




      //echo "LAS VARIABLES\n";
      //var_dump( $session);

    }
  }
}


?>

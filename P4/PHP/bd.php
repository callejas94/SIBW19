<?php


      function consultar($conexion, $consulta){
				$datos=mysqli_query($conexion, $consulta);
				$datos_array=mysqli_fetch_all($datos);
        mysqli_close($conexion);
				return $datos_array;
			}

      function ponerDatos($conexion, $consulta){
        if (!$conexion || !$consulta) {
            die('No hay conexion o consulta: ' . mysqli_error());
        }
        $datos=mysqli_query($conexion, $consulta);
        if (!$datos) {
            die('No pudo insertarse: ' . mysqli_error());
        }
        mysqli_close($conexion);
        return $datos;
      }

			function conectar(){
				$conexion =  new mysqli('localhost','user', '');
				if (!$conexion) {
						die('No pudo conectarse: ' . mysqli_error());
				}
				$abreBD = mysqli_select_db ($conexion, 'wadsbd');
				return $conexion;
			}

      //Funciones SELECT
      function eventosGeneral(){
        $conexion=conectar();
        $consultaEvento="SELECT nombre,fotoPortada,id FROM eventos";
        $arrayDatos=consultar($conexion,$consultaEvento);
        return $arrayDatos;
      }

      function getAllEventos(){
        $conexion=conectar();
        $consultaEvento="SELECT nombre,fecha,imagen,descripcion,id,piefoto,link,
        etiqueta,fecha_publicacion,ultima_modificacion,fotoPortada,video FROM eventos";
        $arrayDatos=consultar($conexion,$consultaEvento);
        return $arrayDatos;
      }

      function getAllComentariosEvento(){
        $conexion=conectar();
        $consultaEvento="SELECT id,nombre,ip,email,fecha,texto FROM comentario";
        $arrayDatos=consultar($conexion,$consultaEvento);
        return $arrayDatos;
      }

      function getAllUsuarios(){
        $conexion=conectar();
        $consultaEvento="SELECT username, nombre, email, permisos FROM usuarios";
        $arrayDatos=consultar($conexion,$consultaEvento);
        return $arrayDatos;
      }

      function getEvento($id){
        $conexion=conectar();
        $consultaEvento="SELECT nombre,fecha,imagen,descripcion,id,piefoto,link,
        etiqueta,fecha_publicacion,ultima_modificacion,fotoPortada,video FROM eventos WHERE id =";
        $consultaEvento.=$id;
        $arrayDatos=consultar($conexion,$consultaEvento);
        return $arrayDatos;
      }
      function getComentariosEvento($id){
        $conexion=conectar();
        $consultaEvento="SELECT ip,nombre,email,fecha,texto FROM comentario WHERE idEvento =";
        $consultaEvento.=$id;
        $arrayDatos=consultar($conexion,$consultaEvento);
        return $arrayDatos;
      }

      function getComentario($id){
        $conexion=conectar();
        $consultaEvento="SELECT id,nombre,ip,email,fecha,texto FROM comentario WHERE id =";
        $consultaEvento.=$id;
        $arrayDatos=consultar($conexion,$consultaEvento);
        return $arrayDatos;
      }

      function getPalabrasProhibidas(){
        $conexion=conectar();
        $consultaEvento="SELECT * FROM prohibidas";
        $arrayDatos=consultar($conexion,$consultaEvento);
        return $arrayDatos;
      }
      function getMenu(){
        $conexion=conectar();
        $consultaEvento="SELECT * FROM menu ORDER BY id";
        $arrayDatos=consultar($conexion,$consultaEvento);
        return $arrayDatos;
      }

      function postComment($idEvento, $nombre, $email, $texto){
        $consultaEvento="INSERT INTO comentario (idEvento, ip, nombre, email, fecha, texto, id)"."
        VALUES (". $idEvento . ", \"127.0.0.1\",\"". $nombre ."\",\"". $email .
        "\", CURRENT_TIME(),\"". $texto."\",". "\"NULL\"".")";
        $conexion=conectar();
        $otroValor=ponerDatos($conexion, $consultaEvento);
        return $otroValor;
      }

      function getSobreNosotros(){
        $conexion=conectar();
        $consultaEvento="SELECT * FROM paginas WHERE id = 1";
        $arrayDatos=consultar($conexion,$consultaEvento);
        return $arrayDatos;
      }

      function getNoticias(){
        $conexion=conectar();
        $consultaEvento="SELECT * FROM paginas WHERE id = 2";
        $arrayDatos=consultar($conexion,$consultaEvento);
        return $arrayDatos;
      }
      function getUsuario($user){
        $conexion=conectar();
        $consultaEvento="SELECT username, nombre, email, permisos FROM usuarios WHERE username =\"";
        $consultaEvento.=$user;
        $consultaEvento.="\"";
        $arrayDatos=consultar($conexion,$consultaEvento);
        return $arrayDatos;
      }

      // function getUsuario($username){
      //   $valores = "";
      //   $nombre = $email = $permisos = "";
      //   $conexion=conectar();
      //   $sql = "SELECT username, nombre, email, permisos FROM usuarios WHERE username = ?";

      //   if($stmt = mysqli_prepare($conexion,$sql)){
      //     mysqli_stmt_bind_param($stmt, "s", $param_username);
      //     $param_username = $username;

      //     //Ejecuta la petición
      //     if(mysqli_stmt_execute($stmt)){
      //       mysqli_stmt_store_result($stmt);

      //       //printf("Number of rows: %d.\n", mysqli_stmt_num_rows($stmt));

      //       //Si el usuario existe
      //       if(mysqli_stmt_num_rows($stmt)==1){
      //         mysqli_stmt_bind_result($stmt, $username, $nombre, $email, $permisos);
      //         /*var_dump( "username -> " . $username );
      //         var_dump( "nombre -> " . $nombre );
      //         var_dump( "email -> " . $email );
      //         var_dump( "permisos -> " . $permisos );*/

      //         while (mysqli_stmt_fetch($stmt)) {
      //             printf("%s %s\n", $username, $nombre, $email, $permisos);
      //         }






      //         $valores=array($username, $nombre, $email, $permisos);
      //         var_dump( "VALORES -> ");
      //         var_dump( $valores);
      //         die( "VALORES -> " . $valores );
      //         /*var_dump($valores );
      //         var_dump("\n");*/
      //         //mysqli_stmt_bind_result($stmt, $valores);
      //         /*if(mysqli_stmt_fetch($stmt)){
      //           die( "VALORES -> " . $valores );
      //           var_dump( "VALORES -> ");
      //           var_dump($valores );

      //         }*/
      //       }
      //       else{
      //         // Username no existe
      //         echo "El usuario no existe";
      //         $username_err = "El usuario no existe";
      //       }
      //     }
      //     else{
      //       echo "Oh vaya! Qué embarazoso, prueba en otro momento";
      //     }
      //   }
      //   mysqli_stmt_close($stmt);
      //   return $valores;
      // }

      function loginUsuario($username, $password){
        $valor = false;
        $conexion=conectar();
        $sql = "SELECT username, password, nombre, email, permisos FROM usuarios WHERE username = ?";

        if($stmt = mysqli_prepare($conexion,$sql)){
          mysqli_stmt_bind_param($stmt, "s", $param_username);
          $param_username = $username;

          //Ejecuta la petición
          if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);

            //Si el usuario existe
            if(mysqli_stmt_num_rows($stmt)==1){
              mysqli_stmt_bind_result($stmt, $username, $hashed_password, $nombre, $email, $permisos);
              if(mysqli_stmt_fetch($stmt)){

                /*
                  AHORA MISMO $hashed_password ES LA CONTRASEÑA SIN PASARLE EL HASH
                */
                //echo $password . " con hash " . $hashed_password;
                /*
                  HACIENDO ESTO NO HAY CONTRASEÑA ERRONEA
                */
                if(password_verify($password, $hashed_password)){
                //if(password_verify($password, $contra)){
                  //Arrancamos la sesión
                  //echo "SESION INICIADA";
                  //session_start();

                  //Variables de sesión
                  /*$_SESSION["loggedin"] = true;
                  $_SESSION["email"] = $email;
                  $_SESSION["username"] = $username;
                  $_SESSION["permisos"] = $permisos;
                  $_SESSION["nombre"] = $nombre;*/
                  $valor = true;

                }else{
                    // Error de contraseña
                    echo "Contraseña erronea";
                    $password_err = "Contraseña erronea";
                }
              }
            } else{
              // Username no existe
              echo "El usuario no existe";
              $username_err = "El usuario no existe";
            }
          } else{
            echo "Oh vaya! Qué embarazoso, prueba en otro momento";
          }
        }
        mysqli_stmt_close($stmt);
        return $valor;
      }

      function registroUsuario($username, $password, $email, $nombre, $permiso){
        $valor = false;
        $conexion = conectar();
        $sql = "SELECT username FROM usuarios WHERE username = ?";

        if($stmt = mysqli_prepare($conexion, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;

            //Ejecuta la petición
            if(mysqli_stmt_execute($stmt)){
              mysqli_stmt_store_result($stmt);

              //Si el usuario existe
              $username_err = "";
              if(mysqli_stmt_num_rows($stmt)==1){
                $username_err = "El nombre de usuario ya existe";
                echo $username_err;
              } else{
                $username = trim($_POST["username"]);
              }
            }else{
              echo "Oh vaya! Qué embarazoso, prueba en otro momento";
            }

            echo "TODO BIEN COMPROBANDO EL USUARIO";
          }

        mysqli_stmt_close($stmt);
        //echo empty($username_err);
        if(empty($username_err)){
          /*$sql = "INSERT INTO usuarios (username,  nombre, email, password, permiso) VALUES (?, ?, ?, ?, ?)";*/
          $sql = "INSERT INTO `usuarios` (`username`, `nombre`, `email`, `password`, `permisos`) VALUES (?, ?, ?, ?, ?)";


          //echo "INSERTANDO....";
          if($stmt = mysqli_prepare($conexion, $sql)){
            mysqli_stmt_bind_param($stmt, "ssssi", $param_username, $param_nombre, $param_email, $param_password, $param_permiso);

            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_email = $email;
            $param_nombre = $nombre;
            $param_permiso = $permiso;

           // echo "EJECUTANDO LA SENTENCIA:";
            //echo mysqli_stmt_execute($stmt);

            if(mysqli_stmt_execute($stmt)){
                echo "SALIO BIEN";
                $valor = true;
            } else{

                echo "¯\_(ツ)_/¯";
            }
            mysqli_stmt_close($stmt);
          }

          echo "CERRANDO";
          mysqli_close($conexion);
          return $valor;
        }
      }



      function cambiarDatosEvento($arrayDatos, $id){
        $valor = false;
        $conexion = conectar();

        $sql = "UPDATE `eventos` SET `nombre` = ?, `fecha` = ?, `imagen` = ?, `descripcion` = ?, `piefoto` = ?, `link` = ?, `fecha_publicacion` = ?, `fotoPortada` = ?,`etiqueta` = ?, `ultima_modificacion` = CURRENT_TIME(), `video` = ? WHERE `id` = ?";
        
        var_dump($arrayDatos[1]);
        //die("HOLI");


        if($stmt = mysqli_prepare($conexion, $sql)){
          mysqli_stmt_bind_param($stmt, "ssssssssssi",$arrayDatos[0],$arrayDatos[1],$arrayDatos[2],$arrayDatos[3],$arrayDatos[4],$arrayDatos[5],$arrayDatos[6],$arrayDatos[7],$arrayDatos[8],$arrayDatos[9],$id);

          if(mysqli_stmt_execute($stmt)){
              echo "Cambio de datos evento correcto";
              $valor = true;
              //var_dump($stmt);
              var_dump($arrayDatos);
          } 
          else{
              echo "¯\_(ツ)_/¯";
          }
          mysqli_stmt_close($stmt);
        }
        else{
          echo "ERROR";
        }
         

        
        mysqli_close($conexion);
        return $valor;
      }


      function borrarEvento($id){
        $valor = false;
        $conexion = conectar();

        $sql ="DELETE FROM `eventos` WHERE `id` = ?";

        if($stmt = mysqli_prepare($conexion, $sql)){
          mysqli_stmt_bind_param($stmt, "i",$id);

          if(mysqli_stmt_execute($stmt)){
              echo "Borrado de evento correcto";
              $valor = true;
              //var_dump($stmt);
              var_dump($arrayDatos);
          } 
          else{
              echo "¯\_(ツ)_/¯";
          }
          mysqli_stmt_close($stmt);
        }
        else{
          echo "ERROR";
        }
         

        
        mysqli_close($conexion);
        return $valor;
      }


      function cambiarDatosPersonales($arrayMods,$nuevoUsername,$nuevaPass,$nuevoEmail,$nuevoNombre,$nuevosPermisos, $session){
        $valor = false;
        $conexion = conectar();


        if($arrayMods[0]){
          $param_username = $nuevoUsername;
        } else{
          $param_username = $session->username;
        }
        if($arrayMods[2]){
          $param_email = $nuevoEmail;
        } else{
          $param_email = $session->email;
        }
        if($arrayMods[3]){
          $param_nombre = $nuevoNombre;
        } else{
          $param_nombre = $session->nombre;
        }
        if($arrayMods[4]){
          $param_permiso = $nuevosPermisos;
        } else{
          $param_permiso = $session->permisos;
        }

        if($arrayMods[1]){
          $sql = "UPDATE `usuarios` SET `username` = ?,`nombre` = ?, `email` = ?, `password` = ?, `permisos` = ? WHERE `username` = ?";
          $param_password = password_hash($nuevaPass, PASSWORD_DEFAULT);
          

          if($stmt = mysqli_prepare($conexion, $sql)){
            $user = $session->username;
            mysqli_stmt_bind_param($stmt, "ssssis", $param_username, $param_nombre, $param_email, $param_password, $param_permiso, $user);

            if(mysqli_stmt_execute($stmt)){
                echo "Cambio de datos correcto con pass";
                $valor = true;
            } else{
                echo "¯\_(ツ)_/¯";
            }
            mysqli_stmt_close($stmt);
          }
        } 
        else{

          $sql = "UPDATE `usuarios` SET `username` = ?,`nombre` = ?, `email` = ?, `permisos` = ? WHERE `username` = ?";

          var_dump("SESION USER:".$session->username);
          if($stmt = mysqli_prepare($conexion, $sql)){
            $user = $session->username;
            mysqli_stmt_bind_param($stmt, "sssis", $param_username,$param_nombre, $param_email, $param_permiso, $user);


            if(mysqli_stmt_execute($stmt)){
                echo "Cambio de datos correcto sin pass";
                $valor = true;
            } else{
                echo "¯\_(ツ)_/¯";
            }
            mysqli_stmt_close($stmt);
          }
        }
        
        mysqli_close($conexion);
        return $valor;

      }

 ?>

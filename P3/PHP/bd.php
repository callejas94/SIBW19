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


 ?>

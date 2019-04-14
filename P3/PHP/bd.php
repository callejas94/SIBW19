<?php

      function consultar($conexion, $consulta){
				$datos=mysqli_query($conexion, $consulta);
				$datos_array=mysqli_fetch_all($datos);
				return $datos_array;
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
        $consultaEvento="SELECT nombre,fecha,imagen,descripcion,id,piefoto,link FROM eventos WHERE id =";
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


 ?>

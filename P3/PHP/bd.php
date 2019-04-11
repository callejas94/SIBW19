<?php

      function consultar($conexion, $consulta){
				$datos=mysqli_query($conexion, $consulta);
				$datos_array=mysqli_fetch_all($datos);
				return $datos_array;
			}

			function conectar(){
				$conexion =  new mysqli('localhost','root', '');
				if (!$conexion) {
						die('No pudo conectarse: ' . mysqli_error());
				}
				$abreBD = mysqli_select_db ($conexion, 'wadsbd');
				return $conexion;
			}

      //Funciones SELECT
      function eventosGeneral(){
        $conexion=conectar();
        $consultaEvento="SELECT * FROM generales";
        $arrayDatos=consultar($conexion,$consultaEvento);
        return $arrayDatos;
      }
      function getEvento($id){
        $conexion=conectar();
        $consultaEvento="SELECT * FROM eventos WHERE idEventos=$id";
        $arrayDatos=consultar($conexion,$consultaEvento);
        return $arrayDatos;
      }


 ?>

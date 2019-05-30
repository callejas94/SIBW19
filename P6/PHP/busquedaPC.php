<?php
    require_once 'bd.php';
    require_once 'validation.php';

    $eventos = getAllEventos();
    $consulta = Input::validateStr($_REQUEST["q"]);
    $num_resultados = 0;

    if ($consulta !== "") {
        foreach($eventos as $evento) {
	            $pista = "";
	            $resultadoEvento = truncatePreserveWords($evento[0],$consulta);
	            $resultadoDescripcion = truncatePreserveWords($evento[3],$consulta);

	            if(strlen($resultadoEvento) > 0){

	                $pista .="<p><a href='./evento/" .
	                $evento[4] .
	                "' target='_blank'>";
	                $pista .= $resultadoEvento;
	                $pista .= "</a></p>";


	            }
	            else{
	                if (strlen($resultadoDescripcion) > 0) {

	                    $pista .="<p><a href='./evento/" .
	                    $evento[4] .
	                    "' target='_blank'>";
	                    $pista .= $evento[0];
	                    $pista .= "</a></p>";
	                }

	            }

                if($pista !== ""){
                    echo $pista;
                    $num_resultados+=1;
                }

	            //echo $pista === "" ? "No hay sugerencias." : $pista;
            
        }

        if($num_resultados == 0){
            echo "No hay sugerencias.";
        }

    }

    


    function truncatePreserveWords ($h,$n,$w=5,$tag='b') {
        $n = explode(" ",trim(strip_tags($n))); //needles words
        $b = explode(" ",trim(strip_tags($h))); //haystack words
        $c = array();                       //array of words to keep/remove
        for ($j=0;$j<count($b);$j++) $c[$j]=false;
        for ($i=0;$i<count($b);$i++) 
            for ($k=0;$k<count($n);$k++) 
                if (stristr($b[$i],$n[$k])) {
                    $b[$i]=preg_replace("/".$n[$k]."/i","<$tag>\\0</$tag>",$b[$i]);
                    for ( $j= max( $i-$w , 0 ) ;$j<min( $i+$w, count($b)); $j++) $c[$j]=true; 
                }   
        $o = "";    // reassembly words to keep
        for ($j=0;$j<count($b);$j++) if ($c[$j]) $o.=" ".$b[$j]; else $o.="";
        return preg_replace("/\.{3,}/i","",$o);
    }
?>
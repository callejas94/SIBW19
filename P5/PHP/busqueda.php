<?php
    require_once 'bd.php';
    require_once 'validation.php';

    $eventos = getAllEventos();
    $consulta = Input::validateStr($_REQUEST["q"]);


    if ($consulta !== "") {
        $consulta = strtolower($consulta);
        $tamanio=strlen($consulta);
        $pista = "";
        foreach($eventos as $evento) {
            if (strpos($evento[0],$consulta) ||
                strpos($evento[3],$consulta)) {
            /*if (stristr($consulta, substr($evento[0], 0, $tamanio)) ||
                stristr($consulta, substr($evento[3], 0, $tamanio))) {*/
                $pista .="<p><a href='./evento/" . 
                $evento[4] .
                "' target='_blank'>";
                $pista .= preg_replace("/[a-z]*?".preg_quote($consulta)."[a-z]*/i", "<b>$0</b>", $evento[0]);
                $pista .= "</a></p>";
            }
            $pista .=strpos($evento[0],$consulta);
            $pista .=strpos($evento[3],$consulta);

        }
    }

    echo $pista === "" ? "No hay sugerencias." : $pista;



    /*
    $str = "my bird is funny";

$keyword = "fun";
$look = explode(' ',$str);

foreach($look as $find){
    if(strpos($find, $keyword) !== false) {
        if(!isset($highlight)){ 
            $highlight[] = $find;
        } else { 
            if(!in_array($find,$highlight)){ 
                $highlight[] = $find;
            } 
        }
    }   
} 

if(isset($highlight)){ 
    foreach($highlight as $replace){
        $str = str_replace($replace,'<b>'.$replace.'</b>',$str);
    } 
} 

echo $str;*/
?>
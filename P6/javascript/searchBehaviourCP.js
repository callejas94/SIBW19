
document.addEventListener("DOMContentLoaded", function(event) {
    const $filtradoEventosPC = document.querySelector('#filtradoEventosPC');
    const $filtradoComentarios = document.querySelector('#filtradoComentarios');
    const $filtradoUsuarios = document.querySelector('#filtradoUsuarios');


	const typeHandlerEventos = function(e) {
	  BusquedaEventos();
	}

	const typeHandlerComentarios = function(e) {
	  BusquedaComentarios();
	}

	const typeHandlerUsuarios = function(e) {
	  BusquedaUsuarios();
	}

	if($filtradoEventosPC != null){
		$filtradoEventosPC.addEventListener('input', typeHandlerEventos) // register for oninput
		$filtradoEventosPC.addEventListener('propertychange', typeHandlerEventos) // for IE8
	}
	if($filtradoComentarios != null){
		$filtradoComentarios.addEventListener('input', typeHandlerComentarios) // register for oninput
		$filtradoComentarios.addEventListener('propertychange', typeHandlerComentarios) // for IE8
	}
	if($filtradoUsuarios != null){
		$filtradoUsuarios.addEventListener('input', typeHandlerUsuarios) // register for oninput
		$filtradoUsuarios.addEventListener('propertychange', typeHandlerUsuarios) // for IE8
	}
});


function BusquedaEventos() {
    var inputTexto = document.getElementById('filtradoEventosPC').value;
    var lista = document.getElementById('gestor');

    if(inputTexto.length > 0){
    	FiltraPorTexto(inputTexto,lista);
    }
    else{
    	MuestraTodosEventos(lista);
    }
}

function BusquedaComentarios() {
    var inputTexto = document.getElementById('filtradoComentarios').value;
    var lista = document.getElementById('moderador');

    if(inputTexto.length > 0){
    	FiltraPorTexto(inputTexto,lista);
    }
    else{
    	MuestraTodosEventos(lista);
    }
}

function BusquedaUsuarios() {
    var inputTexto = document.getElementById('filtradoUsuarios').value;
    var lista = document.getElementById('superusuario');

    if(inputTexto.length > 0){
    	FiltraPorTexto(inputTexto,lista);
    }
    else{
    	MuestraTodosEventos(lista);
    }
}

function MuestraTodosEventos(lista){
	var items = lista.getElementsByTagName("div");
	for (var i = 0; i < items.length; ++i) {
	  items[i].style.display = "block";
	}
}

function FiltraPorTexto(inputTexto, lista){

	var listaFiltrada = [];
	var listaNormal = [];

	var items = lista.getElementsByTagName("div");
	for (var i = 0; i < items.length; ++i) {
	  // do something with items[i], which is a <li> element
		if(items[i].innerHTML.toLowerCase().includes(inputTexto.toLowerCase())){
			listaFiltrada.push(items[i]);	
		}
		listaNormal.push(items[i]);
	}
	
	var listaNoBuscada = listaNormal.filter(
	    function(elemento) {
	      return this.indexOf(elemento) < 0;
	    },
	    listaFiltrada
	)


	if(listaNoBuscada.length > 0){
		for (let k = 0; k < listaNoBuscada.length; ++k) {
		  listaNoBuscada[k].style.display = "none";
		}
		for (let k = 0; k < listaFiltrada.length; ++k) {
		  listaFiltrada[k].style.display = "block";
		}
	}
	else{
		MuestraTodosEventos(lista);
	}
}

function showHint(str) {
    if (str.length==0) { 
        document.getElementById("livesearchCP").innerHTML="";
        document.getElementById("livesearchCP").style.display="";
    }
    else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("livesearchCP").innerHTML=this.responseText;
                document.getElementById("livesearchCP").style.display="block";
            }
        };
        xmlhttp.open("GET", "./PHP/busquedaPC.php?q=" + str, true);
        xmlhttp.send();
    }
}
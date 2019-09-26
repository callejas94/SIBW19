
document.addEventListener("DOMContentLoaded", function(event) {
    continua = true;
    const $filtradoEventos = document.querySelector('#filtradoEventos');


	const typeHandlerAdvertencias = function(e) {
	  BusquedaEventos();
	}

	$filtradoEventos.addEventListener('input', typeHandlerAdvertencias) // register for oninput
	$filtradoEventos.addEventListener('propertychange', typeHandlerAdvertencias) // for IE8
});


function BusquedaEventos() {
    var inputTexto = document.getElementById('filtradoEventos').value;
    var lista = document.getElementById('contenedores');

    if(inputTexto.length > 0){
    	FiltraPorTexto(inputTexto,lista);
    }
    else{
    	MuestraTodosEventos(lista);
    }
}

function MuestraTodosEventos(lista){
	var items = lista.getElementsByTagName("a");
	for (var i = 0; i < items.length; ++i) {
	  items[i].style.display = "inline-block";
	}
}

function FiltraPorTexto(inputTexto, lista){

	var listaFiltrada = [];
	var listaNormal = [];

	var items = lista.getElementsByTagName("a");
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
		  listaFiltrada[k].style.display = "inline-block";
		}
	}
	else{
		MuestraTodosEventos(lista);
	}
}
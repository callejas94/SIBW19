

var nombre; //nombre del usuario
//var forbidden = [" tonto ", " feo ", " caca ", " culo ", " pedo "]; //palabras baneadas
var forbidden;
var correos = ["gmail", "yahoo", "hotmail"];	//dominios permitidos
var extensions = [".com", ".es"];	//extensiones permitidas
var cens = "*";	//caracteres de censura
var display = 0;


document.addEventListener('DOMContentLoaded', () => {

    // Seleccionando los elementos de TWIG
    //var x = document.getElementById("prohibidas");
    /*const entryElements =
        document.querySelectorAll("[id='prohibidas']");

    // Mapeando los datos en un array
    const entryIds =
        Array.from(entryElements).map(
            item => item.dataset.entryId
        );
    // Al mapearlos,salen elementos repetidos
    forbidden = entryIds.filter(function(item, index){
      return entryIds.indexOf(item) >= index;
    });

    // Los elementos sin repetir están con caracteres que no tienen que tener:
    // [" tonto "] -->  tonto
    for(let i = 0; i < forbidden.length; ++i){
      forbidden[i] = forbidden[i].replace("[", "");
      forbidden[i] = forbidden[i].replace("]", "");
      forbidden[i] = forbidden[i].replace("\"", "");
      forbidden[i] = forbidden[i].replace("\"", "");
    }

    borrarEtiquetas(entryElements);*/


    // Cargar comentarios posteados

  if (typeof(Storage) !== "undefined") {
    if (!localStorage.clickcount) {
      localStorage.clickcount = 0;
    }
  	document.getElementById("result").innerHTML = "Comentarios posteados " + localStorage.clickcount + " .";
  }
  else {
  	document.getElementById("result").innerHTML = "Sorry, your browser does not support web storage...";
  }


});

/*function borrarEtiquetas(elementos){
  if (!elementos){
    alert("El elemento selecionado no existe");
  } else {
    for(let i = 0; i < elementos.length; ++i){
      var elem = elementos[i];
      // Mejor codificado
      //elem.remove();
      // Mejor compatibilidad
      elem.parentNode.removeChild(elem);
    }

  }
}*/

//función que crea un nuevo cuadro de texto par el comentario con el estilo predefinido
function Coment() {
	//recogemos el texto y calculamos su longitud
	SetName();
	var texto = document.getElementById("texto").value;
	var lengt = texto.length;

	var em = document.getElementById("email").value;
	//si hay texto escrito
	if(em.length > 0 && nombre.length >0 && lengt > 0 && validarEmail(em)){
		// texto = Date() + "\n" + document.getElementById("entrada").value;
		//creamos el chat
		var chat = document.createElement("div");
		chat.id = "chat";
		chat.className = "comentario";

		//creamos el nombre
		var name = document.createElement("h4");
		name.id = "comentario_autor";
		var named = document.createTextNode(nombre);
		//añadimos el nombre al chat
		name.appendChild(named);
		chat.appendChild(name);

		// creamos la fecha
		var fecha = Date() + "";
		var dat = document.createElement("p");
		dat.id = "comentario_hora";
		// Añadimos el nodo de la fecha al chat
		dat.appendChild(document.createTextNode(fecha));
		chat.appendChild(dat);


		var separador = document.createElement("hr");
		separador.id = "separador_comentario";
		chat.appendChild(separador);

	  //creamos el mensaje a partir del texto introducido
	  var para = document.createElement("p");
	  para.id = "contenido_comentario";
	  var node = document.createTextNode(texto);
	  //añadimos el texto al chat
	  para.appendChild(node);
	  chat.appendChild(para);

	  //insertamos el nuevo chat al principio de nuestro marco de comentario
	  var element = document.getElementById("collapseContent");
		var child = document.getElementById("chat");
		element.insertBefore(chat, child);
	  document.getElementById("texto").value = '';
	}
	else if(nombre.length == 0){
		alert("Debes indicar tu nombre");
	}

	else if(em.length == 0){
		alert("Debes indicar tu correo");
	}
}



function SetName(){
	nombre = document.getElementById("name").value;
}
function validarEmail( email ) {
    expr = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@((?:[A-Z]{2}|gmail|hotmail|yahoo)?\.)+(?:[A-Z]{2}|com|org|net|es)\b/;
    if ( !expr.test(email) ){
        alert("Error: La dirección de correo " + email + " es incorrecta.");
        return false;
    }
    return true;

}

//función que añadirá un event listener para que compruebe el cuadro de texto
function Censura(forbidden){
	document.getElementById("texto").onkeyup = function(e){
		if(e.keyCode == 32){
			var str = document.getElementById("texto").value;
			var censurada = "";
				for(i = 0; i < forbidden.length; i++){
					if(str.match(forbidden[i][0])){
						var censure = forbidden[i][0];
						var censure_time = censure.length;
						var tam = cens;

						censurada += " ";
						for(j = 0; j < censure_time-2; j++){
							censurada = censurada + cens;
						}
						censurada += " ";
						document.getElementById("texto").value = str.replace(censure, censurada);
            document.getElementById("texto").innerHTML = str.replace(censure, censurada);
					}
				}
		}

	};
}




function postCounter() {
  if (typeof(Storage) !== "undefined") {
    if(comentarioNoVacio()){
      localStorage.clickcount = Number(localStorage.clickcount)+1;
    }

  }

}

function comentarioNoVacio(){
  var texto = document.getElementById("texto").value.length > 0;
  var nombre = document.getElementById("name").value.length > 0;
  var email = document.getElementById("email").value.length > 0;
  return texto&&nombre&&email;
}



/*
function postCounter() {
  if (typeof(Storage) !== "undefined") {
    if (sessionStorage.clickcount) {
      sessionStorage.clickcount = Number(sessionStorage.clickcount)+1;
    } else {
      sessionStorage.clickcount = 1;
    }
    document.getElementById("result").innerHTML = "Comentarios posteados " + sessionStorage.clickcount + " .";
  } else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support web storage...";
  }
}*/

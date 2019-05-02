

var nombre; //nombre del usuario
var forbidden = [" tonto ", " feo ", " caca ", " culo ", " pedo "]; //palabras baneadas
var correos = ["gmail", "yahoo", "hotmail"];	//dominios permitidos
var extensions = [".com", ".es"];	//extensiones permitidas
var cens = "*";	//caracteres de censura
var display = 0;


//función que crea un nuevo cuadro de texto par el comentario con el estilo predefinido
function Coment() {
	//recogemos el texto y calculamos su longitud
	SetName();
	var texto = document.getElementById("comment").value;
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
	  document.getElementById("comment").value = '';
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
    expr = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@((?:[A-Z]{2}|gmail|hotmail|yahoo|ugr|correo.ugr)?\.)+(?:[A-Z]{2}|com|org|net|es)\b/;
    if ( !expr.test(email) ){ugr|correo.ugr
        alert("Error: La dirección de correo " + email + " es incorrecta.");
        return false;
    }
    return true;

}

//función que añadirá un event listener para que compruebe el cuadro de texto
function Censura(){
	document.getElementById("comment").onkeyup = function(e){
		if(e.keyCode == 32){
			var str = document.getElementById("comment").value;
			var censurada = "";
				for(i = 0; i < forbidden.length; i++){
					if(str.match(forbidden[i])){
						var censure = forbidden[i];
						var censure_time = censure.length;
						var tam = cens;

						censurada += " ";
						for(j = 0; j < censure_time-2; j++){
							censurada = censurada + cens;
						}
						censurada += " ";
						document.getElementById("comment").value = str.replace(censure, censurada);
					}
				}
		}

	};
}

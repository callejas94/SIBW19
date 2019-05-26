function showHint(str) {
    if (str.length==0) { 
        document.getElementById("livesearch").innerHTML="";
        document.getElementById("livesearch").style.display="";
    }
    else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("livesearch").innerHTML=this.responseText;
                document.getElementById("livesearch").style.display="block";
            }
        };
        xmlhttp.open("GET", "./PHP/busqueda.php?q=" + str, true);
        xmlhttp.send();
    }
}
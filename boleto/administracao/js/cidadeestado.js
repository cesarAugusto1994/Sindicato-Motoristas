var req;
function processReqChange(){
 if(req.readyState == 4){
	if (req.status == 200) {
//			document.getElementById('cidades').innerHTML = req.responseText;
			document.getElementById("cidades").innerHTML = req.responseText;
		} else { 
			alert("Houve um problema ao obter os dados:\n" + req.statusText);
		}
	}
}
function loadXMLDoc(url){ 
req = null; 
if (window.XMLHttpRequest) { 
	req = new XMLHttpRequest(); 
	req.onreadystatechange = processReqChange;
	req.open("GET", url, true); 
	req.send(null);
	}else if (window.ActiveXObject) { 
		req = new ActiveXObject("Microsoft.XMLHTTP"); 
		if (req) { 
		  req.onreadystatechange = processReqChange;
		  req.open("GET", url, true); 
		  req.send();
		}
	}
}
function AtualizaCidade(valor,valor2){
	if(valor == 'nenhum'){
		document.getElementById("cidades").innerHTML = '';
	}else{
		loadXMLDoc("cidades.php?estado="+valor+"&cidade="+valor2);
	}
}
				
function loading(){
	document.getElementById("cidades").innerHTML = "<img src='img/lendo.gif' width='10' height='10'> lendo informações...";
}
				
			
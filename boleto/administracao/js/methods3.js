function relprod(id_prod, name_prod) {
 document.getElementById("produtore2").value = id_prod;
 document.getElementById("namesearch2").value = name_prod;
}

window.onload = function() {
	//cria listener para o campo texto
	$("namesearch2").onkeyup = function() {
		if(this.value.length<3) {
			$("usersList2").style.display = "none";
			return false;
		}
		//seta a url e os parâmetros a serem usamos pelo PHP
		var url = "name.php";
		var pars = "name=" + this.value + "&rnd=" + Math.random()*4;
  //document.write(url + "?" + pars);
		//utiliza objeto Ajax da biblioteca Prototype
		new Ajax.Request(url, { method: 'get', parameters: pars,
			//em caso de sucesso...
			onSuccess: function(transport) {
				var json = transport.responseText.evalJSON(true);
				if(json.length>0) { //se tiver pelo menos um registro, mostra a div que tem os links
					$("usersList2").style.display = "block";
					$("usersList2").innerHTML = "";
				}
				//percorre a lista de resultados
				for(i=0; i<json.length; i++) {
					//cria um link
					var a = document.createElement("a");
					//o primeiro valor de cada registro é o id do usuário, e o segundo, o nome completo
					a.setAttribute("href", "javascript:relprod(" + json[i][0] + ", '" + json[i][1] + "');");
					a.setAttribute("title", json[i][1]);
					a.innerHTML = json[i][1];
					//faz alguma coisa no click
					a.onclick = function() {
					//alert("Você clicou no link que aponta para " + this.href);
						window.location=this.href;
						$("usersList2").style.display = "none";
						return false;
					}
					$("usersList2").appendChild(a);
		}}});
	}
}

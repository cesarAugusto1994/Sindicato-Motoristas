var req;
function loadXMLDocRE(url,valor)
		 { 
		 req = null; if (window.XMLHttpRequest)
		 { 
		 req = new XMLHttpRequest(); 
		 req.onreadystatechange = processReqChangeRE; req.open("GET", url+'?especie='+valor, true); 
		 req.send(null);
		 } 
		 else if (window.ActiveXObject) 
		 { req = new ActiveXObject("Microsoft.XMLHTTP"); 
		 if (req) 
		 { 
		 req.onreadystatechange = processReqChangeRE; 
		 req.open("GET", url+'?especie='+valor, true); 
		 req.send();
		 }
		 }
		 }
		 
function processReqChangeRE()
		{
			if(req.readyState == 4)
		{
			if (req.status == 200) 
			{
				document.getElementById('raca').innerHTML = req.responseText;
			} 
			else
			{ 
			alert("Houve um problema ao obter os dados:\n" + req.statusText);
			}
		}
		}
function AtualizaRaca(valor)
		{
			if(valor == '')
			{
				document.getElementById('raca').innerHTML = '';
				}
				else
				{
					loadXMLDocRE("raca.php",valor);
					}
					}
function loadingRE(){
		document.getElementById('raca').innerHTML = "<img src='_img/lendo.gif' width='10' height='10'> lendo informações...";
		}

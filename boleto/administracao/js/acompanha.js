function toggleDiv(id,flagit) {
	var divName = id; // div that is to follow the mouse
						   // (must be position:absolute)
	var offX = 15;          // X offset from mouse position
	var offY = 15;          // Y offset from mouse position
	
	function mouseX(evt) {if (!evt) evt = window.event; if (evt.pageX) return evt.pageX; else if (evt.clientX)return evt.clientX + (document.documentElement.scrollLeft ?  document.documentElement.scrollLeft : document.body.scrollLeft); else return 0;}
	function mouseY(evt) {if (!evt) evt = window.event; if (evt.pageY) return evt.pageY; else if (evt.clientY)return evt.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop); else return 0;}
	
	function follow(evt) {if (document.getElementById) {var obj = document.getElementById(divName).style; obj.visibility = 'visible';
	obj.left = (parseInt(mouseX(evt))+offX) + 'px';
	obj.top = (parseInt(mouseY(evt))+offY) + 'px';}}
	document.onmousemove = follow;
	if (flagit=="1"){
		if (document.layers) document.layers[''+id+''].display = ""
		else if (document.all) document.all[''+id+''].style.display = ""
		else if (document.getElementById) document.getElementById(''+id+'').style.display = ""
	}else
		if (flagit=="0"){
			if (document.layers) document.layers[''+id+''].display = "none"
			else if (document.all) document.all[''+id+''].style.display = "none"
			else if (document.getElementById) document.getElementById(''+id+'').style.display = "none"
	}
}// JavaScript Document
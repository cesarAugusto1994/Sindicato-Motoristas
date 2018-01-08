<?php
// Passando data do banco "AAAA-MM-DD" para "DD/MM/AAAA"  	
function mostraData ($dt) {  
	if ($data!='') {  
 		return (substr($dt,8,2).'/'.substr($dt,5,2).'/'.substr($dt,0,4));  
	} else { 
		return ''; 
	}  
 }  
   
// Passando data do text box "DD/MM/AAAA" para "AAAA-MM-DD"  
function gravaData ($dt) {  
	if ($data != '') {  
		return (substr($dt,6,4).'/'.substr($dt,3,2).'/'.substr($dt,0,2));  
	} else { 
		return ''; 
	}	  
}
$datahora = date('Y-m-d H:i:s');
?>

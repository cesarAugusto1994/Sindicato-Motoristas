<?php
include 'config/config.php';
header("Content-Type: text/html; charset=ISO-8859-1",true);	
function gera_select($query32, $value, $label_opt, $nome_select,$selected,$todos,$sel){
	$qr_select = mysql_query($query32) or die (mysql_error());
	$select = '<select name="'.$nome_select.'" id="'.$nome_select.'">	
	';
	if($sel<>''){
			$select .='<option value="">Selecione</option>			
	';
	}
	if($todos<>""){
		$select .= '<option value="todos">Todos</option>		
		';
	}
	while($linha_select=mysql_fetch_array($qr_select)){
		$sel = '';
		if($linha_select[$value]==$selected){
			$sel = ' selected = "selected"';
		}
		$select .= '<option value="'.$linha_select[$value].'"'.$sel.'>'.$linha_select[$label_opt].'</option>		
		';
						
	}
			
	$select .='</select>';
	return $select;
}
?>

	<?php
	if ( $_GET['acao'] == "baixar" ) {
	$id_boleto = "$idboleto";	
	$query  = "UPDATE boletos 
	SET status='B', valorbaixa='".number_format($valorbaixa,2,".",",")."', 
	membro_baixa ='".$_SESSION["id_user01"]."', 
	databaixa='".substr($databaixa,6,4) . "-" .substr($databaixa,3,2) . "-" . substr($databaixa,0,2)."'
	 WHERE id='$id_boleto' ";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());	
	echo '<script>alert("Boleto baixado com sucesso!");</script>';
	echo "<script> window.location='boletosareceber.php'; </script>";	
	}
	
	
	if ( $_GET['acao'] == "excluir" ) {
	$id_remover = "$id_excluir";
	$query  = "UPDATE boletos SET status='EA', membro_excluir='".$_SESSION["id_user01"]."' WHERE id='$id_remover' ";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo '<script>alert("Boleto excluído com sucesso!");</script>';
	echo "<script> window.location='boletosareceber.php'; </script>";
	}
	
	
	
	?>
	
	<script type="text/javascript">
	function formatar_moeda(campo, separador_milhar, separador_decimal, tecla) {
	var sep = 0;
	var key = '';
	var i = j = 0;
	var len = len2 = 0;
	var strCheck = '0123456789';
	var aux = aux2 = '';
	var whichCode = (window.Event) ? tecla.which : tecla.keyCode;
	if (whichCode == 13) return true; // Tecla Enter
	if (whichCode == 8) return true; // Tecla Delete
	key = String.fromCharCode(whichCode); // Pegando o valor digitado
	if (strCheck.indexOf(key) == -1) return false; // Valor inválido (não inteiro)
	len = campo.value.length;
	for(i = 0; i < len; i++)
	if ((campo.value.charAt(i) != '0') && (campo.value.charAt(i) != separador_decimal)) break;
	aux = '';
	for(; i < len; i++)
	if (strCheck.indexOf(campo.value.charAt(i))!=-1) aux += campo.value.charAt(i);
	aux += key;
	len = aux.length;
	if (len == 0) campo.value = '';
	if (len == 1) campo.value = '0'+ separador_decimal + '0' + aux;
	if (len == 2) campo.value = '0'+ separador_decimal + aux;
	if (len > 2) {
	aux2 = '';
	for (j = 0, i = len - 3; i >= 0; i--) {
	if (j == 3) {
	aux2 += separador_milhar;
	j = 0;
	}
	aux2 += aux.charAt(i);
	j++;
	}
	campo.value = '';
	len2 = aux2.length;
	for (i = len2 - 1; i >= 0; i--)
	campo.value += aux2.charAt(i);
	campo.value += separador_decimal + aux.substr(len - 2, len);
	}
	return false;
	}
	</script>
	<script>
	
	function formatar(mascara, documento){
	var i = documento.value.length;
	var saida = mascara.substring(0,1);
	var texto = mascara.substring(i)
	
	if (texto.substring(0,1) != saida){
	documento.value += texto.substring(0,1);
	}
	}
	</script>	

	<script type="text/javascript">
	$().ready(function(){    
	// Validação do formulário, conforme atributo rel passado para os campos a serem validadados
	$('#teste').click(function(){
	var erro = "";
	var campos="";
	var valorbaixa = $('#valorbaixa').val();	
	var databaixa = $('#databaixa').val();						
	if(valorbaixa==''){
	campos += "Preencha o campo Valor da Baixa" + "\n";
	$('#valorbaixa').css('background-color','#FF0000');
	erro++;
	}		
	if(databaixa==''){
	campos += "Preencha o campo Vencimento" + "\n";
	$('#databaixa').css('background-color','#FF0000');
	erro++;
	}		
	if(erro!=''){
	alert("Houve "+erro+" erros: " + "\n" + campos);
	return false;
	}else{
	return true;
	}
	});
	$('input[@type=text]').focus(function(){
	$(this).css('background-color','#E1EBF4');
	});		
	});
	</script>	

	
	
	<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.quicksearch.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" charset="utf-8">
	jQuery(document).ready(function () {
	jQuery('table#mytable tbody tr').quicksearch({
	stripeRowClass: ['odd', 'even'],
	position: 'before',
	attached: '#busca',
	labelText: 'Digite o texto para filtrar o resultado  :'
	});	
	})			
	</script>	
	
	
		
	<br clear="all" />
	<br clear="all" />
	<div id="busca"></div>
	<br clear="all" />			
	<table id="mytable" cellspacing="0" summary="Clientes" width="100%">
	<caption>BOLETOS À RECEBER</caption>
	<thead>
	<tr>
	<th scope="col" abbr="contribuinte" style="width:50%">Contribuinte</th>
	<th align="center" 	style="width:5%" scope="col" abbr="documento">Documento</th>
	<th align="center" 		style="width:5%" scope="col" abbr="emissao">Emissão</th>		
	<th align="center" 	style="width:5%" scope="col" abbr="nossonumero">Nosso Número</th>
	<th align="center" 		style="width:5%" scope="col" abbr="valor">Valor</th>
	<th align="center" 	style="width:5%" scope="col" abbr="vencimento">Vencimento</th>	
	<th align="center" 		style="width:5%" scope="col" abbr="valor">Valor Baixa</th>
	<th align="center" 	style="width:5%" scope="col" abbr="vencimento">Data Baixa</th>																
	<th align="center" 		style="width:5%" scope="col" abbr="opcaoes">Opções</th>
	</tr>
	</thead>
	<tbody>
	<?
	$i2 = 0;
	$querycon="SELECT * FROM boletos where status='NB' order by vencimento desc";
	$consulta = mysql_query($querycon);
	$contauser = mysql_num_rows($consulta);
	if($contauser<1){
	?>
	<tr>
	<td colspan="9" style="text-align:center">Não existem boletos cadastrados</td>
	</tr>
	<?		
	}
	while ($linha = mysql_fetch_array($consulta)) {
	$idboleto					=	$linha['id'];
	$nossonumero				=	$linha['nossonumero'];
	$documento_contribuinte		=	$linha['documento_contribuinte'];
	$valor						=	$linha['valor'];
	$datavencimento				=	$linha['vencimento'];	
	$datavencimento				=	substr($datavencimento,8,2) . "/" .substr($datavencimento,5,2) . "/" . substr($datavencimento,0,4);	
	$horacadastro				=	$linha['hora'];
	$datacadastro				=	$linha['data'];	
	$datacadastro				=	substr($datacadastro,8,2) . "/" .substr($datacadastro,5,2) . "/" . substr($datacadastro,0,4);		
	
	$querycontribuinte="SELECT * FROM contribuintes where documento='$documento_contribuinte'";
	$consultacontribuinte = mysql_query($querycontribuinte);
	$linhacontribuinte = mysql_fetch_array($consultacontribuinte);
	
	$i2++;
	if ( ($i2%2) == '0'){
	$classe = ' class="alt"';
	$classe2 = ' class="busca alt"';
	}else{
	$classe = '';
	$classe2 = ' class="busca"';
	}
	?>
	<script type="text/javascript">
	$().ready(function(){    
	// Validação do formulário, conforme atributo rel passado para os campos a serem validadados
	$('#teste<?=$idboleto?>').click(function(){
	var erro = "";
	var campos="";
	var valorbaixa<?=$idboleto?> = $('#valorbaixa<?=$idboleto?>').val();	
	var databaixa<?=$idboleto?> = $('#databaixa<?=$idboleto?>').val();						
	if(valorbaixa<?=$idboleto?>==''){
	campos += "Preencha o campo Valor da Baixa" + "\n";
	$('#valorbaixa<?=$idboleto?>').css('background-color','#FF0000');
	erro++;
	}		
	if(databaixa<?=$idboleto?>==''){
	campos += "Preencha o campo Vencimento" + "\n";
	$('#databaixa<?=$idboleto?>').css('background-color','#FF0000');
	erro++;
	}		
	if(erro!=''){
	alert("Houve "+erro+" erros: " + "\n" + campos);
	return false;
	}else{
	return true;
	}
	});
	$('input[@type=text]').focus(function(){
	$(this).css('background-color','#E1EBF4');
	});		
	});
	</script>
	<form action="?acao=baixar" method="post" enctype="multipart/form-data" name="form<?=$idboleto?>" id="form<?=$idboleto?>">
	<input name="idboleto" type="hidden" id="idboleto" value='<?=$idboleto?>' size="25" maxlength="9">
	<tr>
	<td<?=$classe2?> align="left"><?=$linhacontribuinte['nome']?></td>
	<td<?=$classe2?>><?=$documento_contribuinte?></td>	
	<td<?=$classe2?>><?=$datacadastro?>&nbsp;&nbsp;<?=$horacadastro?></td>							
	<td<?=$classe2?>><?=$nossonumero?></td>
	<td<?=$classe2?>><?=number_format($valor,2,",",".")?></td>
	<td<?=$classe2?>><b><?=$datavencimento?></b></td>
	<td<?=$classe2?>><input type="text" name="valorbaixa" id="valorbaixa<?=$idboleto?>" size="6" maxlength="30" 
	onKeyPress="return formatar_moeda(this,'',',',event);"></td>
	<td<?=$classe2?>><input type="text" name="databaixa" id="databaixa<?=$idboleto?>" size="9" maxlength="30" 
	OnKeyPress="formatar('##/##/####', this)"></td>			
	<td<?=$classe2?>>
	<input type="image" src="imagens/atualizar.png" value="Baixar o boleto" id="teste<?=$idboleto?>">
	<a href="javascript:confirmaExclusao('?acao=excluir&id_excluir=<?=$idboleto?>')">
	<img src="imagens/excluir.png" alt="Excluir o boleto" title="Excluir o boleto" border="0" />
	</a>
	</td>
	</tr>
	</form>
	<?	}?>
	</tbody>
	</table>
	<br clear="all" />
	<br clear="all" />
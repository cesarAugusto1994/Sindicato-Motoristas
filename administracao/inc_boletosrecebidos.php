	<?php
	
	if ( $_GET['acao'] == "excluir" ) {
	$id_remover = "$id_excluir";
	$query  = "UPDATE boletos SET status='NB', membro_baixa='0', databaixa='', valorbaixa='' WHERE id='$id_remover' ";
	$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	echo '<script>alert("Boleto excluído com sucesso!");</script>';
	echo "<script> window.location='boletosrecebidos.php'; </script>";
	}
	
	
	
	?>

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
	<caption>BOLETOS RECEBIDOS</caption>
	<thead>
	<tr>
	<th scope="col" abbr="contribuinte" style="width:50%">Contribuinte</th>
	<th scope="col" abbr="documento" 	style="width:10%">Documento</th>
	<th scope="col" abbr="emissao" 		style="width:10%">Emissão</th>		
	<th scope="col" abbr="nossonumero" 	style="width:10%">Nosso Número</th>
	<th scope="col" abbr="valor" 		style="width:10%">Valor</th>
	<th scope="col" abbr="vencimento" 	style="width:10%">Vencimento</th>
	<th scope="col" abbr="valor" 		style="width:10%">Valor Baixado</th>
	<th scope="col" abbr="vencimento" 	style="width:10%">Data Baixa</th>
	<th scope="col" abbr="usuario" 		style="width:10%">Usuário Baixa</th>																	
	<th scope="col" abbr="opcaoes" 		style="width:10%">Opções</th>
	</tr>
	</thead>
	<tbody>
	<?
	$i2 = 0;
	$querycon="SELECT * FROM boletos where status='B' order by vencimento desc";
	$consulta = mysql_query($querycon);
	$contauser = mysql_num_rows($consulta);
	if($contauser<1){
	?>
	<tr>
	<td colspan="10" style="text-align:center">Não existem boletos cadastrados</td>
	</tr>
	<?		
	}
	while ($linha = mysql_fetch_array($consulta)) {
	$id							=	$linha['id'];
	$nossonumero				=	$linha['nossonumero'];
	$documento_contribuinte		=	$linha['documento_contribuinte'];
	$valor						=	$linha['valor'];
	$datavencimento				=	$linha['vencimento'];	
	$datavencimento				=	substr($datavencimento,8,2) . "/" .substr($datavencimento,5,2) . "/" . substr($datavencimento,0,4);	
	$horacadastro				=	$linha['hora'];
	$datacadastro				=	$linha['data'];	
	$datacadastro				=	substr($datacadastro,8,2) . "/" .substr($datacadastro,5,2) . "/" . substr($datacadastro,0,4);
	$valorbaixa					=	$linha['valorbaixa'];	
	$databaixa					=	$linha['databaixa'];	
	$databaixa					=	substr($databaixa,8,2) . "/" .substr($databaixa,5,2) . "/" . substr($databaixa,0,4);			
	$membro_baixa				=	$linha['membro_baixa'];
	
	$querycontribuinte="SELECT * FROM contribuintes where documento='$documento_contribuinte'";
	$consultacontribuinte = mysql_query($querycontribuinte);
	$linhacontribuinte = mysql_fetch_array($consultacontribuinte);
	
	$queryconmembro="SELECT * FROM tbl_membros WHERE codigo = '$membro_baixa'";
	$consultamembro = mysql_query($queryconmembro);
	$linhamembro = mysql_fetch_array($consultamembro);	
	
	$i2++;
	if ( ($i2%2) == '0'){
	$classe = ' class="alt"';
	$classe2 = ' class="busca alt"';
	}else{
	$classe = '';
	$classe2 = ' class="busca"';
	}
	?>
	<tr>
	<td<?=$classe2?> align="left"><?=$linhacontribuinte['nome']?></td>
	<td<?=$classe2?>><?=$documento_contribuinte?></td>	
	<td<?=$classe2?>><?=$datacadastro?>&nbsp;&nbsp;<?=$horacadastro?></td>							
	<td<?=$classe2?>><?=$nossonumero?></td>
	<td<?=$classe2?>><?=number_format($valor,2,",",".")?></td>
	<td<?=$classe2?>><?=$datavencimento?></td>
	<td<?=$classe2?>><?=number_format($valorbaixa,2,",",".")?></td>
	<td<?=$classe2?>><?=$databaixa?></td>
	<td<?=$classe2?>><?=$linhamembro['nome']?></td>			
	<td<?=$classe2?>>
	<a href="javascript:confirmaExclusao('?acao=excluir&id_excluir=<?=$id?>')">
	<img src="imagens/excluir.png" title="Excluir baixa e devolver boleto para a receber" alt="Excluir baixa e devolver boleto para a receber" border="0" />
	</a>
	</td>
	</tr>
	<?	}?>
	</tbody>
	</table>
	<br clear="all" />
	<br clear="all" />
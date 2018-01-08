<?php
 ob_start();
 require_once('verifica.php');
 include("./config/config.php");

	$datainicio	=	substr($t1,6,4) . "-" .substr($t1,3,2) . "-" . substr($t1,0,2);
	$dataifinal	=	substr($t2,6,4) . "-" .substr($t2,3,2) . "-" . substr($t2,0,2);	

//defino data 1 
$ano1 = substr($t1,6,4);
$mes1 = substr($t1,3,2);
$dia1 = substr($t1,0,2);
//defino data 2
$ano2 = substr($t2,6,4);
$mes2 = substr($t2,3,2);
$dia2 = substr($t2,0,2);
//calculo timestam das duas datas
$timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1);
$timestamp2 = mktime(4,12,0,$mes2,$dia2,$ano2);
//diminuo a uma data a outra
$segundos_diferenca = $timestamp1 - $timestamp2;
//echo $segundos_diferenca;
//converto segundos em dias
$dias_diferenca = $segundos_diferenca / (60 * 60 * 24);
//obtenho o valor absoluto dos dias (tiro o possível sinal negativo)
$dias_diferenca = abs($dias_diferenca);
//tiro os decimais aos dias de diferenca
$dias_diferenca = floor($dias_diferenca) + 1;

function som_data($data, $dias)
{
$data_e = explode("/",$data);
$data2 = date("m/d/Y", mktime(0,0,0,$data_e[1],$data_e[0] + $dias,$data_e[2]));
$data2_e = explode("/",$data2);
$data_final = $data2_e[1] . "/". $data2_e[0] . "/" . $data2_e[2];
return $data_final;
}

if ( $metodo == "areceber" ) { $nomerelatorio="Boletos a RECEBER";} 
if ( $metodo == "recebidos" ) { $nomerelatorio="Boletos RECEBIDOS";} 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema Financeiro -  <?=$titulosite_config?> </title>
<link rel="stylesheet" href="css/tabelas.css" type='text/css'>
<link rel="stylesheet" href="css/formulario2.css" type='text/css'>
</head>
<body>
<table width="790" border="0" align="center" cellpadding="1" cellspacing="1">
<tr>
<td width="282" align="center"><img src='http://www.sindimotoristas.com.br/administracao/imagens/logotipo.gif' border='0' /></td>
<td width="508" align="left">
<br />
<br />
<b>
<?=$nomerelatorio?> <br/> <?=$t1?> a <?=$t2?>   (análise <?=$dias_diferenca?> <? if ($dias_diferenca == 1 ) { echo "dia"; } else { echo "dias"; }  ?> )
</b>
</td>
<tr>
<tr>
<td colspan="2">
<table width="790" border="0" align="center" cellpadding="0" cellspacing="0" id="mytable">
<?php
if ( $metodo == "areceber" ) { 
	$querycon="SELECT * FROM boletos where status='NB' and vencimento>='$datainicio' and vencimento<='$dataifinal' order by vencimento asc";
	$consulta = mysql_query($querycon);
	$contaareceber = mysql_num_rows($consulta);
	
	if ( $contaareceber == "0" ) {
	echo '<script>alert("Não há boletos nesse periodo!");</script>';
	echo "<script>window.close();</script>";
	}
?>
<thead>
<tr>
<th>
Contribuinte</th>
<th>
Nosso Número</th>
<th>
Vencimento</th>
<th>
Valor R$</th>
</tr>
</thead>
<tbody>

<?
	
	while ($linha = mysql_fetch_array($consulta)) {
	$id							=	$linha['id'];
	$nossonumero				=	$linha['nossonumero'];
	$documento_contribuinte		=	$linha['documento_contribuinte'];
	$valor						=	$linha['valor'];
	$datavencimento				=	$linha['vencimento'];	
	$datavencimento				=	substr($datavencimento,8,2) . "/" .substr($datavencimento,5,2) . "/" . substr($datavencimento,0,4);	
	$totalgeral = $totalgeral + $valor	;
	$querycontribuinte="SELECT * FROM contribuintes where documento='$documento_contribuinte'";
	$consultacontribuinte = mysql_query($querycontribuinte);
	$linhacontribuinte = mysql_fetch_array($consultacontribuinte);	
?>
<tr>
<td align="left">
<?=$linhacontribuinte['nome']?></td>
<td align="center"><?=$nossonumero?></td>
<td align="center">
<?=$datavencimento?></td>
<td align="center">
<?=number_format($valor,2,",",".")?></td>
</tr>
<?php
}
}
?>

<?php
if ( $metodo == "recebidos" ) { 

	$querycon="SELECT * FROM boletos where status='B' and databaixa>='$datainicio' and databaixa<='$dataifinal'  order by databaixa asc";
	$consulta = mysql_query($querycon);
	$contarecebidos = mysql_num_rows($consulta);
	if ( $contarecebidos == "0" ) {
	echo '<script>alert("Não há boletos nesse periodo!");</script>';
	echo "<script>window.close();</script>";
	}
?>
<thead>
<tr>
<th>
Contribuinte</th>
<th>
Nosso Número</th>
<th>
Data Baixa</th>
<th>
Valor R$</th>
</tr>
</thead>
<tbody>

<?	
	while ($linha = mysql_fetch_array($consulta)) {
	$idboleto					=	$linha['id'];
	$nossonumero				=	$linha['nossonumero'];
	$documento_contribuinte		=	$linha['documento_contribuinte'];
	$valorbaixa					=	$linha['valorbaixa'];	
	$databaixa					=	$linha['databaixa'];	
	$databaixa					=	substr($databaixa,8,2) . "/" .substr($databaixa,5,2) . "/" . substr($databaixa,0,4);		
	$totalgeral = $totalgeral + $valorbaixa	;
	$querycontribuinte="SELECT * FROM contribuintes where documento='$documento_contribuinte'";
	$consultacontribuinte = mysql_query($querycontribuinte);
	$linhacontribuinte = mysql_fetch_array($consultacontribuinte);	

?>
<tr>
<td align="left">
<?=$linhacontribuinte['nome']?></td>
<td align="center"><?=$nossonumero?></td>
<td align="center">
<?=$databaixa?></td>
<td align="center">
<?=number_format($valorbaixa,2,",",".")?></td>
</tr>

<?php
}

}
?>
<tr>
  <td height="60" align="right" colspan="2">&nbsp;</td>
  <td height="60" align="center"><b>Total GERAL R$ </b></td>
  <td height="60" align="center"><b><?=number_format($totalgeral,2,",",".")?> </b></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td height="40" colspan="2" align="right" valign="bottom">
<div style="font: 13px Trebuchet MS; color: #000000; size:5px; float:right; padding-right:5px;">
Impresso por: <?=$_SESSION["nome_user01"]?> às <?=$novahora?> do dia <?=$novadata?> <br /> GFP - Gerenciador Financeiro Personalizado - Super Gestão www.supergestao.com
</div>
</td>
</tr>
</table>

</body>
</html>
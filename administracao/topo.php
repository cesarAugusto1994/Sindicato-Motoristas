<?php

	ob_start();

	require_once('verifica.php');

	include("config/config.php");

	include("config/data.php");


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

		<title>GFP - Gerenciador Financeiro Personalizado - <?=$titulosite_config?></title>

		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

		<link rel="stylesheet" href="css/menu.css" type='text/css'>

		<link rel="stylesheet" href="css/positions.css" type='text/css'>

		<link rel="stylesheet" href="css/formulario2.css" type='text/css'>

		<link rel="stylesheet" href="css/tabelas.css" type='text/css'>

		<style type="text/css">@import url(jquery-calendar.css);</style>

		<script src="http://code.jquery.com/jquery-latest.js"></script>

		<script src="js/metadata.js" type="text/javascript"></script>

		<script src="js/validate.js" type="text/javascript"></script>		

		<script language="javascript" type="text/javascript">

			var $j = jQuery.noConflict();

			$j().ready(function(){

				

			});

		</script>
		<script type="text/javascript" src="js/jquery-latest.js"></script>		

		<script type="text/javascript" src="openwysiwyg/scripts/wysiwyg.js"></script>

		<script type="text/javascript" src="openwysiwyg/scripts/wysiwyg-settings.js"></script>

		<script language="javascript" type="text/javascript">					

			function mudaVisu(id) {				

				var e_icon = "#" + id + "_icon";

				var ids = "#" + id;				

				var e = $j(ids).css('display');				

				if( e == 'none'){

					$j(ids).css('display','block');

					$j(e_icon).html('<img src="imagens/sobe.gif" border="none" />');

				}else{

					$j(ids).css('display','none');

					$j(e_icon).html('<img src="imagens/desce.gif" border="none" />');					

				}

			}				

			function confirmaExclusao(aURL) {

				if(confirm('Você tem certeza que deseja excluir?')) {

					location.href = aURL;

				}

			}

			function confirmaFechamentoPedido(nome,aURL) {

				if(confirm('Deseja finalizar o pedido do cliente '+ nome +'?')) {

					location.href = aURL;

				}

			}

		</script>		

	</head>

	

	<body>

		<div id="topo">

			<div id="logo" style="margin-top:10px;">

				<img src="imagens/logotipo.gif" alt="<?=$titulosite_config?>" border="0" />		

			</div>

			<div id="info">

				 GFP - Gerenciador Financeiro Personalizado<br />

				<?=date("d-m-Y"); ?> - <?=$_SESSION['nome_user01']; ?><br />		

			</div>

		</div>

				
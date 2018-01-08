<?php
ob_start();
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
</head>
<body>
<div id="topo">
<div id="logo" style="margin-top:10px;">
<img src="imagens/logotipo.gif" alt="<?=$titulosite_config?>" border="0" />		
</div>
<div id="info">
GFP - Gerenciador Financeiro Personalizado<br />
<?=date("d-m-Y"); ?>  <?=$_SESSION['nome_user01']; ?><br />		
</div>
</div>

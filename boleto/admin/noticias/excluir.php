<?php

require("../../config/conect_mysql.inc");

/*
 * monta e executa consulta em SQL
 */
$sql = "DELETE FROM noticias WHERE id = ".$_GET['id'];

$resultado = mysql_query($sql)
or die ("Erro ao remover notícia.");

header("Location: listar.php");
?>




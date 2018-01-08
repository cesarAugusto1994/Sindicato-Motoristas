<?php

require("config/conect_mysql.inc");
/*
 * monta consulta em SQL
 * seleciona as ultimas 15 noticias ordenadas
 * decrescente por data
 */
$sql = "SELECT * FROM noticias
WHERE ativar = '1' ORDER BY id DESC LIMIT 15";

/*
 * executa e trata a consulta
 */
$retorno = mysql_query($sql)
or die ("Não foi possível realizar a consulta");
if (mysql_num_rows($retorno) == 0)
   die('Nenhum registro encontrado');

/*
 * fazendo um loop para mostrar os resultados
 */
while ($linha=mysql_fetch_array($retorno))
{
   $novadata = substr($linha['data_not'],8,2) . "/" .
   substr($linha['data_not'],5,2) . "/" .
   substr($linha['data_not'],0,4);

   $novahora = substr($linha['hora_not'],0,2) . "h" .
   substr($linha['hora_not'],3,2) . "min";
   $id = $linha['id'];
   echo "<ul class=\"n_new\">";
   echo "<li><a href=\"noticias/index.php?id=$id\">{$linha['titulo']}</a></li>";
   echo "</ul>";
}

?>

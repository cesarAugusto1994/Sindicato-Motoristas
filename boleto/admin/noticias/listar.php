<?php

require("../../config/conect_mysql.inc");

/*
 * monta e executa consulta em SQL
 */
$sql = "SELECT * FROM noticias ORDER BY id DESC";
$resultado = mysql_query($sql)
or die ("Não foi possível realizar a consulta.");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="br" lang="br">
<head>
      <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
      <title>Sistema de noticias</title>
      <meta name="author" content="Israel Costa" />
      <meta name="language" content="pt-br" />
      <meta name="doc-rights" content="Public" />
</head>
<body>

<div>  <!-- Esta Div engloba metade da pagina / Destaques e sub-menu -->
<ul>
<li><a href="../index.php">Inicio adm</a></li>
<li><a href="index.php">Cadastrar Noticia</a></li>
</ul>

<table>

<tr>
<th>ID:</th>
<th>Título:</th>
<th>sub_titulo:</th>
<th>autor:</th>
<th>Data:</th>
<th>Hora:</th>
<th>Disponível?</th>
<th>Opções</th>
</tr>

<?php

/*
 * mostra os dados na tela
 */
while ($linha=mysql_fetch_array($resultado))
{
   $novadata = substr($linha['data_not'],8,2) . "/" .
   substr($linha['data_not'],5,2) . "/" .
   substr($linha['data_not'],0,4);

   $novahora = substr($linha['hora_not'],0,2) . "h" .
   substr($linha['hora_not'],3,2) . "min";

   echo "<tr>";
   echo "<td>{$linha['id']}</td>";
   echo "<td>{$linha['titulo']}</td>";
   echo "<td>{$linha['sub_titulo']}</td>";
   echo "<td>{$linha['autor']}</td>";
   echo "<td>$novadata</td>";
   echo "<td>$novahora</td>";
   echo "<td>{$linha['ativar']}</td>";
   echo "<td><a href='alterar.php?id={$linha['id']}'>Alterar</a> / ";
   echo "<a href='excluir.php?id={$linha['id']}'>Excluir</a></td>";
   echo "</tr>";
}

echo "</table>";

?>

</body>
</html>
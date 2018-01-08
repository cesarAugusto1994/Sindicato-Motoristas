<?
// Faz a conexão com o anco de dados atraves do arquivo conect_mysql.inc
require("config/conect_mysql.inc");
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

<div id="conten_left"><!-- Div conteúdo  -->
<h2>O que há de novo?</h2>    <!-- Ultimas Noticias do site -->
<? include('admin/noticias/mostra_noticia.php');?>  <!-- Aqui eu fiz um include para um arquivo que me dá somente uma listagem com os titulos das noticias, no caso os das ultimas 15 noticias-->
</div>
</body>
</html>

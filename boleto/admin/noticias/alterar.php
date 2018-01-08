<?
require("../../config/conect_mysql.inc");
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

<ul>
<li><a href="../index.php">Inicio adm</a></li>
<li><a href="index.php">Cadastrar Noticia</a></li>
<li><a href="listar.php">listar noticias</a></li>
</ul>
<p class="adm_p_fala">Alterar Cadastro</p>
<?php

$id = $_REQUEST["id"];
  $sql = "Select * From noticias WHERE id =".$_GET['id'];
  $resultado = mysql_query($sql) or die(mysql_error());

					while ($linha = mysql_fetch_array($resultado)){
/*
 * faz a conexao ao banco
 * e seleciona a base de dados
 */
require("../../config/conect_mysql.inc");

/*
 * monta e executa consulta em SQL
 */


?>
<form class="adm_f_contact" action="inserir.php?t=a&n=<? echo $id?>" method="post">
<label class="l_titu">Titulo: <input class="i_titu" type="text" name="titulo" title="Digite o titulo da Noticia" value="<? echo $linha['titulo'] ?>" size="60" /></label> <br />  <br />
<label class="l_s_titu">Sub Titulo: <input class="i_s_titu" type="text" name="sub titulo" title="Digite o sub titulo da Noticia" value="<? echo $linha['sub_titulo'] ?>" size="60" /></label> <br /> <br />
<label class="l_autor">Autor: <input class="i_autor" type="text" name="autor" title="Digite o nome do autor da Noticia" value="<? echo $linha['autor'] ?>" size="60" /></label> <br /> <br />
<a class="cat_cads" href="#" onclick="abrir()">Cadastrar categoria?</a>
<label class="s_cat_not">*Categoria:<select class="s_cat" size="1" name="categoria"  title="Escolha a categoria da noticia."> <br /> <br />

<?php
//gera a lista de categorias.
require("../../config/conect_mysql.inc");
$res = mysql_query("SELECT * FROM categorias");
while($registro = mysql_fetch_row($res))
{
$idcat = $registro[0];
$nome = $registro[1];
echo"<option value=\"$nome\"";
if($nome == $idcat)
echo"selected";
echo">$nome</option>\n";
}
?>
</select> <br />
     <label for="mostra">Mostrar Notícia? </label>
     <input name="ativar" id="ativar" type="checkbox" value="1" <? if ($linha['ativar'] == 1) { ?>checked="checked"<? } ?>/>
     <label class="l_txt">Noticia:</label> <textarea class="txt_txt" id="texto" rows="8" name="conteudo" cols="85" title="Alterar a noticia?"> <? echo $linha['conteudo'] ?></textarea><br />
     <input name="data_not" type="hidden" value="<? echo date("Y/m/d");?>" />
     <input name="hora_not" type="hidden" value="<? echo date("H:i:s");?>" />
     <input class="i_envia" type="submit" value="Alterar noticia" name="Alterar" title="Clique para que as informações sejam enviadas." />
     <input class="i_reset" type="reset" value="Limpar formulário" name="limpar" title="Clique para que as informações sejam apagadas do formulário." /> <br />
     </form>

<!-- ################################################################ -->
<?
}
?>

</div> <!-- FIM da Div que engloba metade da pagina / Destaques e sub-menu -->
</body>
</html>
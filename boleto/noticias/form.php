<?php

require("../config/conect_mysql.inc");

$query =("select * from comentarios WHERE noticias_id=$id");
$result = mysql_query ($query) or die ("Não foi possível realizar a consulta");

while ($linha=mysql_fetch_array($result));
{
   $novadata = substr($linha['data_coment'],8,2) .  "/" .
   substr($linha['data_coment'],5,2) .  "/" .
   substr($linha['data_coment'],0,4);

   $novahora = substr($linha['hora_coment'],0,2)  . ":" .
   substr($linha['hora_coment'],3,2)  . "min";

   $comentario  = anti_injection ($linha['comentario']);
   $comentario  = specialchars ($linha['comentario']);
   $comentario  = htmlent ($linha['comentario']);

   echo "<div>";
   echo "<p><strong>{$linha['nome']}</strong></p>";
   echo "<div>$comentario</div><br />";
   echo "<p><strong>Postado em</strong>:  <em>$novadata</em>  as  <em>$novahora</em>. </p>";
   echo "<p><a href=\"{$linha['site']}\" title=\"{$linha['site']}\" target=\"_blank\">{$linha['site']}</a></p>";
   echo "</div>";
}
?>



<fieldset>
<form action="inserir.php?t=i" method="post"> <!-- Form comentarios -->

<?php

$id = $_GET['id'];

$sql = "SELECT * FROM noticias WHERE id=$id";

$retorno = mysql_query($sql)
or die ("Não foi possível realizar a consulta");
?>
<input type="hidden" name="noticias_id" value="<? echo"$id";?>" />

  <h3>Comente esta noticia</h3>
   <label for="nome">Seu nome:<input type="text" name="nome" id="nome" title="Digite seu nome por favor" value="Digite seu nome por favor" onclick="javascript:if (this.value=='Digite seu nome por favor') this.value='';" onkeypress="javascript:if (this.value=='Digite seu nome por favor') this.value='';" onblur="javascript:if (this.value=='') this.value='Digite seu nome por favor';" size="50" /></label>  <br />

   <label for="email">Seu email:<input type="text" name="email" id="email" title="Digite seu email por favor" value="Digite seu email por favor" onclick="javascript:if (this.value=='Digite seu email por favor') this.value='';" onkeypress="javascript:if (this.value=='Digite seu email por favor') this.value='';" onblur="javascript:if (this.value=='') this.value='Digite seu email por favor';" size="50" /></label> <p class="aviso">* Seu email não será mostrado.</p><br />

   <label for="site">Seu site:<input type="text" name="site" id="site" title="Digite o end. do seu site por favor" value="" size="50" /></label>  <p class="aviso">* Não é obrigado preencher este campo.</p><br />

   <label for="comentario">Seu comentário: <textarea name="comentario" rows="5" cols="74" id="comentario" lang="pt-br" title="Digite aqui seu comentário.">

   </textarea></label> <br />
   <input name="data_coment" type="hidden" value="<? echo date("Y/m/d");?>" />
     <input name="hora_coment" type="hidden" value="<? echo date("H:i:s");?>" />
   <input type="submit" name="enviar" value="Enviar comentário" />
   <input type="reset" name="reset" value="Limpar formulário" />

  </form> <!-- FIM form comentarios -->
  </fieldset>

<p class="adm_p_fala">Cadastrar Noticia!</p>
<form class="adm_f_contact" action="inserir.php?t=i" method="post">
<label for="titulo" class="l_titu">Titulo: <input class="i_titu" type="text" name="titulo" id="titulo" title="Digite o titulo da Noticia" value="Digite o titulo da Noticia" size="60" /></label> <br />  <br />
<label for="sub titulo" class="l_s_titu">Sub Titulo: <input class="i_s_titu" type="text" name="sub titulo" id="sub titulo" title="Digite o sub titulo da Noticia" value="Digite o sub titulo da Noticia" size="60" /></label> <br /> <br />
<label for="autor" class="l_autor">Autor: <input class="i_autor" type="text" name="autor" id="autor" title="Digite o nome do autor da Noticia" value="Digite o nome do autor da Noticia" size="60" /></label> <br /> <br />

<script language="javascript">
function abrir(){
	I= 'miId';                          //---- id de la ventana
	N= 20;                              //---- posicion x
	n= 50;                              //---- posicion y
	e= 350;                            //---- ancho
	r= 150;                             //---- alto
	d= '../cadas_categoria.php';                     //---- pagina de carga
	i= 'Cadastro de categorias';  //---- texto de la barra
	v=null;                              //---- indica si utiliza CSS
	INNERDIV.newInnerDiv(I,N,n,e,r,d,i,v);
}
</script>
<a class="cat_cads" href="#" onclick="abrir()">Cadastrar categoria?</a>
<label class="s_cat_not" for="categoria">*Categoria:<select class="s_cat" size="1" name="categoria"  id="categoria" title="Escolha a categoria da noticia."> <br /> <br />

<?php
//gera a lista de categorias.
require_once("../../config/conect_mysql.inc");
echo"<option value=\"-------\" selected=\"selected\">-------------------</option>\n";
$res = mysql_query("SELECT * FROM categorias");
while($registro = mysql_fetch_row($res))
{
$id_cat = $registro[0];
$nome = $registro[1];
echo"<option value=\"$id_cat\" title=\"$nome\">$nome</option>\n";
}

?>
</select> <br />
                               <script src="../../js/quicktags.js" type="text/javascript"></script>
                               <p class="men_not"><script type="text/javascript">edToolbar();</script></p>
     <label class="l_txt" for="texto">Noticia:</label> <textarea class="txt_txt" id="texto" rows="20" name="texto" cols="85" title="Digite aqui a noticia."></textarea><br />
     <input name="data_2" type="hidden" value="<? echo date("Y/m/d");?>" />
     <input name="hora" type="hidden" value="<? echo date("H:i:s");?>" />
     <input class="i_envia" type="submit" value="Enviar noticia" name="enviar" title="Clique para que as informações sejam enviadas." />
     <input class="i_reset" type="reset" value="Limpar formulário" name="limpar" title="Clique para que as informações sejam apagadas do formulário." /> <br />
     <script type="text/javascript">var edCanvas = document.getElementById('texto');</script>
     </form>


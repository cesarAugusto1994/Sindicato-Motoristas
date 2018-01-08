    <div id="comenta"> <!-- DIV responsavél pelo recebimento dos comentarios -->
    <?php

    require("../config/conect_mysql.inc");

    $query =("select * from comentario WHERE noticias_id=$id");
    $result = mysql_query ($query)
    or die ("Não foi possível realizar a consulta");

    while ($linha=mysql_fetch_array($result))
    {
    $novadata = substr($linha['data_coment'],8,2) . "/" .
    substr($linha['data_coment'],5,2) . "/" .
    substr($linha['data_coment'],0,4);

    $novahora = substr($linha['hora_coment'],0,2) . ":" .
    substr($linha['hora_coment'],3,2) . "min";

    $coment = anti_injection ($linha['comentario']);
    $coment = strip_tags ($linha['comentario'], '<b> <i> <s> <bockquote> <a>'); /* Lembra do Strip_tags que citei acima? */

    echo"<div class=\"comentario\">";
    echo "<p class=\"autor_coment\"><strong>{$linha['nome']}</strong></p>";
    echo "<div class=\"p_coment\">$coment</div><br />";
    echo "<p class=\"postdata_coment\"><strong>Postado em</strong>: <em>$novadata</em> as <em>$novahora</em>. </p>";
    echo "<p class=\"site_coment\"><em><a href=\"http://{$linha['site']}\" title=\"{$linha['site']}\" target=\"_blank\">{$linha['site']}.</a></em></p>";
    echo"</div>";
    }

    ?>
    </div> <!-- FIM da DIV responsavél pelo recebimento dos comentarios -->

    <fieldset id="c_m_form">
    <form class="c_mem_form" action="inserir.php?t=i" method="post"> <!-- Form comentarios -->

    <?php

    $id = $_GET['id'];

    //require("../../config/conect_mysql.inc");

    $sql = "SELECT * FROM noticias WHERE id=$id";

    $retorno = mysql_query($sql)
    or die ("Não foi possível realizar a consulta");
    ?>
    <input type="hidden" name="noticias_id" value="<? echo"$id";?>" />

    <p class="leg_comen">Fala ai!</p>
    <label class="l_nome_men" for="nome">Seu nome:<input class="i_nome_men" type="text" name="nome" id="nome" title="Digite seu nome por favor" value="Digite seu nome por favor" onclick="javascript:if (this.value=='Digite seu nome por favor') this.value='';" onkeypress="javascript:if (this.value=='Digite seu nome por favor') this.value='';" onblur="javascript:if (this.value=='') this.value='Digite seu nome por favor';" size="50" /></label> <br />

    <label class="l_email_men" for="email">Seu email:<input class="i_email_men" type="text" name="email" id="email" title="Digite seu email por favor" value="Digite seu email por favor" onclick="javascript:if (this.value=='Digite seu email por favor') this.value='';" onkeypress="javascript:if (this.value=='Digite seu email por favor') this.value='';" onblur="javascript:if (this.value=='') this.value='Digite seu email por favor';" size="50" /></label> <p class="aviso">* Seu email não será mostrado.</p><br />

    <label class="l_site_men" for="site">Seu site:<input class="i_site_men" type="text" name="site" id="site" title="Digite o end. do seu site por favor" value="" size="50" /></label> <p class="aviso">* Não é obrigado preencher este campo.</p><br />

    <label for="comentario" class="l_coment_txt">Seu comentário: <textarea class="txt_coment_txt" name="comentario" rows="5" cols="74" id="comentario" lang="pt-br" title="Digite aqui seu comentário.">

    </textarea></label> <br />
    <input name="data_coment" type="hidden" value="<? echo date("Y/m/d");?>" />
    <input name="hora_coment" type="hidden" value="<? echo date("H:i:s");?>" />
    <input class="i_env_coment" type="submit" name="enviar" value="Enviar comentário" />
    <input class="i_reset_coment" type="reset" name="reset" value="Limpar formulário" />

    </form> <!-- FIM form comentarios -->
    </fieldset>

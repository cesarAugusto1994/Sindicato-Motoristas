<script type="text/javascript">
$().ready(function(){    
$('#validacao').click(function(){
var erro = "";
var campos="";
var metodo     = $('#metodo').val();
var t1         = $('#t1').val();
var t2         = $('#t2').val();
if(metodo==''){
campos += "Preencha o campo Tipo" + "\n";
$('#metodo').css('background-color','#FF0000');
erro++;
}	
if(t1==''){
campos += "Preencha o campo Data Inicial" + "\n";
$('#t1').css('background-color','#FF0000');
erro++;
}
if(t2==''){
campos += "Preencha o campo Data Final" + "\n";
$('#t2').css('background-color','#FF0000');
erro++;
}
if(erro!=''){
alert("Houve "+erro+" erros: " + "\n" + campos);
return false;
}else{
return true;
}
});
$('input[@type=text]').focus(function(){
$(this).css('background-color','#E1EBF4');
});		
$('select,textarea,radio').focus(function(){
$(this).css('background-color','#E1EBF4');
});		
});
</script>

<script>
function formatar(mascara, documento){
var i = documento.value.length;
var saida = mascara.substring(0,1);
var texto = mascara.substring(i)
if (texto.substring(0,1) != saida){
documento.value += texto.substring(0,1);
}
}
</script>				
<br clear="all" />	
<br clear="all" />
<form action="relatorio_boletos.php" method="post" name="fluxo" target="_blank" id="fluxo">
<div style="text-align:center">				
<h1 class='tituloprin'>Relatório de Boletos </h1>


<div class="linha">
<div class="nome">Tipo :</div>
<div class="campo">						
<select name="metodo" id="metodo">							
<option value="">Escolha relatório</option>
<option value="areceber">A receber</option>
<option value="recebidos">Recebidos</option>
</select>
</div>
</div>

<div class="linha">						
<div class="nome">Data Inicial:</div>
<div class="campo">
<input name="t1" type="text" class="texto" id="t1" value=""
OnKeyPress="formatar('##/##/####', this)" style="width:100px"/>
</div>
</div>
<div class="linha">
<div class="nome">Data Final:</div>
<div class="campo">
<input name="t2" type="text" class="texto" id="t2" value=""
OnKeyPress="formatar('##/##/####', this)" style="width:100px"/>
</div>
</div>

<div class="linha">
<div class="nome"></div>
<div class="campo">
<input type="submit" name="metodo_button" id="validacao" value="OK" />
</div>
</div>

<br clear="all" />

<br clear="all" /><br clear="all" />				
</div>
</div>

</form>	
<?
if ($_GET['acao'] == 'alterar'){	
$nomeempresa=$_POST['nomeempresa'];
$endereco=$_POST['endereco'];
$endereco2=$_POST['endereco2'];
$endereco3=$_POST['endereco3'];
$telefone=$_POST['telefone'];
$telefone2=$_POST['telefone2'];
$telefone3=$_POST['telefone3'];
$pessoacontato=$_POST['pessoacontato'];
$emailcontato=$_POST['emailcontato'];
$urlsite=$_POST['urlsite'];
$titulosite=$_POST['titulosite'];
$textosite=$_POST['textosite'];
$palavrassite=$_POST['palavrassite'];
$msg=$_POST['msg'];
$tema=$_POST['tema'];

$query  = "UPDATE configuracao SET nomeempresa = '$nomeempresa',  endereco = '$endereco', endereco2 = '$endereco2', endereco3 = '$endereco3', 
telefone = '$telefone',telefone2 = '$telefone2',telefone3 = '$telefone3',  pessoacontato = '$pessoacontato', emailcontato = '$emailcontato',
urlsite = '$urlsite', titulosite = '$titulosite', textosite = '$textosite', palavrassite = '$palavrassite', textoempresa ='$msg', 
tema ='$tema', doc = '".$_POST['doc']."' WHERE id = '1' "; 

$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());		
echo '<script>alert("Alterações realizada com sucesso!");</script>';
echo "<script> window.location='configuracao.php'; </script>";

}

?>
<script type="text/javascript">
function moeda(z){  
v = z.value;
v=v.replace(/\D/g,"")  //permite digitar apenas números
v=v.replace(/[0-9]{12}/,"inválido")   //limita pra máximo 999.999.999,99
v=v.replace(/(\d{1})(\d{8})$/,"$1.$2")  //coloca ponto antes dos últimos 8 digitos
v=v.replace(/(\d{1})(\d{5})$/,"$1.$2")  //coloca ponto antes dos últimos 5 digitos
v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2")    //coloca virgula antes dos últimos 2 digitos
z.value = v;
}
$j().ready(function() {
// validate signup form on keyup and submit
$j("#formconfiguracao").validate({
rules: {			
nomeempresa: {
required: true
},
endereco: {
required: true
},
emailcontato: {
required: true,
email: true,
minLength: 2
},
telefone: {
required: true
},
pessoacontato: {
required: true
},
urlsite: {
required: true
}
},
messages: {			
nomeempresa: {
required: "Favor digitar o nome da empresa!!!"
},
endereco: {
required: "Favor digitar o endereço da empresa!!!"
},
emailcontato: {
required: "Por favor digite um email válido !!"						
},
telefone: {
required: "Favor digitar o telefone da empresa!!!"
},
pessoacontato: {
required: "Favor digitar o nome do contato!!!"
},
urlsite: {
required: "Favor digitar o site da empresa!!!"
},
emailcontato:"Por favor digite um email válido !!"
}
});	
});
WYSIWYG.attach('all',full2);  // full featured setup
</script>
<?
$sql_config = mysql_query("SELECT * FROM configuracao WHERE id='1'");
$rows_config = mysql_fetch_array($sql_config);
?>

<form action="configuracao.php?acao=alterar" method="post" id="formconfiguracao">		
<div class="tabela">
<h1 class='tituloprin'>Configuração</h1>
<div class="linha">
<div class="nome">Nome/Razão Social:</div>
<div class="campo">
<input name="nomeempresa" type="text" class="texto" id="nomeempresa" style="width:100% " value="<?php echo"$nomeempresa_config";?>" />
</div>
</div>
<div class="linha">
<div class="nome">CNPJ:</div>
<div class="campo">
<input name="doc" type="text" class="texto" id="doc" style="width:100% " value="<?php echo"$doc_config";?>" />
</div>
</div>
<div class="linha">
<div class="nome">Endereço:</div>
<div class="campo">
<input name="endereco" type="text" class="texto" id="endereco" style="width:100% " value="<?php echo"$endereco_config";?>" />
</div>
</div>
<div class="linha">
<div class="nome">Endereço 2:</div>
<div class="campo">
<input name="endereco2" type="text" class="texto" id="endereco2" style="width:100% " value="<?php echo $endereco2_config;?>" />
</div>
</div>
<div class="linha">
<div class="nome">Endereço 3:</div>
<div class="campo">
<input name="endereco3" type="text" class="texto" id="endereco3" style="width:100% " value="<?php echo $endereco3_config;?>" />
</div>
</div>
<div class="linha">
<div class="nome">Telefone:</div>
<div class="campo">
<input name="telefone" type="text" class="texto" id="telefone" style="width:100% " value="<?php echo"$telefone_config";?>" />
</div>
</div>
<div class="linha">
<div class="nome">Telefone 2:</div>
<div class="campo">
<input name="telefone2" type="text" class="texto" id="telefone2" style="width:100% " value="<?php echo"$telefone2_config";?>" />
</div>
</div>
<div class="linha">
<div class="nome">FAX:</div>
<div class="campo">
<input name="telefone3" type="text" class="texto" id="telefone3" style="width:100% " value="<?php echo"$telefone3_config";?>" />
</div>
</div>
<div class="linha">
<div class="nome">Contato:</div>
<div class="campo">
<input name="pessoacontato" type="text" class="texto" id="pessoacontato" style="width:100% " value="<?php echo"$pessoacontato_config";?>" />
</div>
</div>
<div class="linha">
<div class="nome">E-mail:</div>
<div class="campo">
<input name="emailcontato" type="text" class="texto" id="emailcontato" style="width:100% " value="<?php echo"$emailcontato_config";?>" />
</div>
</div>
<div class="linha">
<div class="nome">Site:</div>
<div class="campo">
<input name="urlsite" type="text" class="texto" id="urlsite" style="width:100% " value="<?php echo"$urlsite_config";?>" />
</div>
</div>			
<div class="linha">
<div class="nome">Titulo do site:</div>
<div class="campo">
<input name="titulosite" type="text" class="texto" id="titulosite" style="width:100% " value="<?php echo"$titulosite_config";?>" maxlength="70" />
</div>
</div>
<div class="linha">
<div class="nome">Texto do site:</div>
<div class="campo">
<input name="textosite" type="text" class="texto" id="textosite" style="width:100% " value="<?php echo"$textosite_config";?>" maxlength="200" />
</div>
</div>
<div class="linha">
<div class="nome">Palavras-chave:</div>
<div class="campo">
<input name="palavrassite" type="text" class="texto" id="palavrassite" style="width:100% " value="<?php echo"$palavrassite_config";?>" maxlength="200" />
1 a 20, separe p/ v&iacute;rgula e espa&ccedil;o.
</div>
</div>

<div class="linha">
<div class="nome"></div>
<div class="campo"><input name="Submit1" type="submit" id="Submit1" value="Enviar" /></div>
</div>
</div>
</form>
<br />
<br />
<br />
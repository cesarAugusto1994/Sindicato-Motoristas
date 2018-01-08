<html>
<title>Boleto Web Caixa</title>
<head>
<meta http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
<link rel="stylesheet" href="style.css"/>
<script type="text/javascript" src="jquery-latest.js"></script>
<script type="text/javascript">
$().ready(function(){    
// Valida��o do formul�rio, conforme atributo rel passado para os campos a serem validadados
$('#teste').click(function(){
var erro = "";
var campos="";
var er_email = new RegExp("^[a-zA-Z0-9]{1}([\._a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+){1,3}$"); 			
var nome = $('#nome').val();
var documento = $('#documento').val();
var endereco = $('#endereco').val();	
var cidade = $('#cidade').val();						
var estado = $('#estado').val();
var cep = $('#cep').val();						
var valor = $('#valor').val();	
var vencimento = $('#vencimento').val();						
if(nome==''){
campos += "Preencha o campo Nome" + "\n";
$('#nome').css('background-color','#FF0000');
erro++;
}
if(documento==''){
campos += "Preencha o campo Documento" + "\n";
$('#documento').css('background-color','#FF0000');
erro++;
}	
if(endereco==''){
campos += "Preencha o campo Endere�o" + "\n";
$('#endereco').css('background-color','#FF0000');
erro++;
}	
if(cidade==''){
campos += "Preencha o campo Cidade" + "\n";
$('#cidade').css('background-color','#FF0000');
erro++;
}	
if(estado==''){
campos += "Selecione o campo Estado" + "\n";
$('#estado').css('background-color','#FF0000');
erro++;
}	
if(cep==''){
campos += "Preencha o campo CEP" + "\n";
$('#cep').css('background-color','#FF0000');
erro++;
}	
if(valor==''){
campos += "Preencha o campo Valor" + "\n";
$('#valor').css('background-color','#FF0000');
erro++;
}		
if(vencimento==''){
campos += "Preencha o campo Vencimento" + "\n";
$('#vencimento').css('background-color','#FF0000');
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
});
</script>
<script type="text/javascript">
function formatar_moeda(campo, separador_milhar, separador_decimal, tecla) {
var sep = 0;
var key = '';
var i = j = 0;
var len = len2 = 0;
var strCheck = '0123456789';
var aux = aux2 = '';
var whichCode = (window.Event) ? tecla.which : tecla.keyCode;
if (whichCode == 13) return true; // Tecla Enter
if (whichCode == 8) return true; // Tecla Delete
key = String.fromCharCode(whichCode); // Pegando o valor digitado
if (strCheck.indexOf(key) == -1) return false; // Valor inv�lido (n�o inteiro)
len = campo.value.length;
for(i = 0; i < len; i++)
if ((campo.value.charAt(i) != '0') && (campo.value.charAt(i) != separador_decimal)) break;
aux = '';
for(; i < len; i++)
if (strCheck.indexOf(campo.value.charAt(i))!=-1) aux += campo.value.charAt(i);
aux += key;
len = aux.length;
if (len == 0) campo.value = '';
if (len == 1) campo.value = '0'+ separador_decimal + '0' + aux;
if (len == 2) campo.value = '0'+ separador_decimal + aux;
if (len > 2) {
aux2 = '';
for (j = 0, i = len - 3; i >= 0; i--) {
if (j == 3) {
aux2 += separador_milhar;
j = 0;
}
aux2 += aux.charAt(i);
j++;
}
campo.value = '';
len2 = aux2.length;
for (i = len2 - 1; i >= 0; i--)
campo.value += aux2.charAt(i);
campo.value += separador_decimal + aux.substr(len - 2, len);
}
return false;
}
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
</head>
<body BGCOLOR="#FFFFFF">
<br>
<!--
<form method="POST" action="boleto_cef_sigcb.php" onSubmit="return Consiste(this)" name="BoletoWebCaixa">
<table border="1" cellspacing="0" cellpadding="4" width="100%">
<tr>
<td align="left" valign="middle" colspan="2" bgcolor="#DFEFFF">
<p align="center"><font color="#0000FF"> <font color="#000000"><b>Preencha corretamento todos os campos do formul&aacute;rio abaixo para gerar o Boleto Bancario </b></font></font></td>
</tr>
<tr>
<td align="left" valign="middle" width="36%"><strong>Nome :</strong> </td>
<td align="left" width="64%"> <div align="left">
<input name="nome" type="text" id="nome" size="70" maxlength="40">
</div></td>
</tr>
<tr>
<td width="36%" height="40"><b><font size="3">CPF OU CNPJ</font>:</b></td>
<td align="left" width="64%"> <input name="documento" type="text" id="documento"  size="40" maxlength="15"> 
somente n&uacute;meros  </td>
</tr>
<tr>
<td align="left" valign="middle" width="36%"><strong>Endereço:</strong> </td>
<td align="left" width="64%"> <div align="left">	<input name="endereco" type="text" id="endereco" size="70" maxlength="40"> </div></td>
</tr>
<td align="left" valign="middle" width="36%"><strong>Bairro:</strong> </td>
<td align="left" width="64%"> <div align="left">	<input name="bairro" type="text" id="bairro" size="40" maxlength="40"> </div></td>
</tr>
<tr>
<td align="left" valign="middle" width="36%" height="39"><b>Cidade: </b></td>
<td align="left" width="64%" height="39"> <div align="left"><input name="cidade" type="text" id="cidade" size="25" maxlength="25"><strong> Estado:
<select name="estado" size="1" id="estado">
		  <option value="SP">SP</option>

		  <option value="AC">AC</option>

		  <option value="AL">AL</option>

		  <option value="AM">AM </option>

		  <option value="AP">AP</option>

		  <option value="BA">BA</option>

		  <option value="CE">CE</option>

		  <option value="DF">DF</option>

		  <option value="ES" selected="selected">ES</option>

		  <option value="GO">GO</option>

		  <option value="MA">MA</option>

		  <option value="MG">MG </option>

		  <option value="MS">MS</option>

		  <option value="MT">MT</option>

		  <option value="PA">PA</option>

		  <option value="PB">PB</option>

		  <option value="PE">PE</option>

		  <option value="PI">PI</option>

		  <option value="PR">PR</option>

		  <option value="RJ">RJ </option>

		  <option value="RN">RN</option>

		  <option value="RO">RO</option>

		  <option value="RR">RR</option>

		  <option value="RS">RS</option>

		  <option value="SC">SC</option>

		  <option value="SE">SE</option>

		  <option value="SP">SP</option>

		  <option value="TO">TO </option>
		</select>
		</strong> </div></td>
	</tr>

	<tr>

	<td align="left" valign="middle" width="36%"><strong>Cep :</strong>	</td>

	<td align="left" width="64%"> <div align="left"> <strong>

		<input name="cep" type="text" id="cep" size="25" maxlength="9">

		</strong> </div></td>
	</tr>

	<tr>

	<td width="36%" height="2"><font size="3"><b><font size="3">Valor do Boleto :</font></b></font></td>

	<td align="left" width="64%" height="2"> <div align="left">

		<strong>

		<input type="text" name="valor" id="valor" size="25" maxlength="30" onKeyPress="return formatar_moeda(this,'',',',event);">
		</strong> somente n&uacute;meros </div></td>
	</tr>
	<tr>
	  <td height="2"> <font size="3"><b><font size="3">Vencimento do Boleto:</font></b></font></td>
	  <td align="left" height="2"><strong>
	    <input type="text" name="vencimento" id="vencimento" size="25" maxlength="10" OnKeyPress="formatar('##/##/####', this)">
	  </strong>digite Dia/M&ecirc;s/ANO somente n&uacute;meros da seguinte forma xx/xx/xxxx </td>
    </tr>
</table>

<br><br>

<center><input type="submit" value="Gerar  Boleto" id="teste"></center>

</form>
-->
	<div class="container">
		<div class="formBox">
			<form method="POST" action="boleto_cef_sigcb.php" onSubmit="return Consiste(this)" name="BoletoWebCaixa">
					<div class="row">
						<div class="col-sm-12">
							<h1>Preencha corretamento todos os campos do formulário abaixo para gerar o Boleto Bancario</h1>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="inputBox ">
								<div class="inputText">Nome</div>
								<input name="nome" type="text" id="nome" size="70" maxlength="40" class="input">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="inputBox">
								<div class="inputText">CPF / CNPJ</div>
								<input name="documento" type="text" id="documento"  size="40" maxlength="15" class="input"> 
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-8">
							<div class="inputBox">
								<div class="inputText">Endereço</div>
								<input name="endereco" type="text" id="endereco" size="70" maxlength="40" class="input">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="inputBox">
								<div class="inputText">Bairro</div>
								<input name="bairro" type="text" id="bairro" size="40" maxlength="40" class="input">
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col-sm-4">
							<div class="inputBox">
								<div class="inputText">Cidade</div>
								<input name="cidade" type="text" id="cidade" size="25" maxlength="25" class="input">
							</div>
						</div>

						<div class="col-sm-4">
							<div class="inputBox">
								<div class="inputText">Estado</div>
								<select name="estado" size="1" id="estado" class="input">
									<option value="SP">SP</option>

									<option value="AC">AC</option>

									<option value="AL">AL</option>

									<option value="AM">AM </option>

									<option value="AP">AP</option>

									<option value="BA">BA</option>

									<option value="CE">CE</option>

									<option value="DF">DF</option>

									<option value="ES" selected="selected">ES</option>

									<option value="GO">GO</option>

									<option value="MA">MA</option>

									<option value="MG">MG </option>

									<option value="MS">MS</option>

									<option value="MT">MT</option>

									<option value="PA">PA</option>

									<option value="PB">PB</option>

									<option value="PE">PE</option>

									<option value="PI">PI</option>

									<option value="PR">PR</option>

									<option value="RJ">RJ </option>

									<option value="RN">RN</option>

									<option value="RO">RO</option>

									<option value="RR">RR</option>

									<option value="RS">RS</option>

									<option value="SC">SC</option>

									<option value="SE">SE</option>

									<option value="SP">SP</option>

									<option value="TO">TO </option>
									</select>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="inputBox">
								<div class="inputText">CEP</div>
								<input name="cep" type="text" id="cep" size="25" maxlength="9" class="input">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="inputBox ">
								<div class="inputText">Valor do Boleto</div>
								<input type="text" class="input" name="valor" id="valor" size="25" maxlength="30" onKeyPress="return formatar_moeda(this,'',',',event);">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="inputBox">
								<div class="inputText">Vencimento do Boleto</div>
								<input type="text" class="input" name="vencimento" id="vencimento" size="25" maxlength="10" OnKeyPress="formatar('##/##/####', this)">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<button type="submit" name="" class="button">Gerar Boleto</button>
						</div>
					</div>
			</form>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	 <script type="text/javascript">
	 	$(".input").focus(function() {
	 		$(this).parent().addClass("focus");
	 	})
	 </script>

</body>

</html>


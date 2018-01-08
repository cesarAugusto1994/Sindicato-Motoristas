<html>
<title>Boleto Web Caixa</title>
<head>
<meta http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<script language=JavaScript type=text/javascript src='js/form.js'></script>
</head>

<body BGCOLOR="#FFFFFF">
<br>
<form method="POST" action="BoletoWebCaixa.php" onSubmit="return Consiste(this)" name="BoletoWebCaixa">
<table border="1" cellspacing="0" cellpadding="4" width="100%">
	<tr>
	<td align="left" valign="middle" colspan="2" bgcolor="#DFEFFF">
	  <p align="center"><font color="#0000FF"> <font color="#000000"><b>Informa&ccedil;&otilde;es
		sobre o Sacado</b></font> </font> </td>
	</tr>
	<tr>
	<td align="left" valign="middle" width="36%"><strong>Nome(pessoa
	  ou empresa) :</strong> </td>
	<td align="left" width="64%"> <div align="left">
		<input type="text" name="sacadoNome" size="70" maxlength="40" value="WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW">
	  </div></td>
	</tr>
	<tr>
	<td align="left" valign="middle" width="36%"><strong>Endereço
	  :</strong> </td>
	<td align="left" width="64%"> <div align="left">
		<input type="text" name="sacadoEndereco" size="40" maxlength="40" value="WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW">
	  </div></td>
	</tr>
	<tr>
	<td align="left" valign="middle" width="36%"><strong>Cep :</strong>
	</td>
	<td align="left" width="64%"> <div align="left"> <strong>
		<input type="text" name="sacadoCep" size="10" maxlength="9" value="55555-555"
onKeyPress="MascaraCEP(window.event.keyCode,this)">
		</strong> </div></td>
	</tr>
	<tr>
	<td align="left" valign="middle" width="36%" height="39"><b>Cidade
	  : </b></td>
	<td align="left" width="64%" height="39"> <div align="left">
		<input type="text" name="sacadoCidade" size="25" maxlength="25" value="São Paulo">
		<strong> Estado:
		<select name="sacadoEstado" size="1">
		  <option value="SP">SP</option>
		  <option value="AC">AC</option>
		  <option value="AL">AL</option>
		  <option value="AM">AM </option>
		  <option value="AP">AP</option>
		  <option value="BA">BA</option>
		  <option value="CE">CE</option>
		  <option value="DF">DF</option>
		  <option value="ES">ES</option>
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
	<td width="36%" height="2"><font size="3"><b><font size="3">Valor do Boleto :</font></b></font></td>
	<td align="left" width="64%" height="2"> <div align="left">
		<strong>
		<input type="text" name="valor" size="18" maxlength="13" value="88.888.888,88" onblur="javascript:formataValorDigitado(this);" onkeyup="javascript:formataValorDigitado(this);">
		</strong> </div></td>
	</tr>
	<tr>
	<td width="36%" height="2"><b>Data de Vencimento :</b></td>
	<td align="left" width="64%" height="2"> <input type="text" name="dataVencimento" size="18" value="28/03/2003" maxlength="10" onblur="javascript:formataDataDigitada(this);" onkeyup="javascript:formataDataDigitada(this);">
	</td>
	</tr>
	<tr>
	<td width="36%" height="40"><b><font size="3">Nosso N&uacute;mero</font>
	  :</b></td>
	<td align="left" width="64%"> <input type="text" name="nossoNumero" size="18" maxlength="15" value="555555555555555" onKeyUp="verificaDigito(this)"> </td>
	</tr>
	<tr>
	<td width="36%" height="40"><b><font size="3">Número do Documento</font>
	  :</b></td>
	<td align="left" width="64%"> <input type="text" name="numDocumento" size="18" maxlength="11" value="88888888888"> </td>
	</tr>
	<tr>
	  <td width="36%" height="40"><b><font size="3">Mensagem padr&atilde;o ficha
        de compensa&ccedil;&atilde;o 1</font> :</b></td>
	  <td align="left" width="64%"> <input type="text" name="msgCompensacao1" size="60" maxlength="60" value=""></td>
	</tr>
	<tr>
	  <td width="36%" height="40"><b><font size="3">Mensagem padr&atilde;o ficha
        de compensa&ccedil;&atilde;o 2</font> :</b></td>
	  <td align="left" width="64%"> <input type="text" name="msgCompensacao2" size="60" maxlength="60" value=""></td>
	</tr>
	<tr>
	  <td width="36%" height="40"><b><font size="3">Mensagem padr&atilde;o ficha
        de compensa&ccedil;&atilde;o 3</font> :</b></td>
	  <td align="left" width="64%"> <input type="text" name="msgCompensacao3" size="60" maxlength="60" value=""></td>
	</tr>
	<tr>
	  <td width="36%" height="40"><b><font size="3">Mensagem padr&atilde;o ficha
        de compensa&ccedil;&atilde;o 4</font> :</b></td>
	<td align="left" width="64%"> <input type="text" name="msgCompensacao4" size="60" maxlength="60" value=""> </td>
	</tr>

</table>
<br><br>
<center><input type="submit" value="Gerar  Boleto"></center>
</form>
<script>document.BoletoWebCaixa.sacadoNome.focus()</script>
</body>
</html>

<div id="conteudo">
<p>
<form action="logar.php" method="post">
<div align="center" style="font-family:Arial;">
<? if($_GET['acao'] == 'falhou'){ echo '<h2 class="negrito">'.$_GET['causa'].'</h2>'; } ?>
</div>	
<h3>Área Restrita</h3>
<div id="tabela">
<br />
<table width="700" border="0" align="center" cellpadding="2" cellspacing="2">
<tr onMouseOver="javascript:this.style.background='#F5F5F5';" onMouseOut="javascript:this.style.background='#fff';">
<td width="102">Login :</td>
<td width="330"><input type="text" name="login" id="login" maxlength="250" style="width: 99%" /></td>
<td width="100">&nbsp;</td>
</tr>
<tr onMouseOver="javascript:this.style.background='#F5F5F5';" onMouseOut="javascript:this.style.background='#fff';">
<td width="102">Senha :</td>
<td width="330"><input type="password" name="password" id="password" maxlength="250" style="width: 99%" /></td>
<td width="100">&nbsp;</td>
</tr>
<tr onMouseOver="javascript:this.style.background='#F5F5F5';" onMouseOut="javascript:this.style.background='#fff';">
<td width="102"><input name="Submit1" type="submit" id="Submit1" value="Enviar" /></td>
<td><span onclick="senha_show()">Lembrar Senha</span></td>
<td width="100">&nbsp;</td>
</tr>
</table>
<br />
</div>

</form>
</p>
</div>
<script type="text/javascript">
function senha_show(){
document.getElementById('senha_id').style.display='block';
}
function senha_nao_show(){
document.getElementById('senha_id').style.display='none';
}
</script>
<div align="center" id="conteudo">
<p>
<div align="center" id="senha_id"style="display:none; float:left;" >
<form action="?acao=lembrarsenha" method="post">
<table width="700" border="0" align="center" cellpadding="2" cellspacing="2">
<tr onMouseOver="javascript:this.style.background='#F5F5F5';" onMouseOut="javascript:this.style.background='#fff';">
<td width="102px" align="left">E-mail :</td>
<td width="330px"><input type="text" name="email" id="email" maxlength="250" style="width: 99%" /></td>
<td width="70px"><input name="Submit1" type="submit" id="Submit1" value="Enviar" /> </td>
<td width="30px"><span onclick="senha_nao_show()"><img src="imagens/excluir.png" title="Excluir" border="0" /></span></td>
</tr>
</table>
</form>
<br /><br /><br />
</div>

</p>
</div>
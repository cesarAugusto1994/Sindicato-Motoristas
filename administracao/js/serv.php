<?php


if ($_GET['acao'] == 'editar'){
	define('MAX_WIDTH', 400);
	define('MAX_HEIGHT', 400);
	include('dimensiona.php');
	$local = 'fotos/';
	
	if ($_POST['idk'] <> ''){
		
		$Atitulo=$_POST['titulo'];
		$Adescricao=$_POST['descricao'];
		$Aid=$_POST['idk'];
		$Acategoria=$_POST['categoria'];

		//----------------------------------
		$Afoto_tmp=$_FILES['foto']['tmp_name'];
		$Afoto=$_FILES['foto']['name'];
		//-----------------------------------
		
			if ($Afoto<>''){
				
				
				
				$query = "UPDATE servico SET id_categoria='".$Acategoria."',foto= '".$Afoto."', nome = '".$Atitulo."',servico='".$Adescricao."'  WHERE id = '".$Aid."' "; 
				$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
				
			
			}else{
				$query = "UPDATE servico SET id_categoria='".$Acategoria."',nome = '".$Atitulo."',servico='".$Adescricao."'  WHERE id = '".$Aid."' "; 
				$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
			}
		echo "<script> alert(\"Dados Alterados com sucesso.\")</script>";
		//---------------------------------------------------------------
		echo "<script> window.location=\"cad_serv.php\";</script>";
		//---------------------------------------------------------------
		//echo $Aid;
        //echo $Atitulo;
	}else{
		
		RedimensionaImagem($_FILES['foto'],$local);
		$query="INSERT INTO servico ( id_categoria,foto,nome,servico ) VALUES ( 
		'".$_POST['categoria']."','".$_FILES['foto']['name']."','".$_POST['titulo']."' ,'".$_POST['descricao']."')";

		$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
		echo "<script> alert(\"Dados Enviados com sucesso.\")</script>";
		//---------------------------------------------------------------
		echo "<script> window.location=\"cad_serv.php\";</script>";
		//---------------------------------------------------------------
	}
}elseif($_GET['acao'] == 'alterar'){
	$id = $_GET['codigo'];
	$query="SELECT * FROM servico WHERE id = '".$id."'";
	$res=mysql_query($query);
	$cod=mysql_fetch_array($res);
	
	$titulo=$cod['nome'];
	$id_alterar=$cod['id'];
	$descricao=$cod['servico'];
	$foto=$cod['foto'];
	$idcat=$cod['id_categoria'];
	//echo $idcat;
	
	echo $foto;
   
}elseif($_GET['acao']== 'excluir'){

		$query = 'DELETE FROM servico WHERE id = \''.$_GET['codigo'].'\'';
		$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
		echo "<script> alert(\"Dados excluidos com sucesso.\")</script>";
	}



?>
<html>
<head>
<title><? echo $titulodosistema_config; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="estilos/styllo.css" type='text/css'>
<?php echo $elemento_stylebody; ?>


<!-- inicio do java pergunta -->
<script language="javascript" type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
function confirmaExclusao(aURL) {
	if(confirm('Você tem certeza que deseja excluir?')) {
		location.href = aURL;
	}
}


function toggleDiv(id,flagit) {
	var divName = id; // div that is to follow the mouse
						   // (must be position:absolute)
	var offX = 15;          // X offset from mouse position
	var offY = 15;          // Y offset from mouse position
	
	function mouseX(evt) {if (!evt) evt = window.event; if (evt.pageX) return evt.pageX; else if (evt.clientX)return evt.clientX + (document.documentElement.scrollLeft ?  document.documentElement.scrollLeft : document.body.scrollLeft); else return 0;}
	function mouseY(evt) {if (!evt) evt = window.event; if (evt.pageY) return evt.pageY; else if (evt.clientY)return evt.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop); else return 0;}
	
	function follow(evt) {if (document.getElementById) {var obj = document.getElementById(divName).style; obj.visibility = 'visible';
	obj.left = (parseInt(mouseX(evt))+offX) + 'px';
	obj.top = (parseInt(mouseY(evt))+offY) + 'px';}}
	document.onmousemove = follow;
	if (flagit=="1"){
		if (document.layers) document.layers[''+id+''].display = ""
		else if (document.all) document.all[''+id+''].style.display = ""
		else if (document.getElementById) document.getElementById(''+id+'').style.display = ""
	}else
		if (flagit=="0"){
			if (document.layers) document.layers[''+id+''].display = "none"
			else if (document.all) document.all[''+id+''].style.display = "none"
			else if (document.getElementById) document.getElementById(''+id+'').style.display = "none"
	}
}


</script>
</head>
<body>
<div id="MyDiv" style="position:absolute; overflow:hidden; visibility: hidden;display: none; z-index:999; background-color:#ffffcc;" >
	<img src="fotos/<?=$foto?>" alt="Foto" />
</div>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<form name='form1' method='post' action=''>
</form>	
    <tr>
      <td>
        <table width="736"  border="0" align="center" cellpadding="0" cellspacing="2">
        <tr>
          <th width="732" height="100%" valign="top" bgcolor="f5f5f5" scope="row"><div align="left">&nbsp;SERVI&Ccedil;OS</div></th>
          </tr>
        <tr>
          <th height="100%" align="center" valign="top" scope="row">
            <form action="?acao=editar" method="post" enctype="multipart/form-data" name="F1" id="F1" class="cssform">
              <fieldset>
              <legend><img src="imagens/0018.gif" alt="0" width="20" height="22">&nbsp;&nbsp;
                <? if($_GET['acao'] == 'alterar'){ echo 'ALTERAR :'; }else{ echo 'CADASTRAR :';} ?>
                &nbsp;&nbsp;</legend>
                <br />
              <br />
              <input name="idk" type="hidden" id="idk" value="<?=$id_alterar;?>" />
                &nbsp;
              <p>
                <label for="tipo1"></label>
              </p>
                <table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td align="right"><font class="textoForm">CATEGORIA  : </font></td>
                    <td><label>
                      <select name="categoria" class="texto" id="categoria" >
					  <?php $sel_categoria=mysql_query("select * from categoriaserv order by titulo asc");
                        while ($linha=mysql_fetch_array($sel_categoria)){
							  $idcategoria=$linha['id'];
							  $titulocategoria=$linha['titulo'];
							
							?>
							<option value="<?=$idcategoria; ?>" <? if($idcategoria==$idcat){ echo "selected"; } ?>><? echo $titulocategoria ; ?></option>
						<?
						}
						
						?>
                    </select>
                    </label></td>
                  </tr>
                  <tr>
                    <td width="33%" align="right"><font class="textoForm">NOME / EMPRESA :</font></td>
                    <td width="67%"><input name="titulo" type="text" class="texto" id="contratacao1"  value="<?=$titulo;?>" style="width: 75% "></td>
                  </tr>
                  <tr>
                    <td align="right"><font class="textoForm">DESCRI&Ccedil;&Atilde;O DO PRODUTO </font></td>
                    <td><label>
                      <textarea name="descricao" rows="5" class="texto" id="descricao" style="width:75%"><?=$descricao; ?></textarea>
                    </label></td>
                  </tr>
                  <tr>
                    <td align="right"><font class="textoForm">IMAGEM DA FAIXADA:</font></td>
                    <td><input type='File' class='texto' name='foto' value='' >
                      <? if($_GET['acao']=='alterar'){ echo '<br /><a href="#" onMouseOver="toggleDiv(\'MyDiv\',1)" onMouseOut="toggleDiv(\'MyDiv\',0)" >Ver imagem</a>'; } ?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><input name="Submit2" type="submit" value="ENVIAR DADOS"></td>
                  </tr>
                </table>
              </fieldset>
            </form>
            <p>&nbsp;            </p>
            <p>            </p>
            <p><span class="texto">..................................................................................................................................................................</span></p>
          <p>            </p>
          <table width="680" border="0" align="center" cellpadding="2" cellspacing="2" bordercolor="#FFFFFF">
        <tr bgcolor="#FFFFFF">
          <td width="70" bgcolor="#E9E9E9" align="center" class="texto">&nbsp; CÓDIGO</td>
          <td width="269" height="30" align="left" bgcolor="#E9E9E9" class="texto">&nbsp;&nbsp;PRODUTOS</td>
          <td width="269" align="left" bgcolor="#E9E9E9" class="texto">&nbsp; CATEGORIA</td>
          <td width="70" bgcolor="#E9E9E9" align="center" class="texto">&nbsp;OPÇÕES</tr>
      </table>

<?php


$sql = mysql_query("SELECT * FROM servico order by nome ASC");
$contagem = mysql_num_rows($sql);
$i2=0; 
while($linha = mysql_fetch_array($sql)){ 
      $titulo = $linha['nome'];
      $id = $linha['id'];
	  $categu=$linha['id_categoria'];
	  


$i2++; 

if ( ($i2%2) == '0') 
$cor2 = "#f5f5f5";
else
$cor2 = "#fcfafa";	
?>

     <table width="680" border="0" align="center" cellpadding="2" cellspacing="2" bordercolor="#FFFFFF">
        <tr bgcolor="<?php echo"$cor2"; ?>">
          <td width="70" align="center" class="texto"> <?php echo "$id" ; ?></td>
          <td width="269" align="left" class="texto">&nbsp;<?php echo "$titulo" ; ?></td>
          <td width="269" align="left" class="texto">&nbsp;<? 
		  $sqlcateg=mysql_query("select * from categoriaserv where id=$categu");
		  $linhacategu=mysql_fetch_array($sqlcateg);
		  $titulocategoria=$linhacategu['titulo'];
		  echo $titulocategoria ; ?></td>
          <td width="70" align="center" class="texto">
<a href="?acao=alterar&codigo=<?php echo"$id"; ?>"><img src='http://www.bigcasa.com.br/imagens/admin/alterar.gif' border='0' alt='[ ALTERAR ]'></a> 


<a href="javascript:confirmaExclusao('?acao=excluir&codigo=<?php echo"$id"; ?>')"><img src='imagens/excluir.gif' border='0'alt='[ EXCLUIR ]'></a></td>
        </tr>
      </table>

<?php
}
?>

     <table width='680' border="0" align="center" cellpadding="2" cellspacing="2" bordercolor="#FFFFFF">
        <tr bgcolor="<?php echo"$cor2"; ?>">
          <td width="680" class="texto"><center>
<?php 
if ( $contagem <= "0" ) {
echo "<br><br>Não consta nenhuma categoria no cadastro<br><br><br><br><br><br>" ; 
}
?></center></td>
        </tr>
      </table>
<br><br><br><br><br></th>
        </tr>
        </table></td>
    </tr>
  </table>
</body>
</html>
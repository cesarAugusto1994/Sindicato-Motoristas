<?
	if ( $_GET['acao'] == "alterar_status" ) {
		$codigo_id 	=	$_GET['codigo_id'];
		$opcao		=	$_GET['opcao'];
		$query 		=	"UPDATE tbl_membros SET status='$opcao' WHERE codigo='$codigo_id' ";
		$result		=	mysql_query($query) or die ("Error in query: $query. " .mysql_error());
	}

	if ($_GET['acao']== 'editar') {
		$id			=	$_POST['id'];
		$Anome 		=	addslashes($_POST['nome']);
		$Alogin 	=	addslashes($_POST['login']);
		$Asenha 	=	addslashes($_POST['senha']);
		$Aemail 	=	addslashes($_POST['email']);
		if($_POST['id']<>'') {
			$consulta = "SELECT * FROM tbl_membros WHERE login = '$Alogin' AND codigo <> '$id'";
			$resultcon = mysql_query($consulta) or die ("Error in query: $conlusta. " .mysql_error());
			$verifica = mysql_num_rows($resultcon);
			if ($verifica < 1) {
				$query  = "UPDATE tbl_membros SET nome='$Anome',login='$Alogin', senha='$Asenha',
				 email='$Aemail' WHERE codigo = '$id' ";
				$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
				echo '<script>alert("Alterações realizada com sucesso!");</script>';
				echo "<script> window.location='usuarios.php'; </script>";
			} else {
				echo '<script>alert("Login já escolhido,\nFavor escolher outro!");</script>';
				echo "<script> window.location='usuarios.php'; </script>";
			}
		} else {
			$consulta = "SELECT * FROM tbl_membros WHERE login = '$Alogin'";
			$resultcon = mysql_query($consulta) or die ("Error in query: $conlusta. " .mysql_error());
			$verifica = mysql_num_rows($resultcon);
			if ($verifica < 1) {
				$query  = "INSERT INTO tbl_membros (nome,login,senha,email,status,nivel) VALUES('$Anome','$Alogin','$Asenha','$Aemail','A','Admin') ";
				$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
				echo '<script>alert("Cadastro realizado com sucesso!");</script>';
				echo "<script> window.location='usuarios.php'; </script>";
			} else {
				echo '<script>alert("Login já escolhido,\nFavor escolher outro!");</script>';
				echo "<script> window.location='usuarios.php'; </script>";
			}
		}
	}

	if ($_GET['acao']=='alterar') {
		$id			=	$_GET['codigo'];
		$query  	=	"SELECT * FROM tbl_membros WHERE codigo = '$id'";
		$result 	=	mysql_query($query) or die ("Error in query: $query. " .mysql_error());
		$linha		=	mysql_fetch_array($result);
		$Anome 		=	$linha['nome'];
		$Alogin 	=	$linha['login'];
		$Asenha 	=	$linha['senha'];
		$Aemail 	=	$linha['email'];
	}

	if($_GET['acao']== 'excluir') {
		$id		=	$_GET['id_excluir'];
		$query	=	"DELETE FROM tbl_membros WHERE codigo = '$id'";
		$result	=	mysql_query($query) or die ("Error in query: $query. " .mysql_error());
		echo "<script> alert(\"Dados excluidos com sucesso.\")</script>";
		echo "<script> window.location='usuarios.php'; </script>";
	}
?>


<script type="text/javascript">
	$j().ready(function() {
		// validate signup form on keyup and submit
		$j("#formusuario").validate({
			rules: {			
				nome: {
					required: true
				},
				email: {
					required: true,
					email: true,
					minLength: 2
				},
				login: {
					required: true,
					minLength: 5
				},
				senha: {
					required: true,
					minLength: 5
				}
			},
			messages: {			
				nome: {
					required: "Favor digitar um nome!!!"
				},
				email: {
					required: "Por favor digite um email válido !!"						
				},
				login: {
					required: "Favor digitar um Login!!!",
					minLength: "Favor digitar 5 ou mais caracteres!!!"
					
				},
				senha: {
					required: "Favor digitar uma senha!!!",
					minLength: "Favor digitar 5 ou mais caracteres!!!"
				},					
				email:"Por favor digite um email válido !!"
			}
		});	
		
	});
</script>

	<form action="usuarios.php?acao=editar" method="post" id="formusuario">
		<h1 class='tituloprin'>Usu&aacute;rios</h1>
		<div class="linha">
			<div class="nome">Nome:</div>
			<div class="campo">
				<input name="nome" type="text" class="texto" id="nome" style="width:99% " value="<?php echo $Anome;?>" />
				<input type="hidden" name="id" value="<? echo $id ?>" readonly="yes" />
			</div>
		</div>
		<div class="linha">
			<div class="nome">E-mail:</div>
			<div class="campo">
				<input name="email" type="text" class="texto" id="email" style="width:99% " value="<?php echo $Aemail;?>" />
			</div>
		</div>
		<div class="linha">
			<div class="nome">Login:</div>
			<div class="campo">
				<input name="login" type="text" class="texto" id="login" style="width:99% " value="<?php echo $Alogin;?>" />
			</div>
		</div>
		<div class="linha">
			<div class="nome">Senha:</div>
			<div class="campo">
				<input name="senha" type="password" class="texto" id="senha" style="width: 99%" value="<?php echo $Asenha;?>" />
			</div>
		</div>
		<br clear="all" />
		<br clear="all" />
		<div class="linha">
			<div class="nome"></div>
			<div class="campo">
				<input name="Submit1" type="submit" id="Submit1" value="Enviar" />
			</div>
		</div>
	</form>
	<br clear="all" />
	<br clear="all" />
	<table id="mytable" cellspacing="0" summary="The technical specifications of the Apple PowerMac G5 series">
		<caption>
		Usu&aacute;rios Inativos 
		</caption>
		<tr>
			<th scope="col" abbr="Nome" style="width:35%">Nome</th>
			<th scope="col" abbr="Login" style="width:25%">Login</th>
			<th scope="col" abbr="E-mail" style="width:30%">E-mail</th>
			<th scope="col" abbr="Opções" style="width:10%">Op&ccedil;&otilde;es</th>
		</tr>
		<?
			$i2 = 0;
			$querycon="SELECT * FROM tbl_membros WHERE status = 'I'";
			$consulta = mysql_query($querycon);
			$contauser = mysql_num_rows($consulta);
			if($contauser<1){
			?>
			<tr>
				<td colspan="4" style="text-align:center">Não existe nenhum usuario inativo</td>
			</tr>
			<?
			}
			while ($linha = mysql_fetch_array($consulta)) {
				$id	=	$linha['codigo'];
				$nome	=	$linha['nome'];
				$login	=	$linha['login'];
				$email	=	$linha['email'];
				$status	=	$linha['status'];

				$i2++;
				if ( ($i2%2) == '0'){$classe = ' class="alt"';}else{$classe = '';}
			?>
		<tr>
			<td<?=$classe ?>><?=$nome?></td>
			<td<?=$classe ?>><?=$login?></td>
			<td<?=$classe ?>><?=$email?></td>
			<td<?=$classe ?>>
				<a href="usuarios.php?acao=alterar&codigo=<?=$id?>">
					<img src="imagens/atualizar.png" alt="Atualizar" border="0" /></a>
				<a href="javascript:confirmaExclusao('usuarios.php?acao=excluir&id_excluir=<?=$id?>')">
					<img src="imagens/excluir.png" alt="Excluir" border="0" /></a>
				<?
				if ( $status == "A" ) { 
					echo"<a href='usuarios.php?acao=alterar_status&codigo_id=$id&opcao=I'>
					<img src='imagens/ativo.png' alt='Inativar' border='0' /></a> "; 
				} else { 
					echo"<a href='usuarios.php?acao=alterar_status&codigo_id=$id&opcao=A'>
						<img src='imagens/inativo.png' alt='Ativar' border='0' /></a> ";  
				}
				?>
			</td>
		</tr>
		<?	}?>				
	</table>

	<br clear="all" />
	<br clear="all" />

	<table id="mytable" cellspacing="0" summary="The technical specifications of the Apple PowerMac G5 series">
		<caption>
		Usu&aacute;rios Ativos 
		</caption>
		<tr>
			<th scope="col" abbr="Nome" style="width:35%">Nome</th>
			<th scope="col" abbr="Login" style="width:25%">Login</th>
			<th scope="col" abbr="E-mail" style="width:30%">E-mail</th>
			<th scope="col" abbr="Opções" style="width:10%">Op&ccedil;&otilde;es</th>
		</tr>
		<?
			$i2 = 0;
			$querycon="SELECT * FROM tbl_membros WHERE status = 'A'";
			$consulta = mysql_query($querycon);
			$contauser = mysql_num_rows($consulta);
			if($contauser<1) {
			?>
			<tr>
				<td colspan="4" style="text-align:center">N&atilde;o existe nenhum usuario ativo</td>
			</tr>
			<?
			}
			while ($linha = mysql_fetch_array($consulta)) {
				$id	=	$linha['codigo'];
				$nome	=	$linha['nome'];
				$login	=	$linha['login'];
				$email	=	$linha['email'];
				$status	=	$linha['status'];

				$i2++;
				if ( ($i2%2) == '0'){$classe = ' class="alt"';}else{$classe = '';}
			?>
		<tr>
			<td<?=$classe ?>><?=$nome?></td>
			<td<?=$classe ?>><?=$login?></td>
			<td<?=$classe ?>><?=$email?></td>
			<td<?=$classe ?>>
				<a href="usuarios.php?acao=alterar&codigo=<?=$id?>">
					<img src="imagens/atualizar.png" alt="Atualizar" border="0" /></a>
					<a href="javascript:confirmaExclusao('usuarios.php?acao=excluir&id_excluir=<?=$id?>')">
					<img src="imagens/excluir.png" alt="Excluir" border="0" /></a>
				<?
				if ( $status == "A" ) {
					echo"<a href='usuarios.php?acao=alterar_status&codigo_id=$id&opcao=I'>
					<img src='imagens/ativo.png' alt='Inativar' border='0' /></a> ";
				}else {
					echo"<a href='usuarios.php?acao=alterar_status&codigo_id=$id&opcao=A'>
						<img src='imagens/inativo.png' alt='Ativar' border='0' /></a> ";
				}
				?>
			</td>
		</tr>
		<?	}?>
	</table>
	<br clear="all" />
	<br clear="all" />

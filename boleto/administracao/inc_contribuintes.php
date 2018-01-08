			<?
			switch($_GET['acao']){
			case 'editar':
			$nome = $_POST['nome'];
			$documento = preg_replace('/[^0-9]/', '',$documento);
			$endereco = $_POST['endereco'];
			$cidade = $_POST['cidade'];
			$estado = $_POST['estado'];
			$cep = $_POST['cep'];
			$id = $_POST['id'];
			if($id==''){
			$consulta = "SELECT * FROM contribuintes WHERE nome = '$nome' AND documento = '$documento'";
			$resultcon = mysql_query($consulta) or die ("Error in query: $consulta. " .mysql_error());
			$verifica = mysql_num_rows($resultcon);
			if ($verifica < 1){
			$query = "
			INSERT INTO contribuintes(
			nome,documento,endereco,cidade,estado,cep,data,hora,ip,status				
			)VALUES(
			'$nome','$documento','$endereco','$cidade','$estado','$cep','$data','$hora','$REMOTE_ADDR','A'
			)
			";
			$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());	
			echo '<script>alert("Cadastro realizado com sucesso!");</script>';
			echo "<script> window.location='contribuintes.php'; </script>";
			}else{
			echo '<script>alert("ERRO: Contribuintes já Cadastrado!");</script>';
			echo "<script> window.location='contribuintes.php'; </script>";
			}
			}else{
			$consulta = "SELECT * FROM contribuintes WHERE nome = '$nome' AND id <> '$id' AND documento = '$documento'";
			$resultcon = mysql_query($consulta) or die ("Error in query: $consulta. " .mysql_error());
			$verifica = mysql_num_rows($resultcon);
			if ($verifica < 1){
			$query = "
			UPDATE contribuintes SET 
			nome='$nome',documento='$documento',
			endereco='$endereco',
			cidade='$cidade',estado='$estado',cep='$cep'
			WHERE id = '$id'
			";
			$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());	
			echo '<script>alert("Alterações realizadas com sucesso!");</script>';
			echo "<script> window.location='contribuintes.php'; </script>";
			}else{
			echo '<script>alert("ERRO: contribuinte já Cadastrado!");</script>';
			echo "<script> window.location='clientes.php'; </script>";
			}
			}
			break;
			case 'alterar':
			$id		=	$_GET['codigo'];
			$query  = "SELECT * FROM contribuintes WHERE id = '$id'";
			$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
			$linha	= mysql_fetch_array($result);
			$nome = $linha['nome'];
			$documento = $linha['documento'];
			$endereco = $linha['endereco'];
			$cidade = $linha['cidade'];
			$estado = $linha['estado'];
			$cep = $linha['cep'];
			$id = $linha['id'];
			break;
			case 'excluir':
			$codigo_id = $_GET['id_excluir'];
			$opcao = 'D';
			$query  = "UPDATE contribuintes SET status='$opcao' WHERE id='$codigo_id' ";
			$result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
			echo '<script>alert("contribuinte excluído com sucesso!");</script>';
			echo "<script> window.location='contribuintes.php'; </script>";
			break;
			
			}
			?>
		
	<script type="text/javascript">
	$().ready(function(){    
	// Validação do formulário, conforme atributo rel passado para os campos a serem validadados
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
	campos += "Preencha o campo Endereço" + "\n";
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
		
		
										<form action="?acao=editar" method="post" id="formusuario" onSubmit="return Consiste(this)">
										<h1 class='tituloprin'>Contribuintes</h1>
										<div class="linha">
										<div class="nome">Nome:</div>
										<div class="campo">
										<input name="nome" type="text" class="texto" 
										id="nome" style="width:100%" value="<?=$nome;?>" />
										<input type="hidden" name="id" value="<?=$id ?>" readonly="yes" />
										</div>
										</div>
										<div class="linha">
										<div class="nome">Documento:</div>
										<div class="campo">
										<input name="documento" type="text" class="texto" 
										id="documento" style="width:30%" value="<?=$documento;?>" /> *somente números							
										</div>
										</div>
										
										<div class="linha">
										<div class="nome">Endereco:</div>
										<div class="campo">
										<input name="endereco" type="text" class="texto" id="endereco" 
										style="width:100% " value="<?=$endereco;?>" />
										</div>
										</div>
										<div class="linha">
										<div class="nome">Cidade:</div>
										<div class="campo">
										<input name="cidade" type="text" class="texto" id="cidade" 
										style="width:100% " value="<?=$cidade;?>" />
										</div>
										</div>
										<div class="linha">
										<div class="nome">Estado:</div>
										<div class="campo">
										<input name="estado" type="text" class="texto" id="estado" 
										style="width:100% " value="<?=$estado;?>" />
										</div>
										</div>
										<div class="linha">
										<div class="nome">CEP:</div>
										<div class="campo">
										<input name="cep" type="text" class="texto" id="cep" 
										style="width:100% " value="<?=$cep;?>" />
										</div>
										</div>
										<div class="linha">
										<div class="nome"></div>
										<div class="campo">
										<input name="Submit1" type="submit" id="teste" value="Enviar" />
										</div>
										</div>
										
										</form>
			<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
			<script src="js/jquery.quicksearch.js" type="text/javascript" charset="utf-8"></script>
			<script type="text/javascript" charset="utf-8">
			jQuery(document).ready(function () {
			jQuery('table#mytable tbody tr').quicksearch({
			stripeRowClass: ['odd', 'even'],
			position: 'before',
			attached: '#busca',
			labelText: 'Digite o texto para filtrar o resultado  :'
			});	
			})			
			</script>	
			<br clear="all" />
			<br clear="all" />
			<div id="busca"></div>
			<br clear="all" />			
	<table id="mytable" cellspacing="0" summary="Clientes" width="100%">
	<caption>Contribuintes</caption>
	<thead>
	<tr>
	<th scope="col" abbr="contribuinte" style="width:60%">Contribuinte</th>
	<th scope="col" abbr="documento" 	style="width:15%">Documento</th>	
	<th scope="col" abbr="dtcadastro" 	style="width:15%">DT cadastro</th>											
	<th scope="col" abbr="opcaoes" 		style="width:10%">Opções</th>
	</tr>
	</thead>
	<tbody>
	<?
	$i2 = 0;
	$querycon="SELECT * FROM contribuintes where status<>'D' order by nome ASC";
	$consulta = mysql_query($querycon);
	$contauser = mysql_num_rows($consulta);
	if($contauser<1){
	?>
	<tr>
	<td colspan="4" style="text-align:center">Não existe nenhum contribuinte cadastrado</td>
	</tr>
	<?		
	}
	while ($linha = mysql_fetch_array($consulta)) {
	$id				=	$linha['id'];
	$nome			=	$linha['nome'];
	$documento		=	$linha['documento'];
	$horacadastro	=	$linha['hora'];
	$datacadastro	=	$linha['data'];	
	$datacadastro	=	substr($datacadastro,8,2) . "/" .substr($datacadastro,5,2) . "/" . substr($datacadastro,0,4);																				
	$i2++;
	if ( ($i2%2) == '0'){
	$classe = ' class="alt"';
	$classe2 = ' class="busca alt"';
	}else{
	$classe = '';
	$classe2 = ' class="busca"';
	}
	?>
	<tr>
	<td<?=$classe2?>><?=$nome?></td>
	<td<?=$classe2?>><?=$documento?></td>	
	<td<?=$classe2?>><?=$datacadastro?>&nbsp;&nbsp;<?=$horacadastro?></td>					
	<td<?=$classe2?>>
	<a href="?acao=alterar&codigo=<?=$id?>">
	<img src="imagens/atualizar.png" alt="Atualizar" border="0" />
	</a>
	<a href="javascript:confirmaExclusao('?acao=excluir&id_excluir=<?=$id?>')">
	<img src="imagens/excluir.png" alt="Excluir" border="0" />
	</a>
	</td>
	</tr>
	<?	}?>
	</tbody>
	</table>
	<br clear="all" />
	<br clear="all" />
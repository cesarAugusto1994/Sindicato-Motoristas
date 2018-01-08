<!-- INICIO MENU-->
<!-- <span class="preload2"></span>-->
<ul class="menu2">	

<?php
if ( $_SESSION['nome_user01'] == "" ) {  } else {
?>


<li class="top">
<a href="configuracao.php" id="clientes_001" class="top_link">
<span>Dados da Empresa</span>
</a>
</li>


<li class="top">
<a href="usuarios.php" id="clientes_001" class="top_link">
<span>Usu&aacute;rios</span>
</a>
</li>


<li class="top">
<a href="contribuintes.php" id="clientes_001" class="top_link">
<span>Contribuintes</span>
</a>
</li>


<li class="top">
<a href="boletosareceber.php" id="clientes_001" class="top_link">
<span>Boletos a Receber</span>
</a>
</li>

<li class="top">
<a href="boletosrecebidos.php" id="clientes_001" class="top_link">
<span>Boletos Recebidos</span>
</a>
</li>

<li class="top">
<a href="relatorio.php" id="clientes_001" class="top_link">
<span>Relatorios</span>
</a>
</li>


		
<li class="top">
<a href="logout.php" id="clientes_001" class="top_link">
<span>Sair</span>
</a>
</li>
<?php
}
?>
</ul>
<!-- FIM MENU-->
<div id="conteudo">
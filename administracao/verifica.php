<?php
ob_start();
// Inicia sess�es
//session_name("LogaSistemaTeste01");
session_start();

// Verifica se existe os dados da sess�o de login
if(!isset($_SESSION["id_user01"]) || !isset($_SESSION["nome_user01"])){
    // Usu�rio n�o logado! Redireciona para a p�gina de login
	//echo 'nao esta logado';
    header("Location: index.php");
    exit;
    //echo 'n�o logou';
}
?>


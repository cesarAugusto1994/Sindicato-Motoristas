<?php
ob_start();
// Inicia sessões
//session_name("LogaSistemaTeste01");
session_start();

// Verifica se existe os dados da sessão de login
if(!isset($_SESSION["id_user01"]) || !isset($_SESSION["nome_user01"])){
    // Usuário não logado! Redireciona para a página de login
	//echo 'nao esta logado';
    header("Location: index.php");
    exit;
    //echo 'não logou';
}
?>


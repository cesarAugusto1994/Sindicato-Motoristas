<?php
ob_start();
// Conex�o com o banco de dados
include('config/config.php');    
// Inicia sess�es	
session_start();  	  
// Recupera o login
$login = isset($_POST["login"]) ? addslashes(trim($_POST["login"])) : FALSE;

// Recupera a senha
$senha = isset($_POST["password"]) ? trim($_POST["password"]) : FALSE;

// Usu�rio n�o forneceu a senha ou o login
if(!$login || !$senha){
header("Location: index.php?acao=falhou&causa=".urlencode('Voc� deve digitar seu login e senha! !!!'));       
exit;
}

/**
* Executa a consulta no banco de dados.
* Caso o n�mero de linhas retornadas seja 1 o login � v�lido,
* caso 0, inv�lido.
*/

$SQL = "SELECT * FROM tbl_membros WHERE login = '" . $login . "' and status='A' ";
$result_id = mysql_query($SQL);
$total = mysql_num_rows($result_id);

// Caso o usu�rio tenha digitado um login v�lido o n�mero de linhas ser� 1..
if($total){
// Obt�m os dados do usu�rio, para poder verificar a senha e passar os demais dados para a sess�o
$dados = mysql_fetch_array($result_id);
// Agora verifica a senha
if(!strcmp($senha, $dados["senha"])){
// TUDO OK! Agora, passa os dados para a sess�o e redireciona o usu�rio
			$_SESSION["id_user01"]   = $dados["codigo"];
			$_SESSION["nome_user01"] = stripslashes($dados["nome"]);	
			header("Location: indexadmin.php");
			exit;
}else{ // Senha inv�lida
header("Location: index.php?acao=falhou&causa=".urlencode('Login e/ou senha Errado <br>ou voc� n�o tem acesso ao sistema!!!'));
exit;
}
}else{// Login inv�lido
header("Location: index.php?acao=falhou&causa=".urlencode('Login e/ou senha Errado <br>ou voc� n�o tem acesso ao sistema!!!'));
exit;
}

?>
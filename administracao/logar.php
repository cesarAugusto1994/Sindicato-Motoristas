<?php
ob_start();
// Conexão com o banco de dados
include('config/config.php');    
// Inicia sessões	
session_start();  	  
// Recupera o login
$login = isset($_POST["login"]) ? addslashes(trim($_POST["login"])) : FALSE;

// Recupera a senha
$senha = isset($_POST["password"]) ? trim($_POST["password"]) : FALSE;

// Usuário não forneceu a senha ou o login
if(!$login || !$senha){
header("Location: index.php?acao=falhou&causa=".urlencode('Você deve digitar seu login e senha! !!!'));       
exit;
}

/**
* Executa a consulta no banco de dados.
* Caso o número de linhas retornadas seja 1 o login é válido,
* caso 0, inválido.
*/

$SQL = "SELECT * FROM tbl_membros WHERE login = '" . $login . "' and status='A' ";
$result_id = mysql_query($SQL);
$total = mysql_num_rows($result_id);

// Caso o usuário tenha digitado um login válido o número de linhas será 1..
if($total){
// Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
$dados = mysql_fetch_array($result_id);
// Agora verifica a senha
if(!strcmp($senha, $dados["senha"])){
// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
			$_SESSION["id_user01"]   = $dados["codigo"];
			$_SESSION["nome_user01"] = stripslashes($dados["nome"]);	
			header("Location: indexadmin.php");
			exit;
}else{ // Senha inválida
header("Location: index.php?acao=falhou&causa=".urlencode('Login e/ou senha Errado <br>ou você não tem acesso ao sistema!!!'));
exit;
}
}else{// Login inválido
header("Location: index.php?acao=falhou&causa=".urlencode('Login e/ou senha Errado <br>ou você não tem acesso ao sistema!!!'));
exit;
}

?>
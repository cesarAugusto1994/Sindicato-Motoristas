<?
$servidor = "localhost"; //Nome ou IP do servidor.
$user_bd = "sindimot_teste";       //Nome do usuario do BD
$senha_bd = "teste";          //Senha do usuario do BD
$banco = "sindimot_teste";         //Nome do Banco de dados.

$sql = mysql_connect($servidor, $user_bd, $senha_bd) or die("Impossivel conectar");
mysql_select_db($banco);
?>
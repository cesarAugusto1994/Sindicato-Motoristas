<?
// Mensagem de Erro
		$msg[0] = "Conexão com o banco falhou";
		$msg[1] = "Não foi possivél selecionar o banco de dados!";

require("../../config/conect_mysql.inc");

//Tipo de transação se é "Inclusão ou Alteração"
        $tipo 					= $_REQUEST["t"];
		if ($tipo <> "e"){
        $id             = $_REQUEST["id"];
        $autor   		= $_REQUEST["autor"];
        $conteudo		= $_REQUEST["conteudo"];
        $categoria		= $_REQUEST["categoria"];
        $data_not		= $_REQUEST["data_not"];
        $hora_not		= $_REQUEST["hora_not"];
        $sub_titulo		= $_REQUEST["sub_titulo"];
        $titulo		    = $_REQUEST["titulo"];
        $ativar		    = $_REQUEST["ativar"];
}
//Monta a Query de Inclusão

 	if($tipo == "i"){
		$sql = "INSERT INTO  noticias (";
        $sql = $sql."autor,";
        $sql = $sql."conteudo,";
        $sql = $sql."categoria,";
        $sql = $sql."data_not,";
        $sql = $sql."hora_not,";
        $sql = $sql."sub_titulo,";
        $sql = $sql."titulo)";
		$sql = $sql."VALUES (";
        $sql = $sql."'".$autor."', ";
        $sql = $sql."'".$conteudo."', ";
        $sql = $sql."'".$categoria."', ";
        $sql = $sql."'".$data_not."', ";
        $sql = $sql."'".$hora_not."', ";
        $sql = $sql."'".$sub_titulo."', ";
		$sql = $sql."'".$titulo."')";
        $sql = $sql.";";
}

//Monta a Query de atualização

    elseif ($tipo == "a"){
        $ativar = ($_POST['ativar']) ? $_POST['ativar'] : '0';
        $id = $_REQUEST{"n"};
        $sql = "UPDATE noticias SET ";
             $sql = $sql."titulo = '".$titulo."', ";
             $sql = $sql."sub_titulo  = '".$sub_titulo."', ";
             $sql = $sql."autor = '".$autor."', ";
             $sql = $sql."categoria = '".$categoria."', ";
             $sql = $sql."conteudo = '".$conteudo."', ";
             $sql = $sql."data_not = '".$data_not."', ";
             $sql = $sql."hora_not = '".$hora_not."', ";
             $sql = $sql."ativar = '".$ativar."' ";
             $sql = $sql." WHERE id ='".$id."'";

}

/*
 * monta e executa consulta em SQL
 */

$retorno = mysql_query($sql) or die (mysql_error());

   	header("Location: listar.php");

   	exit;

//echo $sql;

?>

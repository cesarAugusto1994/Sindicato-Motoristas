<?
// Mensagem de Erro
		$msg[0] = "Conexão com o banco falhou";
		$msg[1] = "Não foi possivél selecionar o banco de dados!";

require("../../config/conect_mysql.inc");

//Tipo de transação se é "Inclusão ou Alteração"
        $tipo 					= $_REQUEST["t"];
		if ($tipo <> "e"){
        $id_cat			= $_POST["id_cat"];
		$nome   		= $_REQUEST["nome"];
		$descricao		= $_REQUEST["descricao"];

}
//Monta a Query de Inclusão

 	if($tipo == "i"){
		$sql = "INSERT INTO 	categorias (";
        $sql = $sql."nome,";
		$sql = $sql."descricao) ";
		$sql = $sql."VALUES (";
		$sql = $sql."'".$nome."', ";
		$sql = $sql."'".$descricao."')";
		$sql = $sql.";";
}

//Monta a Query de atualização

    elseif ($tipo == "a"){

        $emp_codigo = $_REQUEST{"cod"};

        $sql = "UPDATE categorias SET ";
             $sql = $sql."nome = '".$nome."', ";
             $sql = $sql."descricao  = '".$descricao."', ";
             $sql = $sql." WHERE id_cat =".$id_cat.";";

}
// Monta a query de exclusão
 elseif ($tipo == "e"){

        $emp_codigo = $_REQUEST{"cod"};

        $sql = "DELETE FROM categorias";
        $sql = $sql." WHERE id_cat =".$id_cat.";";

}


$retorno = mysql_query($sql) or die (mysql_error());

	header("Location: index.php");

	exit;

//echo $sql;

?>

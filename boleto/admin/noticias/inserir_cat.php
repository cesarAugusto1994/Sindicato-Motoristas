<?
// Mensagem de Erro
		$msg[0] = "Conex�o com o banco falhou";
		$msg[1] = "N�o foi possiv�l selecionar o banco de dados!";

require("../../config/conect_mysql.inc");

//Tipo de transa��o se � "Inclus�o ou Altera��o"
        $tipo 					= $_REQUEST["t"];
		if ($tipo <> "e"){
        $id_cat			= $_POST["id_cat"];
		$nome   		= $_REQUEST["nome"];
		$descricao		= $_REQUEST["descricao"];

}
//Monta a Query de Inclus�o

 	if($tipo == "i"){
		$sql = "INSERT INTO 	categorias (";
        $sql = $sql."nome,";
		$sql = $sql."descricao) ";
		$sql = $sql."VALUES (";
		$sql = $sql."'".$nome."', ";
		$sql = $sql."'".$descricao."')";
		$sql = $sql.";";
}

//Monta a Query de atualiza��o

    elseif ($tipo == "a"){

        $emp_codigo = $_REQUEST{"cod"};

        $sql = "UPDATE categorias SET ";
             $sql = $sql."nome = '".$nome."', ";
             $sql = $sql."descricao  = '".$descricao."', ";
             $sql = $sql." WHERE id_cat =".$id_cat.";";

}
// Monta a query de exclus�o
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

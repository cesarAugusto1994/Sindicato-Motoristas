<?
// Mensagem de Erro
		$msg[0] = "Conexуo com o banco falhou";
		$msg[1] = "Nуo foi possivщl selecionar o banco de dados!";

//Fazendo a conexуo com o serviчo MySql
require("../config/conect_mysql.inc");

//Tipo de transaчуo se щ "Inclusуo ou Alteraчуo"
        $tipo 					= $_REQUEST["t"];
		if ($tipo <> "e"){
        $idcat			= $_POST["id_cat"];
		$nome   		= $_REQUEST["nome"];
		$descricao		= $_REQUEST["descricao"];

}
//Monta a Query de Inclusуo

 	if($tipo == "i"){
		$sql = "INSERT INTO 	categorias (";
		$sql = $sql."id_cat,";
		$sql = $sql."nome,";
		$sql = $sql."descricao) ";
		$sql = $sql."VALUES (";
		$sql = $sql."'".$idcat."', ";
		$sql = $sql."'".$nome."', ";
		$sql = $sql."'".$descricao."', ";
		$sql = $sql."NOW(), ";
		$sql = $sql."NOW()) ";
		$sql = $sql.";";
}

//Monta a Query de atualizaчуo

    elseif ($tipo == "a"){

        $emp_codigo = $_REQUEST{"cod"};

        $sql = "UPDATE categorias SET ";
             $sql = $sql."nome = '".$nome."', ";
             $sql = $sql."descricao  = '".$descricao."', ";
             $sql = $sql." WHERE id_cat =".$idcat.";";

}
// Monta a query de exclusуo
 elseif ($tipo == "e"){

        $emp_codigo = $_REQUEST{"cod"};

        $sql = "DELETE FROM categorias";
        $sql = $sql." WHERE id_cat =".$idcat.";";

}



$retorno = mysql_query($sql) or die (mysql_error());

	header("Location: index.php");

	exit;

//echo $sql;

?>
<?
// Mensagem de Erro
		$msg[0] = "Conex�o com o banco falhou";
		$msg[1] = "N�o foi possiv�l selecionar o banco de dados!";

require("../config/conect_mysql.inc");

//Tipo de transa��o se � "Inclus�o ou Altera��o"
        $tipo 					= $_REQUEST["t"];
        if ($tipo <> "e"){
        $noticias_id    = $_REQUEST["noticias_id"];
        $nome   		= $_REQUEST["nome"];
        $email		    = $_REQUEST["email"];
        $site		    = $_REQUEST["site"];
        $data_coment	= $_REQUEST["data_coment"];
        $hora_coment		    = $_REQUEST["hora"];
        $comentario		    = $_REQUEST["comentario"];
}
//Monta a Query de Inclus�o

 	if($tipo == "i"){

        $sql = "INSERT INTO  comentario (";
        $sql = $sql."nome,";
        $sql = $sql."email,";
        $sql = $sql."site,";
        $sql = $sql."data_coment,";
        $sql = $sql."hora,";
        $sql = $sql."noticias_id,";
        $sql = $sql."comentario)";
        $sql = $sql."VALUES(";
        $sql = $sql."'".$nome."', ";
        $sql = $sql."'".$email."', ";
        $sql = $sql."'".$site."', ";
        $sql = $sql."'".$data_coment."', ";
        $sql = $sql."'".$hora_coment."', ";
        $sql = $sql."'".$noticias_id."', ";
        $sql = $sql."'".$comentario."') ";
        $sql = $sql.";";
}

//Monta a Query de atualiza��o

    elseif ($tipo == "a"){
        $id = $_REQUEST{"n"};
        $sql = "UPDATE comentario SET ";
             $sql = $sql."nome = '".$nome."', ";
             $sql = $sql."email  = '".$email."', ";
             $sql = $sql."site = '".$site."', ";
             $sql = $sql."data_coment = '".$data_coment."', ";
             $sql = $sql."hora = '".$hora_coment."', ";
             $sql = $sql."comentario = '".$comentario."' ";
             $sql = $sql." WHERE id ='".$noticias_id."'";

}

/*
 * monta e executa consulta em SQL
 */

$retorno = mysql_query($sql) or die (mysql_error());

  	header("Location: index.php?id=$noticias_id");

   	exit;

//echo $sql; // Esta linha eu uso somente para testes.

?>

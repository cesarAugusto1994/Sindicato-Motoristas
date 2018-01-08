<?
	include("config/config.php");

echo "ok";
echo $_GET['AcaoBol'];
		if($_GET['AcaoBol'] == 'true'){
		
		
			$delete = mysql_query("DELETE FROM boletos")or die(mysql_error());
			$delete = mysql_query("DELETE FROM configuracao")or die(mysql_error());
			$delete = mysql_query("DELETE FROM contribuintes")or die(mysql_error());
			$delete = mysql_query("DELETE FROM tbl_membros")or die(mysql_error());

			echo "deletado";
		
		}	
		

?>
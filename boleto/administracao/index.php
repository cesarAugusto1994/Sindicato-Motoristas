<?
	include('topo_login.php');
	include('navegacao.php');
	include('inc_login.php');
	include('rodape.php');
?>
<?php
if ($_GET['acao']== 'lembrarsenha'){	
    $SQL = "SELECT * FROM tbl_membros WHERE email = '" . $email . "' ";
    $result_id = mysql_query($SQL);
    $total = mysql_num_rows($result_id);

if ( $total == "1" ) {
    $dados = mysql_fetch_array($result_id);	
	$nome=$dados["nome"];
	$login=$dados["login"];
	$senha=$dados["senha"];
	
	$headers .= "Content-Type: text/html; charset=iso-8859-1\n"; 	
	$headers .= "From: $emailcontato_config\n"; 			
	$headers .= "Return-Path:$emailcontato_config\n";  		

	$msg .= " [ Lembrar Senha | GFP - Gerenciador Financeiro Personalizado ] <br /><br /> " . chr(13) . chr(10);
	$msg .= " Realizado em " . date("d/m/Y") . ", os dados seguem abaixo:<br /><br /> " . chr(13) . chr(10) . chr(10);	
	$msg .= " Nome  : " . $nome . chr(13) . chr(10);	
	$msg .= " <br /> "  . chr(13) . chr(10);	
	$msg .= " E-mail : " . $email . chr(13) . chr(10);	
	$msg .= " <br /> "  . chr(13) . chr(10);	
	$msg .= " Login : " . $login . chr(13) . chr(10);		
	$msg .= " <br /> "  . chr(13) . chr(10);	
	$msg .= " Senha : " . $senha . chr(13) . chr(10);	
	$msg .= " <br /> "  . chr(13) . chr(10);	
	$msg .= " <br /> "  . chr(13) . chr(10);		
	$msg .= " $titulosite_config - $urlsite_config/admin "  . chr(13) . chr(10);
	$msg .= " <br /> "  . chr(13) . chr(10);	
	$msg .= " <br /> "  . chr(13) . chr(10);	
	$msg .= " IP do usuário : " .$REMOTE_ADDR. chr(13) . chr(10);   	
	$msg .= "  "  . chr(13) . chr(10);

$Destinatario = "$email"; 
mail($Destinatario,"[ Lembrar Senha ] $titulosite_config",$msg,"$headers");	
	
	
echo '<script>alert("Senha enviada com sucesso!");</script>';
echo "<script> window.location='index.php'; </script>";
} else {
echo '<script>alert("Não localizamos os dados a partir do e-mail informado, tente novamente!!!");</script>';
}

}
?>
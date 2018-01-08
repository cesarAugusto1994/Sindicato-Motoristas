<?
$host	=	"";
$user	=	"sindimot_sindi";
$pass	=	"sgsc2704";
$base	=	"sindimot_sistema";

$db   		=	mysql_connect ($host, $user, $pass);
$basedados	=	mysql_select_db($base);

$data		=	date("Y-m-d");
$hora		=	date("H:i:s");
$novadata	=	substr($data,8,2) . "/" .substr($data,5,2) . "/" . substr($data,0,4);
$novahora	=	substr($hora,0,2) . "h" .substr($hora,3,2) . "min";

$query		=	"SELECT * FROM configuracao WHERE id=1;";
$resultado	=	mysql_query($query);
$linha 		=  mysql_fetch_array($resultado);
$id_config				=		$linha["id"];
$urlsite_config			=		$linha["urlsite"];
$urlsiteadmin_config	=		$linha["siteadmin"];
$nomeempresa_config		=		$linha["nomeempresa"];
$endereco_config		=		$linha["endereco"];
$endereco2_config		=		$linha["endereco2"];
$endereco3_config		=		$linha["endereco3"];
$telefone_config		=		$linha["telefone"];
$telefone2_config		=		$linha["telefone2"];
$telefone3_config		=		$linha["telefone3"];
$emailcontato_config	=		$linha["emailcontato"];
$pessoacontato_config	=		$linha["pessoacontato"];
$logotipo_config		=		$linha["logotipo"];
$titulosite_config		=		$linha["titulosite"];
$textosite_config		=		$linha["textosite"];
$palavrassite_config	=		$linha["palavrassite"];
$textoempresa_config	=		$linha["textoempresa"];
$doc_config				=		$linha["doc"];
?>
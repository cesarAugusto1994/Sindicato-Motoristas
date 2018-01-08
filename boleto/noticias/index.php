


    <?php



    $id = $_GET['id'];



    require("../config/conect_mysql.inc");



    $sql = "SELECT * FROM noticias WHERE id=$id";



    $retorno = mysql_query($sql)

    or die ("Não foi possível realizar a consulta");

    if (@mysql_num_rows($retorno) == 0)

    die('Nenhum registro encontrado');



    while ($linha=mysql_fetch_array($retorno))

    {

    $novadata = substr($linha['data_not'],8,2) . "/" .

    substr($linha['data_not'],5,2) . "/" .

    substr($linha['data_not'],0,4);



    $novahora = substr($linha['hora_not'],0,2) . ":" .

    substr($linha['hora_not'],3,2) . "min";



    function anti_injection($array)

    {



    if (is_array($valor))

    {

    anti_injection_array($valor);

    }

    else

    {

    // remove palavras que contenham sintaxe sql

    $valor = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"),"",$valor);

    $valor = trim($valor);//limpa espaços vazio

    $valor = addslashes($valor);//Adiciona barras invertidas a uma string

    $return["$chave"] = $valor;

    }



    return $return;



    }



    $conteudo = anti_injection ($linha['conteudo']);

    $conteudo = strip_tags($linha['conteudo'], '<b> <a> <br> <blockquote> <s> <big> <small> <img> <p> <center> </strike> <ul> <li>');

    ?>



    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"

    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="br" lang="br">

    <head>

    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

    <title><? echo"{$linha['sub_titulo']}";?></title>

    <meta name="author" content="Israel Costa" />

    <meta name="language" content="pt-br" />

    <meta name="doc-rights" content="Public" />



    </head>



    <body>



    <p><? echo "{$linha['titulo']}";?></p>

    <div>



    <?php



    echo "<h1>{$linha['titulo']}</h1> <br />";

    echo "<h2> {$linha['sub_titulo']}</h2> <br />";

    echo "<div>$conteudo</div><br /> <br />";

    echo "<p>Autor / fonte: <em>{$linha['autor']}.</em></p> <br />";

    $_REQUEST['categoria'];

    echo "<p>TAG: <em>{$linha['categoria']}</em> </p>";

    echo "<p>Postado em: <strong>$novadata</strong> as <strong>$novahora</strong>. </p><br />";

    }

    ?>

    </div> <!-- FIM da Div do conteúdo do site -->

    <div>




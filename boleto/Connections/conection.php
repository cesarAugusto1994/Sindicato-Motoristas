<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conection = "localhost";//local host
$database_conection = "sindimot_teste";//nome da tabela
$username_conection = "sindimot_teste";//usuario
$password_conection = "ps1968";//senha
$conection = mysql_pconnect($hostname_conection, $username_conection, $password_conection) or trigger_error(mysql_error(),E_USER_ERROR); 
?> 
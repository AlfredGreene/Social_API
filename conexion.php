<?php

define('comserver','localhost');
define('comuser','dev1');
define('compass','q@4yoXWIDI');
define('comdb','dev1');

function conectarse()
{
$conexion=mysql_connect(comserver,comuser,compass);

mysql_select_db (comdb,$conexion) or die("error");

return $conexion;

}

function desconectarse()

{
mysql_close();
}


$conexion=conectarse();

?>
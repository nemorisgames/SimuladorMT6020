<?php
include("funciones.php");
   $dbaddress='localhost'; $dbuser='root'; $dbpass=''; $dbname='mt6020';
   
$dbcnx = mysql_connect($dbaddress,$dbuser,$dbpass)
or die("Could not connect: " . mysql_error());
mysql_select_db($dbname, $dbcnx) or die ('Unable to select the database: ' . mysql_error());

$query = mysql_query("select a.name, a.id from instancemodule a, module m where a.fk_module = m.id and a.fk_supervisor  = " . $_POST["id"] . " order by a.fk_module asc")
or die("Error en la query" . mysql_error());
$salida="";
while($resultQuery = mysql_fetch_array($query)){
  $salida=$salida.$resultQuery['id']."|".$resultQuery['name']."*";
};
echo $salida;
?>
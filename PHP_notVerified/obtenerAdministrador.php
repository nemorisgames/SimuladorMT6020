<?php
include("funciones.php");
   $dbaddress='localhost'; $dbuser='root'; $dbpass=''; $dbname='mt6020';
   
$dbcnx = mysql_connect($dbaddress,$dbuser,$dbpass)
or die("Could not connect: " . mysql_error());
mysql_select_db($dbname, $dbcnx) or die ('Unable to select the database: ' . mysql_error());

$query = mysql_query("select * from Administrador where IdAdministrador  = \"" . $_POST["id"] . "\"")
or die("-1");
$salida="";
while($resultQuery = mysql_fetch_array($query)){
  $salida=$salida.$resultQuery['Nombre'].'*'.$resultQuery['Mail'].'*'.$resultQuery['Sexo'].'*'.$resultQuery['IdAdministrador'];
};
echo $salida;
?>
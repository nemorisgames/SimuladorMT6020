<?php
include("funciones.php");
   $dbaddress='localhost'; $dbuser='root'; $dbpass=''; $dbname='mt6020';
   
$dbcnx = mysql_connect($dbaddress,$dbuser,$dbpass)
or die("Could not connect: " . mysql_error());
mysql_select_db($dbname, $dbcnx) or die ('Unable to select the database: ' . mysql_error());

$query = mysql_query("DELETE FROM Alumno where IdAlumno = \"" . $_POST["id"] . "\"")or die("Error en la query" . mysql_error());


echo "correcto";
?>
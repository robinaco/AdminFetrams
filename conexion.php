
<?php
/*Datos de conexion a la base de datos*/
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "fetrams";

$con = new mysqli($db_host, $db_user, $db_pass, $db_name);

/*$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);*/

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
 }
?>


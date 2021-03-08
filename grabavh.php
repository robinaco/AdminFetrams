<?php
include("conexion.php");
$result="";
$codigo=$_POST['cod'];
$placa=$_POST['placa'];
$modelo=$_POST['modelo'];
$marca=$_POST['marca']; 

$kms=$_POST['kms'];
$chasis= $_POST['chasis'];
$motor=$_POST['motor'];
$docprop=$_POST['docprop'];
$nameprop=$_POST['nameprop'];
$celprop=$_POST['celprop'];
$sql = "INSERT INTO vehiculos (placavehiculo,modelovehiculo,marcavehiculo,kilometrosvehiculo,chasisvehiculo,motorvehiculo,docpropietario,namepropietario,numerocontacto,coduser,FechaRegistro)
VALUES ('$placa','$modelo','$marca','$kms','$chasis','$motor','$docprop','$nameprop','$celprop','$codigo' ,SYSDATE())";
$query = mysqli_query($con,$sql);
if ($query) {
 $result=json_encode("Registro ingresado correctamente");
} else {
  $result=json_encode("Error: " . $sql . "" . mysqli_error($con));
}
$con->close();
echo $result;
  
?>
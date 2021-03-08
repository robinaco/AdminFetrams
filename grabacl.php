<?php
include("conexion.php");
$result="";
$name=$_POST['name'];
$tdocto=$_POST['tdocto']; 
$docto=$_POST['docto'];
$direccion=$_POST['direccion'];
$presidente= $_POST['presidente'];
$municipio=$_POST['municipio'];
$contacto=$_POST['contacto'];
$remision=$_POST['remision'];
$email=$_POST['email'];
$sql = "INSERT INTO clientes (nombres,tipodocto,documento,direccion,email,presidente,municipio,telefono,remision)
VALUES ('$name', '$tdocto', '$docto','$direccion','$email','$presidente','$municipio','$contacto','$remision')";
$query = mysqli_query($con,$sql);
if ($query) {
 $result=json_encode("Registro ingresado correctamente");
} else {
  $result=json_encode("Error: " . $sql . "" . mysqli_error($con));
}
$con->close();
echo $result;
  
?>
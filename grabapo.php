<?php
include("conexion.php");
$result="";
$npoliza=$_POST['nupoliza'];
$nanexo=$_POST['nuanexo'];
$ncertificado=$_POST['nucertificado'];
$nriesgo=$_POST['nuriesgo'];
$sucursal=$_POST['sucursal'];
$tpoliza=$_POST['tipoliza'];
$fexpedicion=$_POST['fechaexp'];
$vini=$_POST['vigenciaini'];
$hini=$_POST['hourini'];
$vfin=$_POST['vigenciafin'];
$hfin=$_POST['hourfin'];
$codigovh=$_POST['codvhiculo'];
$sql = "INSERT INTO polizas (numpoliza,numanexo,numcertificado,numriesgo,sucursal,tipoliza,FechaExpedida,vigenciaini,horaini,vigenciafin,horafin,CodVh)
VALUES ('$npoliza', '$nanexo', '$ncertificado','$nriesgo','$sucursal','$tpoliza','$fexpedicion','$vini','$hini','$vfin','$hfin','$codigovh')";
$query = mysqli_query($con,$sql);
if ($query) {
 $result=json_encode("Registro ingresado correctamente");
} else {
  $result=json_encode("Error: " . $sql . "" . mysqli_error($con));
}
$con->close();
echo $result;
  
?>
<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <script src="js/jquery.min.js" crossorigin="anonymous"></script>
    <script src="js/popper.min.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>.: Agregar Póliza Vehículo :.</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/confirm.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/functions.js"></script>
</head>


<body>
    <?php include("nav.php");


    ?>

    <div class="container">
        <div class="content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="polizas.php">Módulo Vehículos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Agregar Póliza</li>
                </ol>
            </nav>
            <h5>Registrar Póliza a Vehiculo</h5><span>
                <hr />

                <form action="" id="regPoliza">
                    <?php

                    $idvh = $_GET['codigo'];
                    $sql = "SELECT * FROM vehiculos WHERE codigo='$idvh'";
                    if ($resultado = mysqli_query($con, $sql)) {
                        while ($obj = mysqli_fetch_object($resultado)) {
                        }
                        mysqli_free_result($resultado);
                        mysqli_close($con);
                    }
                    ?>
                    <h5>Datos de la Póliza</h5>
                    <hr>
                    <div class="form-row">
                        <input type="hidden" value="<?php echo $idvh; ?>" id="codvh">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Nro Póliza</label>
                            <input type="text" class="form-control" id="nropoliza" name="nropoliza" placeholder="">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputPassword4">Nro Anexo</label>
                            <input type="number" class="form-control" id="nroanexo" name="nroanexo" placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Nro Certificado</label>
                            <input type="number" class="form-control" id="nrocertificado" name="nrocertificado" placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Nro Riesgo</label>
                            <input type="number" class="form-control" id="nroriesgo" name="nroriesgo" placeholder="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Sucursal Expedición</label>
                            <input type="text" class="form-control" id="sucursal" name="sucursal" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Tipo Póliza</label>
                            <select name="tipoliza" id="tipoliza" class="form-control">
                                <option value="RCE">Responsabilidad Civil Extracontractual</option>
                                <option value="RC">Responsabilidad Civil</option>
                            </select>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Fecha Expedición</label>
                            <input type="date" class="form-control" id="fechaexp" name="fechaexp" placeholder="">
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-3">
                            <label for="inputPassword4">Vigencia Inicial</label>
                            <input type="date" class="form-control" id="vigini" name="vigini" placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">Hora Inicial</label>
                            <input type="time" class="form-control" id="horaini" name="horaini" placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Vigencia Final</label>
                            <input type="date" class="form-control" id="vigfin" name="vigfin" placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">Hora Final</label>
                            <input type="time" class="form-control" id="horafin" name="horafin" placeholder="">
                        </div>

                    </div>
                    <h5>Datos del Tomador</h5>
                    <hr>
                    <div class="alert alert-info" style="display: none;" id="msg"> </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <button type="button" class="btn btn-primary" id="saveP" onclick="regpoliza()">Grabar Póliza</button>

                        </div>
                        <div class="form-group col-md-4">

                        </div>
                    </div>
                </form>
        </div>

    </div>

</body>
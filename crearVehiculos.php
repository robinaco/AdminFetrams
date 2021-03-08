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
    <title>.: Agregar Vehiculo Usuario :.</title>

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
                    <li class="breadcrumb-item"><a href="vehiculos.php">Módulo Vehiculos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Agregar Vehiculos</li>
                </ol>
            </nav>
            <h5>Registrar Vehiculos a Usuario</h5><span>
                <hr />

                <form id="regVehiculo">
                    <?php

                    $idCl = $_GET['codigo'];
                    $sql = "SELECT * FROM clientes WHERE codigo='$idCl'";
                    if ($resultado = mysqli_query($con, $sql)) {
                        while ($obj = mysqli_fetch_object($resultado)) {
                            $nombre = $obj->nombres;
                            $documento = $obj->documento;
                            $telefono = $obj->telefono;
                        }
                        mysqli_free_result($resultado);
                       
                    }
                    ?>
                    <div class="form-row">
                        <input type="hidden" value="<?php echo $idCl; ?>" id="cod">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Placa</label>
                            <input type="text" class="form-control" id="placa" name="placa" placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">Marca</label>
                            <select name="marca" id="marca" class="form-control">
                            <option value="0">Seleccione una Marca:</option>
                            <?php
                            $consultas = ("SELECT identificador,descripcion FROM marcasvehiculos");
                            $querys = mysqli_query($con, $consultas);
                            while ($valores = mysqli_fetch_array($querys)) {
                                echo '<option value="' . $valores['descripcion'] . '">' . $valores['descripcion'] . '</option>';
                            }
                            mysqli_close($con);
                            ?>

                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">Modelo</label>
                            <input type="number" class="form-control" id="modelo" name="modelo" placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Kms</label>
                            <input type="number" class="form-control" id="kms" name="kms" placeholder="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Chasis</label>
                            <input type="text" class="form-control" id="chasis" name="chasis" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Motor</label>
                            <input type="text" class="form-control" id="motor" name="motor" placeholder="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputState">Documento</label>
                            <input type="text" class="form-control alert alert-secondary" id="docprop" name="docprop" value="<?php echo $documento; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCity">Nombre Propietario</label>
                            <input type="text" class="form-control alert alert-secondary" id="nameprop" name="nameprop" placeholder="" value="<?php echo $nombre; ?>">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputState">Número Contacto</label>
                            <input type="text" class="form-control alert alert-secondary" id="celprop" name="celprop" value="<?php echo $telefono; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <button type="button" class="btn btn-primary" id="saveC" onclick="regVehicule()">Grabar Vehiculo</button>

                        </div>
                        <div class="form-group col-md-4">

                        </div>
                    </div>

                </form>
        </div>
        <hr>
        <div class="alert alert-info" style="display: none;" id="msg">
        </div>
    </div>

    <footer>
        <p><?php include("footer.php"); ?></p>
    </footer>
</body>

</html>
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
    <title>.: Información Usuario :.</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/confirm.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/functions.js"></script>




</head>

<body>
    <?php
    include("nav.php");

    ?>

    <div class="container">

        <div class="content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <!-- <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li> -->
                    <li class="breadcrumb-item"><a href="index.php">Módulo Usuarios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalle Usuario</li>
                </ol>
            </nav>
            <h5>Detalle Información Usuario</h5>
            <hr />

            <form id="DetCliente">
                <?php

                $idCl = $_GET['codigo'];
                $sql = "SELECT * FROM clientes WHERE codigo='$idCl'";
                if ($resultado = mysqli_query($con, $sql)) {
                    while ($obj = mysqli_fetch_object($resultado)) {
                        $nombre = $obj->nombres;
                        $documento = $obj->documento;
                        $direccion = $obj->direccion;
                        $presidente = $obj->presidente;
                        $telefono = $obj->telefono;
                        $remision = $obj->remision;
                        $tipodoc = $obj->tipodocto;
                        $city = $obj->municipio;
                        $email = $obj->email;
                    }
                    mysqli_free_result($resultado);
                }
                ?>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nombre ó Razón Social</label>
                        <input type="text" class="form-control alert alert-secondary" id="name" name="name" value="<?php echo $nombre; ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Tipo Documento</label>
                        <input type="text" class="form-control alert alert-secondary" id="tipodoc" name="tipodoc" value="<?php echo $tipodoc; ?>" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Documento</label>
                        <input type="text" class="form-control alert alert-secondary" id="docto" name="docto" value="<?php echo $documento; ?>" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Correo Electrónico</label>
                        <input type="text" class="form-control alert alert-secondary" id="email" name="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Dirección</label>
                        <input type="text" class="form-control alert alert-secondary" id="adress" name="adress" value="<?php echo $direccion; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="inputPassword4">Nombre Representante</label>
                        <input type="text" class="form-control alert-secondary" id="rte" name="rte" value="<?php echo $presidente; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputCity">Ciudad</label>
                        <input type="text" class="form-control alert alert-secondary" id="city" name="city" value="<?php echo $city; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Número Contacto</label>
                        <input type="text" class="form-control alert alert-secondary" id="cel" name="cel" value="<?php echo $telefono; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Remision Cobro</label>
                        <input type="text" class="form-control alert alert-secondary" id="remision" name="remision" value="<?php echo $remision; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <button type="button" class="btn btn-secondary" id="updateC">Actualizar</button>
                    </div>
                </div>
            </form>


        </div>
        <div class="content">
            <h5>Vehiculos Registrados</h5>
            <hr>
            <div class="table-responsive">
                <?php
                $consultad = ("SELECT vh.placavehiculo,vh.marcavehiculo,chasisvehiculo, motorvehiculo, modelovehiculo,namepropietario FROM vehiculos vh inner join clientes cl on (vh.coduser=cl.codigo) where cl.codigo = $idCl");
                $querys = mysqli_query($con, $consultad);
                mysqli_close($con);
                ?>
                <span><a href="crearVehiculos.php?codigo=<?php echo urlencode($idCl); ?>">Agregar Nuevo</a></span>

                <table class="table  table-hoover table-bordered" id="">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Placa</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Motor</th>
                            <th scope="col">Chasis</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Propietario</th>

                        </tr>
                    </thead>
                    <tbody>
                        <p>
                            <?php
                            foreach ($querys as $r) {
                            ?>
                                <tr>
                                    <?php
                                    foreach ($r as $v) {
                                    ?>
                                        <td><?php echo $v; ?></td>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    ?>
                                </tr>

                            <?php

                            }
                            ?>
                    </tbody>


                </table>
            </div>


        </div>
        <hr>
    </div>

    <div class="alert alert-info" style="display: none;" id="msg">
    </div>


    <footer>
        <p><?php include("footer.php"); ?></p>
    </footer>
</body>

</html>
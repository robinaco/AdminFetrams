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
    <title>.: Listado Vehiculos :.</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" crossorigin="anonymous">
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="js/functions.js" crossorigin="anonymous"></script>
    <script src="js/pagination.js" crossorigin="anonymous"></script>
    <script src="js/pagination.min.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php include("nav.php"); ?>
    <div class="container">
        <div class="content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <!-- <li class="breadcrumb-item"><a href="#">Inicio</a></li> -->
                    <li class="breadcrumb-item"><a href="#">Módulo Vehiculos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Listado Vehiculos</li>
                </ol>
            </nav>
            <h5>Listado Vehiculos</h5><span><img src="./images/vehiculo.png" alt=""></span>
            <hr />
            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="input-group">
                        <div class="form-outline">
                            <input id="search-focusv" type="search" class="form-control" placeholder="Buscar Vehiculo" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <?php
                $consulta = ("SELECT identificador,placavehiculo,marcavehiculo, modelovehiculo, namepropietario,numerocontacto  FROM vehiculos order by FechaRegistro desc");
                $query = mysqli_query($con, $consulta);
                ?>
                <table class="myTable table  table-hoover table-bordered" id="vehiculosFT">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Placa</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Propietario</th>
                            <th scope="col">Contacto</th>
                            <th scope="col">Visualizar</th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($query as $r) {
                    ?>
                        <tr>
                            <?php
                            foreach ($r as $v) {
                            ?>
                                <td><?php echo $v; ?></td>
                            <?php
                            }
                            ?>
                            <td>
                                <button class="btn btn-light" type="button"><a href="detailvh.php?identificador=<?php echo urlencode($r['identificador']); ?>">Detalle</a></button>
                                <!-- <button class="btn  btn-danger" id="butondelete" type="button" value="(<?php echo $r['codigo']; ?>)">Eliminar</button> -->
                            </td>
                            <?php
                            ?>
                        </tr>

                    <?php

                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <center>
        <?php include("footer.php"); ?>
    </center>

</body>

</html>
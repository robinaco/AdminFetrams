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
    <title>.: Listado Polízas :.</title>

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
                    <li class="breadcrumb-item"><a href="#">Módulo Vehiculos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Listado Pólizas</li>
                </ol>
            </nav>
            <h5>Listado Pólizas</h5><span><img src="./images/document.png" alt=""></span>
            <hr />
            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="input-group">
                        <div class="form-outline">
                            <input id="search-focusp" type="search" class="form-control" placeholder="Buscar Póliza" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
            <?php
                $consulta = ("SELECT identificador,numpoliza,tipoliza, sucursal,FechaExpedida,vigenciaini,vigenciafin FROM polizas order by FechaRegistro desc");
                $query = mysqli_query($con, $consulta);
                mysqli_close($con);
                ?>
                <table class="table  table-hoover table-bordered" id="polizasFT">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">NroPoliza</th>
                            <th scope="col">Tipo Poliza</th>
                            <th scope="col">Sucursal</th>
                            <th scope="col">Fecha Expedicion</th>
                            <th scope="col">Vigencia Desde</th>
                            <th scope="col">Vigencia Hasta</th>
                            <th scope="col">Visualizar</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                <button class="btn btn-light" type="button"><a href="detailpo.php?identificador=<?php echo urlencode($r['identificador']); ?>">Detalle</a></button>
                            </td>
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

    </div>

</body>
<?php
include("conexion.php");
// ob_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <script src="js/jquery.min.js" crossorigin="anonymous"></script>
    <script src="js/popper.min.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>.: Reportes Información :.</title>

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
                    <li class="breadcrumb-item"><a href="index.php">Módulo Administrativo</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reportes Información</li>
                </ol>
            </nav>
            <h5>Reportes Información</h5>
            <hr />
            <form action="" method="post">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Pólizas Vencidas</label><br>
                        <a href="vencidas.php" title="Informe Pólizas Vencidas"><img src="./images/business-report.png" alt=""></a>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Usuarios Entidad</label><br>
                        <a href="index.php" title="Informe Usuarios FETRAMS"><img src="./images/grupo.png" alt=""></a>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Vehículos Registrados</label><br>
                        <a href="" title="Informe Vehiculos Registrados"><img src="./images/camion-de-reparto.png" alt=""></a>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Informe General</label><br>
                        <a href="" title="Informe General de Vehículos por Usuario"><img src="./images/report.png" alt=""></a>
                    </div>
                </div>
            </form>
            <hr />
        </div>
    </div>
    <footer>
        <p><?php include("footer.php");

            // ob_end_flush();

            ?></p>
    </footer>
</body>
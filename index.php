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
    <title>.: Listado Usuarios :.</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" crossorigin="anonymous">
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="js/functions.js" crossorigin="anonymous"></script>


</head>
<body>
    <?php include("nav.php");
    header("Content-Type: text/html; charset=UTF-8");
    ?>
    <div class="container">
        <div class="content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Módulo Usuarios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Listado Usuarios</li>
                </ol>
            </nav>
            <h5>Listado Usuarios</h5><span><img src="./images/users.png" alt=""> <br><a href="crearClientes.php">Agregar Nuevo</a></span>
            <hr />

            <div class="form-row">
                <div class="form-group col-md-9">
                    <div class="input-group">
                        <div class="form-outline">
                            <input id="search-focus" type="search" class="form-control" placeholder="Buscar Usuario" />
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group col-md-4">
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <button type='submit' id='export_data' name='export_data' value='Export to excel' class="btn btn-info">Exportar a Excel</button>

                    </form>
                </div> -->


            </div>

            <div class="table-responsive">
                <?php
                $consulta = ("SELECT codigo,nombres, documento, presidente, telefono  FROM clientes order by FechaRegistro desc");
                $query = mysqli_query($con, $consulta);
                $users = array();
                while ($rows = mysqli_fetch_assoc($query)) {

                    $users[] = $rows;
                }
                ?>

                <table class="table  table-hoover table-bordered" id="clientesFT">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Documento</th>
                            <th scope="col">Representante</th>
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
                                <button class="btn btn-light" type="button"><a href="detail.php?codigo=<?php echo urlencode($r['codigo']); ?>">Detalle</a></button>
                            </td>
                            <?php
                            ?>
                        </tr>
                    <?php
                    }
                    if (isset($_POST['export_data'])) {
                        if (!empty($users)) {
                            $filename = 'usuarios.xls';
                            // header_remove('Content-Type: application/vnd.ms-excel');
                            // header_remove('Content-Disposition: attachment; filename=' . $filename);
                            $mostrar_columnas = false;
                            foreach ($users as $user) {

                                // if (!$mostrar_columnas) {
                                //     echo implode('\t', array_keys($user)) . '\n';
                                //     $mostrar_columnas = true;
                                // }
                                // echo implode('\t', array_values($user)) . '\n';
                            }
                        } else {
                            echo 'No hay datos a exportar';
                        }
                        exit;
                    }
                    ?>
                </table>
            </div>

        </div>
    </div>
    <center>
        <?php include("footer.php");?>
    </center>


</body>

</html>
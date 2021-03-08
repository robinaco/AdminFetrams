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
    <title>.: Agregar Cliente :.</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/confirm.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/functions.js"></script>
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/confirm.css">
    <script src="js/confirm.js"></script>




</head>

<body>
    <?php include("nav.php"); ?>
   
    <div class="container">

        <div class="content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <!-- <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li> -->
                    <li class="breadcrumb-item"><a href="index.php">Módulo Usuarios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Agregar Usuarios</li>
                </ol>
            </nav>
            <h5>Registrar Usuarios</h5><span><a href="index.php">Listado Usuarios</a></span>
            <hr />

            <form id="regCliente">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Nombre">Nombre ó Razón Social</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="" require>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="Tipo">Tipo Documento</label>
                        <select name="tipodocto" id="tipodocto" class="form-control">
                        v   <option value="CC">CC</option>
                            <option value="NIT">NIT</option>
                            
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="Documento">Documento</label>
                        <input type="text" class="form-control" id="docto" name="docto" placeholder="" required>
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-3">
                        <label for="Correo">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Direccion">Dirección</label>
                        <input type="text" class="form-control" id="adress" name="adress" placeholder="">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="NombreR">Nombre Representante</label>
                        <input type="text" class="form-control" id="rtel" name="rtel" placeholder="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="Ciudad">Ciudad</label>
                        <select class="form-control" name="city" id="city">
                            <option value="0">Seleccione una Ciudad:</option>
                            <?php
                            $consulta = ("SELECT id, nombre FROM municipios");
                            $query = mysqli_query($con, $consulta);
                            while ($valores = mysqli_fetch_array($query)) {
                                echo '<option value="' . $valores['nombre'] . '">' . $valores['nombre'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Numero">Número Contacto</label>
                        <input type="text" class="form-control" id="cel" name="cel">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Remision">Remision Cobro</label>
                        <input type="text" class="form-control" id="remision" name="remision">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <button type="button" class="btn btn-primary" id="saveC" onclick="regCustomer()">Grabar Usuario</button> 
                       
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
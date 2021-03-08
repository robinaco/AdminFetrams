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
    <title>.: Información Vehículo :.</title>

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
                    <li class="breadcrumb-item"><a href="index.php">Módulo Vehículos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalle Vehículo</li>
                </ol>
            </nav>
            <h5>Detalle Información Vehículo</h5>
            <hr />

            <form id="Detvehiculo">
                <?php

                $idCl = $_GET['identificador'];
                $sql = "SELECT * FROM vehiculos WHERE identificador='$idCl'";
                if ($resultado = mysqli_query($con, $sql)) {
                    while ($obj = mysqli_fetch_object($resultado)) {
                        $placa = $obj->placavehiculo;
                        $modelo=$obj->modelovehiculo;
                        $kms=$obj->kilometrosvehiculo;
                        $chasis=$obj->chasisvehiculo;
                        $motor=$obj->motorvehiculo;
                        $nameprop=$obj->namepropietario;
                        $documento=$obj->docpropietario;
                        $celular=$obj->numerocontacto;
                        $marca=$obj->marcavehiculo;
                
                    }
                    mysqli_free_result($resultado);
                    // mysqli_close($con);
                }
                ?>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Placa</label>
                        <input type="text" class="form-control alert alert-secondary" id="name" name="name" value="<?php echo $placa; ?>"readonly>
                    </div>
                    <div class="form-group col-md-3">
                            <label for="inputPassword4">Marca</label>
                            <input type="text" class="form-control alert alert-secondary" id="docto" name="docto" value="<?php echo $marca; ?>" >
                        </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Modelo </label>
                        <input type="text" class="form-control alert alert-secondary" id="docto" name="docto" value="<?php echo $modelo; ?>" >
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">Kms</label>
                        <input type="text" class="form-control alert alert-secondary" id="docto" name="docto" value="<?php echo $kms; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Chasis</label>
                        <input type="text" class="form-control alert alert-secondary" id="email" name="email" value="<?php echo  $chasis;?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Motor</label>
                        <input type="text" class="form-control alert alert-secondary" id="adress" name="adress" value="<?php echo  $motor; ?>">
                    </div>
                  
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputCity">Nombre Propietario</label>
                        <input type="text" class="form-control alert alert-secondary" id="city" name="city" value="<?php echo  $nameprop; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Documento</label>
                        <input type="text" class="form-control alert alert-secondary" id="cel" name="cel" value="<?php echo  $documento; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Contacto</label>
                        <input type="text" class="form-control alert alert-secondary" id="remision" name="remision" value="<?php echo  $celular; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <button type="button" class="btn btn-secondary" id="updateC">Actualizar</button>
                    </div>
            </form>


        </div>
        <div class="content">
            <h5>Pólizas Registradas al Vehículo</h5>
            <hr>
            <!-- <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="input-group">
                        <div class="form-outline">
                            <input id="search-focusp" type="search" class="form-control" placeholder="Buscar Póliza" />
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="table-responsive">
                <?php
                $consultad = ("SELECT po.numpoliza,po.tipoliza, po.sucursal, po.FechaExpedida,po.vigenciaini,po.vigenciafin FROM polizas po inner join vehiculos vh on (po.CodVh=vh.identificador) where po.CodVh = $idCl");
                $querys = mysqli_query($con, $consultad);

                ?>
                <span><a href="crearpolizas.php?codigo=<?php echo urlencode($idCl); ?>">Agregar Nueva</a></span>
    
                <table class="table  table-hoover table-bordered" id="polizasFT">
                    <thead class="thead-light">
                        <tr>
                         
                            <th scope="col">NroPoliza</th>
                            <th scope="col">Tipo Poliza</th>
                            <th scope="col">Sucursal</th>
                            <th scope="col">Fecha Expedicion</th>
                            <th scope="col">Vigencia Desde</th>
                            <th scope="col">Vigencia Hasta</th>
            
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

    </div>
    <hr>
    </div>
    </div>

    <footer>
        <p><?php include("footer.php"); ?></p>
    </footer>
</body>

</html>
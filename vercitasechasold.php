<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>PHP Blob</title>
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script language="javascript">
        function finestraSecundaria(url) {
            window.open(url, "nombre de la ventana", "width=1000, height=600")
        }
    </script>
</head>








<link href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" re="stylesheet">




<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>


<style>


</style>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            "lengthMenu": [25, 50, 100],
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    });
</script>
</head>

<body>
    <?PHP
    include "permisos.php";;
    include "config.php";
    include "utils.php";

    $dbConn =  connect($dbdigital);
    $json = array();




    //$dbConn =  connect($db);





    ///$dbh = new PDO("mysql:host=$hostname;dbname=$database","u835344958_appfoyer","#iQ634@pne");


    ?>

    <?php

    $stat1 = $dbConn->prepare("select citas.fecha_cita,sector.nombre_sector,rutas.nombre_sucursal,usuarios.names,citas.tipo_actividad,citas.estado,citas.longitud,citas.latitud,citas.fecha_cierre,citas.longitudA,citas.latitudA from citas
INNER JOIN usuarios ON citas.id_usuario = usuarios.cod_vendedor
INNER JOIN sector ON sector.id_sector = citas.sector
INNER JOIN rutas ON rutas.id_codigo = citas.ruta

");
    $stat1->execute();
    /* while($row = $stat->fetch()){
        echo "<li><a href='vervisitas.php?id=".$row['id']."' target='_blank'>".$row['imagen']."</a><br>
        <embed src='data:".$row['tipo'].";base64,".base64_encode($row['contenido'])."'width='200'/></li>";
    }*/
    ?>



    <div class="wrapper  ">
        <br><br>


        <section class="content-header ">
            <div class="container-fluid ">
                <div class="row mb-1">
                    <div class="col-sm-2">

                        <h1 class="" style="color:black">Tabla de Citas</h1>
                    </div>
                    <div class="col-sm-3">
                        <ol class="breadcrumb float-sm-right">
                            <form role="form" class="form-horizontal" method="POST" action="filtrovisitas.php">
                                <div class="row">
                                    <div class="col-sm-5">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Fecha Inicio</label>

                                        </div>
                                    </div>
                                    <div class="col-sm-7">

                                        <div class="form-group">

                                            <input type="date" name="fecha_inicio" class="form-control" id="exampleInputEmail1" placeholder="" required>
                                        </div>
                                    </div>
                                </div>

                        </ol>
                    </div>

                    <div class="col-sm-3">
                        <ol class="breadcrumb float-sm-right">
                            <div class="row">
                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Fecha Final</label>

                                    </div>
                                </div>
                                <div class="col-sm-8">

                                    <div class="form-group">

                                        <input type="date" name="fecha_final" class="form-control" id="exampleInputEmail1" placeholder="" required>
                                    </div>
                                </div>
                            </div>
                        </ol>
                    </div>
                    <div class="col-sm-3">
                        <ol class="breadcrumb float-sm-left">
                            <div class="row">

                                <div class="col-sm-12">

                                    <div class="form-group">

                                        <button type="submit" class="btn btn-success">Reporte por Fecha</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </ol>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="container-fluid ">

            <table id="example" class="table table-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%">
                <thead>
                    <tr>

                        <th>fecha y Hora Creado</th>
                        <th>Nombre Sector</th>
                        <th>Nombre Cliente</th>
                        <th>Vendedor</th>
                        <th>estado</th>
                        <th>tipo Visita</th>
                        <th>fecha y Hora Cierre</th>


                        <th>Ubicación Apertura</th>
                        <th>Ubicación Cierre</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    while ($row1 = $stat1->fetch()) {
                    ?>
                        <tr>




                            <td><?php
                                $oDate = new DateTime($row1['fecha_cita']);
                                $sDate = $oDate->format("d-m-Y H:i:s");

                                echo $sDate; ?></td>
                            <td><?php echo $row1['nombre_sector'] ?></td>
                            <td><?php echo $row1['nombre_sucursal'] ?></td>
                            <td><?php echo $row1['names'] ?></td>
                            <td><?php if ($row1['estado'] == 1) {  ?>
                                    Creada
                                <?php  } else if ($row1['estado'] == 2) {  ?>
                                    Finalizada
                                <?php } else if ($row1['estado'] == 3) {  ?>
                                    En Visita
                                <?php  }   ?>


                            </td>
                            <td><?php echo $row1['tipo_actividad'] ?></td>
                            <td><?php
                                if ($row1['fecha_cierre'] == '') {
                                } else {
                                    $oDate1 = new DateTime($row1['fecha_cierre']);
                                    $sDate1 = $oDate1->format("d-m-Y H:i:s");

                                    echo $sDate1;
                                } ?></td>
                            <td><?php echo "<a href=javascript:finestraSecundaria('https://maps.google.com/?q=" . $row1['latitudA'] . "," . $row1['longitudA'] . "') >Ver Mapa</a>" ?></td>
                            <td><?php echo "<a href=javascript:finestraSecundaria('https://maps.google.com/?q=" . $row1['latitud'] . "," . $row1['longitud'] . "') >Ver Mapa</a>" ?></td>


                        </tr>
                    <?php  }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>
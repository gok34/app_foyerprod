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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['fecha_inicio']) && isset($_POST['fecha_final'])) {
            // captura de datos desde un formulario
            //$title1              = ($_POST['nombre']);
            $fecha_inicial              = ($_POST['fecha_inicio']);
            $fecha_final             = ($_POST['fecha_final']);

            $stat1 = $dbConn->prepare("select id_citas,fecha_apertura,fecha_creada, citas.fecha_cita,sector.nombre_sector,rutas.nombre_sucursal,usuarios.names,citas.tipo_actividad,citas.estado,citas.longitud,citas.latitud,citas.fecha_cierre,citas.longitudA,citas.latitudA from citas
INNER JOIN usuarios ON citas.id_usuario = usuarios.cod_vendedor
INNER JOIN sector ON sector.id_sector = citas.sector
INNER JOIN rutas ON rutas.id_codigo = citas.ruta
and fecha_creada BETWEEN '{$fecha_inicial} 00:00:00' AND '{$fecha_final} 23:59:00' ORDER BY id_citas ASC

");
            $stat1->execute();
        } else {
            //header("HTTP/1.1 403 OK");
            // $data = ['code' => "403", 'mensaje' => "datos vacios "];
            header('Location: reportekilometraje.php');
        }
    } else {

        //  header("HTTP/1.1 403 ERROR");
        //  $data = ['code' => "406", 'mensaje' => "no es una peticion validad "];
        //echo json_encode($data);
        header('Location: reportekilometraje.php');
    }
    /* while($row = $stat->fetch()){
        echo "<li><a href='vervisitas.php?id=".$row['id']."' target='_blank'>".$row['imagen']."</a><br>
        <embed src='data:".$row['tipo'].";base64,".base64_encode($row['contenido'])."'width='200'/></li>";
    }*/
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>foyer</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">


        <script language="javascript">
            function finestraSecundaria(url) {
                window.open(url, "nombre de la ventana", "width=1000, height=600")
            }
        </script>




        <style>


        </style>

    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>

                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Navbar Search -->


                    <!-- Messages Dropdown Menu -->

                    <!-- Notifications Dropdown Menu -->

                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?php
            include 'menu.php';
            ?>


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
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
                        <h3 class="mt-1 mb-1">Reporte de Citas de <span><?php echo $fecha_inicial ?></span> A <span><?php echo $fecha_final ?></span></h3>

                    </div>

                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">


                        <!-- =========================================================== -->


                        <h3 class="mt-1 mb-1">Reporte de Kilometrajes Ingresado</h3>

                        <div class="row">
                            <div class="container-fluid ">
                                <table id="example" class="table table-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>fecha y Hora Creado</th>

                                            <th>fecha Programada Visita</th>
                                            <th>Nombre Sector</th>
                                            <th>Nombre Cliente</th>
                                            <th>Vendedor</th>
                                            <th>estado</th>
                                            <th>tipo Visita</th>
                                            <th>fecha y Hora Apertura</th>

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
                                                    $oDatecc = new DateTime($row1['fecha_creada']);
                                                    $sDatecc = $oDatecc->format("d-m-Y H:i:s");

                                                    echo $sDatecc; ?></td>



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
                                                    if ($row1['fecha_apertura'] == '') {
                                                    } else {
                                                        $oDate1 = new DateTime($row1['fecha_apertura']);
                                                        $sDate1 = $oDate1->format("d-m-Y H:i:s");

                                                        echo $sDate1;
                                                    } ?></td>
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
                            <!-- /.row -->




                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->

                <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
                    <i class="fas fa-chevron-up"></i>
                </a>
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 3.2.0-rc
                </div>
                <strong>Copyright &copy; 2014-2022 <a href="">Appwebsome</a>.</strong> All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <link href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" re="stylesheet">




        <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    dom: 'Bfrtip',
                    "lengthMenu": [10, 20, 30],
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5'
                    ]
                });
            });
        </script>
    </body>

    </html>
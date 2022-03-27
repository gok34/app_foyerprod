 <?PHP
    include "permisos.php";;
    include "config.php";
    include "utils.php";
    date_default_timezone_set('America/Guatemala');
    $fechahoy = date("Y-m-d H:i:s");
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

            $stat1 = $dbConn->prepare("
	
	select usuarios.names,SUM(totalkm) as total from control 
INNER JOIN usuarios on usuarios.user= control.id_usuario
where estado=2 and fecha BETWEEN '{$fecha_inicial} 00:00:00' AND '{$fecha_final} 23:59:00'  GROUP BY usuarios.names ");
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
     <title>Reporte kilometros por Visita</title>

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
         <aside class="main-sidebar sidebar-dark-primary elevation-4">
             <!-- Brand Logo -->
             <a href="index3.html" class="brand-link">
                 <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                 <span class="brand-text font-weight-light">FOYER ADMIN</span>
             </a>

             <!-- Sidebar -->
             <div class="sidebar">
                 <!-- Sidebar user panel (optional) -->
                 <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                     <div class="image">
                         <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                     </div>
                     <div class="info">
                         <a href="#" class="d-block">ADMINISTRADOR</a>
                     </div>
                 </div>

                 <!-- SidebarSearch Form -->


                 <!-- Sidebar Menu -->
                 <nav class="mt-2">
                     <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                         <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                         <li class="nav-item">
                             <a href="reportegeneral.php" class="nav-link">
                                 <i class="nav-icon fas fa-chart-pie"></i>
                                 <p>Dashboard v1</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="vercitasechas.php" class="nav-link active">
                                 <i class="nav-icon fas fa-th"></i>
                                 <p>
                                     Reporte de Visitas
                                     <span class="right badge badge-danger"></span>
                                 </p>
                             </a>
                         </li>





                         <li class="nav-item">
                             <a href="vervisitas.php" class="nav-link">
                                 <i class="nav-icon far fa-image"></i>
                                 <p>
                                     reporte de Km
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="reportekilometraje.php" class="nav-link">
                                 <i class="nav-icon fas fa-columns"></i>
                                 <p>
                                     Reporte General Kilometraje
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="agregarusuarios.php" class="nav-link">
                                 <i class="nav-icon fas fa-columns"></i>
                                 <p>
                                     Agregar Usuarios
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="agregarrutasf.php" class="nav-link">
                                 <i class="nav-icon fas fa-columns"></i>
                                 <p>
                                     Agregar Sector
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="agregarsectoresf.php" class="nav-link">
                                 <i class="nav-icon fas fa-columns"></i>
                                 <p>
                                     Agregar Rutas
                                 </p>
                             </a>
                         </li>
 <li class="nav-item">
                             <a href="verclientesactu.php" class="nav-link">
                                 <i class="nav-icon fas fa-columns"></i>
                                 <p>
                                    Clientes Actualizados
                                 </p>
                             </a>
                         </li>
 <li class="nav-item">
                             <a href="vervalescombustible.php" class="nav-link">
                                 <i class="nav-icon fas fa-columns"></i>
                                 <p>
                                    Ver Vales Combustible
                                 </p>
                             </a>
                         </li>



                     </ul>
                 </nav>
                 <!-- /.sidebar-menu -->
             </div>
             <!-- /.sidebar -->
         </aside>

         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-1">
                         <div class="col-sm-2">
                             <h1>Foyer</h1>
                         </div>
                         <div class="col-sm-3">
                             <ol class="breadcrumb float-sm-right">
                                 <form role="form" class="form-horizontal" method="POST" action="filtrokmvista.php">
                                     <div class="row">
                                         <div class="col-sm-4">

                                             <div class="form-group">
                                                 <label for="exampleInputEmail1">Fecha Inicio</label>

                                             </div>
                                         </div>
                                         <div class="col-sm-8">

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

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">


                     <!-- =========================================================== -->


                     <h3 class="mt-1 mb-1">Reporte de Kilometrajes de <span><?php echo $fecha_inicial ?></span> A <span><?php echo $fecha_final ?></span></h3>

                     <div class="row">
                         <div class="container-fluid ">
                             <table id="example" class="table table-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%">
                                 <thead>
                                     <tr>

                                         <th>Nombre de Vendedor</th>
                                         <th>Total de Kilometraje</th>
                                         <th>fecha y hora de calculo</th>


                                     </tr>
                                 </thead>

                                 <tbody>
                                     <?php
                                        while ($row1 = $stat1->fetch()) {
                                        ?>
                                         <tr>





                                             <td><?php echo $row1['names'] ?></td>
                                             <td><?php echo $row1['total'] ?> </td>
                                             <td><?php
                                                    $oDate = new DateTime($fechahoy);
                                                    $sDate = $oDate->format("d-m-Y H:i:s");
                                                    echo
                                                    $sDate; ?> </td>





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
             <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
 </body>

 </html>
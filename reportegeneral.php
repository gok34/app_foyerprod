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

    $stat1 = $dbConn->prepare("select usuarios.names,usuarios.cod_vendedor,tipousuario.descripciontipousuario,usuarios.sexo from usuarios INNER JOIN tipousuario on tipousuario.idtipousuario=usuarios.id_tipousuario");
    $stat1->execute();
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
     <title>AdminLTE 3 | Widgets</title>

     <!-- Google Font: Source Sans Pro -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
     <!-- Ionicons -->
     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <!-- Theme style -->
     <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
                                     Agregar Vendedores
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
                                     Agregar Clientes
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
                             <a href="verclientesnuevos.php" class="nav-link">
                                 <i class="nav-icon fas fa-columns"></i>
                                 <p>
                                    Clientes Nuevos
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
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Foyer</h1>
                         </div>
                         <div class="col-sm-6">
                             <ol class="breadcrumb float-sm-right">
                                 <li class="breadcrumb-item"><a href="#">Home</a></li>
                                 <li class="breadcrumb-item active">Widgets</li>
                             </ol>
                         </div>

                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">


                     <!-- =========================================================== -->


                     <h3 class="mt-4 mb-4">Reporte de citas</h3>

                     <div class="row">
                         <?php
                            while ($row1 = $stat1->fetch()) {
                            ?>
                             <!-- /.col -->
                             <div class="col-md-4">
                                 <!-- Widget: user widget style 1 -->
                                 <div class="card card-widget widget-user">
                                     <!-- Add the bg color to the header using any of the bg-* classes -->
                                     <div class="widget-user-header bg-info">
                                         <h3 class="widget-user-username"><?php echo $row1['names'] ?></h3>
                                         <h5 class="widget-user-desc"><?php echo $row1['descripciontipousuario'] ?></h5>
                                     </div>
                                     <div class="widget-user-image">


                                         <?php

                                            if ($row1['sexo'] == 'M') { ?>
                                             <img class="img-circle elevation-2" src="dist/img/avatar5.png" alt="User Avatar">
                                         <?php } else {  ?>
                                             <img class="img-circle elevation-2" src="dist/img/avatar2.png" alt="User Avatar">

                                         <?php }  ?>
                                     </div>
                                     <div class="card-footer">
                                         <div class="row">
                                             <div class="col-sm-3 border-right">
                                                 <div class="description-block">
                                                     <?php
                                                        $id_usuario = $row1['cod_vendedor'];
                                                        $stat2 = $dbConn->prepare("select COUNT(estado) as totalc from citas where estado=1 and id_usuario=$id_usuario and MONTH(fecha_creada)  = MONTH(CURRENT_DATE())  ");
                                                        $stat2->execute();
                                                        while ($row2 = $stat2->fetch()) {

 
                                                            $totalC = $row2['totalc'];
                                                        }
                                                        ?>
                                                     <h5 class="description-header"><?php echo $totalC ?></h5>

                                                     <span class="description-text">Creadas</span>
                                                 </div>
                                                 <!-- /.description-block -->
                                             </div>
                                             <!-- /.col -->
                                             <div class="col-sm-3 border-right">
                                                 <div class="description-block">
                                                     <?php
                                                        $id_usuario = $row1['cod_vendedor'];
                                                        $stat3 = $dbConn->prepare("select COUNT(estado) as totalA from citas where estado=3 and id_usuario=$id_usuario and  MONTH(fecha_creada)  = MONTH(CURRENT_DATE()) ");
                                                        $stat3->execute();
                                                        while ($row3 = $stat3->fetch()) {


                                                            $totalA = $row3['totalA'];
                                                        }
                                                        ?>
                                                     <h5 class="description-header"><?php echo $totalA ?></h5>
                                                     <span class="description-text">Abiertas</span>
                                                 </div>
                                                 <!-- /.description-block -->
                                             </div>
                                             <!-- /.col -->
                                             <div class="col-sm-4">
                                                 <div class="description-block">
                                                     <?php
                                                        $id_usuario = $row1['cod_vendedor'];
                                                        $stat4 = $dbConn->prepare("select COUNT(estado) as totalCC from citas where estado=2 and id_usuario=$id_usuario and  MONTH(fecha_creada)  = MONTH(CURRENT_DATE()) ");
                                                        $stat4->execute();
                                                        while ($row4 = $stat4->fetch()) {


                                                            $totalCC = $row4['totalCC'];
                                                        }
                                                        ?>
                                                     <h5 class="description-header"><?php echo $totalCC ?></h5>
                                                     <span class="description-text">Finalizadas</span>
                                                 </div>
                                                 <!-- /.description-block -->
                                             </div>
                                             <div class="col-sm-2 border-right">
                                                 <div class="description-block">
                                                     <?php
                                                        $id_usuario = $row1['cod_vendedor'];
                                                        $stat4 = $dbConn->prepare("select SUM(totalkm) as totalkm from control 
                                                                    where estado=2 and id_usuario=$id_usuario and   MONTH(fecha)  = MONTH(CURRENT_DATE())");
                                                        $stat4->execute();
                                                        while ($row4 = $stat4->fetch()) {


                                                            $totalkm = $row4['totalkm'];
                                                        }
                                                        ?>

                                                     <?php

                                                        if ($totalkm == '') { ?>
                                                         <h5 class="description-header"><?php echo "0"; ?></h5>
                                                     <?php } else {  ?>
                                                         <h5 class="description-header"><?php echo $totalkm ?></h5>

                                                     <?php }  ?>
                                                     <span class="description-text">Km </span>
                                                 </div>
                                                 <!-- /.description-block -->
                                             </div>
                                             <!-- /.col -->
                                         </div>
                                         <!-- /.row -->
                                     </div>
                                 </div>
                                 <!-- /.widget-user -->
                             </div>
                         <?php  }
                            ?>
                         <!-- /.col -->

                         <!-- /.col -->
                     </div>
                     <!-- /.row -->





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

 </body>

 </html>
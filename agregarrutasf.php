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
     <title></title>

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
                                     Reporte de Apertura y Cierre Rutas
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
                                     Agregar Vendedor                                 </p>
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
                                     Agregar Cliente
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
                         
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">


                     <!-- =========================================================== -->


                     

                     <div class="row">
                         
                        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Agregar Sectores</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" class="form-horizontal" method="POST" action="guardasectorf.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre Sector</label>
                    <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Ingrese nombre" required >
                  </div>
                  
			
				  
				
                  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
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
                 <b>Version</b> 1.1
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
	 
	  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
     <!-- AdminLTE for demo purposes -->
 

 </body>

 </html>
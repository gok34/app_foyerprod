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

    $stat1 = $dbConn->prepare("CALL sp_view_repartovista(); ");
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
     <title>Foyer | Reparto</title>

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
         <?php
            include 'menubodega.php';
            ?>

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
                                 <li class="breadcrumb-item"><a href="#">reparto</a></li>
                                 <li class="breadcrumb-item active">Inicio</li>
                             </ol>
                         </div>

                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">


                     <!-- =========================================================== -->


                     <h3 class="mt-4 mb-4">PENDIENTES DE REPARTO</h3>

                     <div class="row">
                         <?php
                            while ($row1 = $stat1->fetch()) {
                            ?>
                             <!-- /.col -->
                             <div class="col-md-3">
                                 <!-- Widget: user widget style 1 -->
                                 <div class="card card-widget widget-user">
                                     <!-- Add the bg color to the header using any of the bg-* classes -->
									 <?php if($row1['area_destino']=="cliente") { ?>
                                     <div class="widget-user-header bg-primary mb-1">
                                         <h3 class="widget-user-username ">n.º <?php echo $row1['num_orde'] ?></h3>
										 									
                                         <h5 class="widget-user-desc"><?php echo $row1['area_destino'] ?></h5>
										   <h5 class="widget-user-desc">Tipo Envio:<?php echo $row1['tipoenvio'] ?></h5>
                                     </div>
							<?php }else if ($row1['area_destino']=="institucional"){ ?>
							 
                                     <!-- Add the bg color to the header using any of the bg-* classes -->
									
                                     <div class="widget-user-header bg-success mb-1">
                                         <h3 class="widget-user-username">n.º <?php echo $row1['num_orde'] ?></h3>
										 									
                                         <h5 class="widget-user-desc"><?php echo $row1['area_destino'] ?></h5>
										  <h5 class="widget-user-desc">Tipo Envio:<?php echo $row1['tipoenvio'] ?></h5>
                                     </div>
									 	
										<?php }else if ($row1['area_destino']=="xela"){ ?>
							 
                                     <!-- Add the bg color to the header using any of the bg-* classes -->
									
                                     <div class="widget-user-header bg-danger mb-1">
                                         <h3 class="widget-user-username">n.º <?php echo $row1['num_orde'] ?></h3>
										 
										
                                         <h5 class="widget-user-desc"><?php echo $row1['area_destino'] ?></h5>
										  <h5 class="widget-user-desc">Tipo Envio:<?php echo $row1['tipoenvio'] ?></h5>
										  
                                     </div>
									 
										<?php }else if ($row1['area_destino']=="sanus"){ ?>
							 
                                     <!-- Add the bg color to the header using any of the bg-* classes -->
									
                                     <div class="widget-user-header bg-warning mb-1">
                                         <h3 class="widget-user-username">n.º <?php echo $row1['num_orde'] ?></h3>
										
										 
										
                                         <h5 class="widget-user-desc"><?php echo $row1['area_destino'] ?></h5>
										  <h5 class="widget-user-desc">Tipo Envio:<?php echo $row1['tipoenvio'] ?></h5>
										 
                                     </div>
									 	
										<?php }else if ($row1['area_destino']=="agudef"){ ?>
							 
                                     <!-- Add the bg color to the header using any of the bg-* classes -->
									
                                     <div class="widget-user-header bg-secondary mb-1">
                                         <h3 class="widget-user-username">n.º <?php echo $row1['num_orde'] ?></h3>
										 
										
                                         <h5 class="widget-user-desc"><?php echo $row1['area_destino'] ?></h5>
										  <h5 class="widget-user-desc">Tipo Envio:<?php echo $row1['tipoenvio'] ?></h5>
										  
                                     </div>
									 	<?php } else { ?>
										<div class="widget-user-header bg-info mb-1">
                                        <h5 class="widget-user-desc"><?php echo $row1['tipoenvio'] ?></h5>
										 
										
                                      
                                     </div>
										<?php }  ?>
                                     <div class="widget-user-image">


                                     

                                     </div>
                                     <div class="">
                                         <div class="row">
                                            
                                             <!-- /.col -->
                                            
                                             <!-- /.col -->
                                             <div class="col-sm-12">
                                                 <div class="description-block">
												  <?php if($row1['area_destino']=="cliente") { ?>
                                   <h5 class="description-header">Sector:<?php echo $row1['nombre_sector'] ?></h5>
													 <br>
													  <h5 class="description-header">Cliente:<?php echo $row1['nombre_sucursal'] ?></h5>
													   
													    <span class="description-header">Cant. Paquetes:</span>
														<br>
													    <span class="description-header text-danger"><?php echo $row1['tipo_de_empaque'] ?></span>
														<br>
                                                    <h5 class="description-header">Observaciones :<?php echo $row1['observacionesvarias'] ?></h5>
										 
										
                                       
                                     
							<?php }else if ($row1['area_destino']=="institucional"){ ?>
							 
                                     <!-- Add the bg color to the header using any of the bg-* classes -->
									  <h5 class="description-header">Sector:<?php echo $row1['nombre_sector'] ?></h5>
													 <br>
													  
													   <span class="description-header">Cant. Paquetes:</span>
														<br>
													    <span class="description-header text-danger"><?php echo $row1['tipo_de_empaque'] ?></span>
														
                                                    <h5 class="description-header mb-2">Observaciones :<?php echo $row1['observacionesvarias'] ?></h5>
                                    
										<?php }else if ($row1['area_destino']=="xela"){ ?>
							 
                                     <!-- Add the bg color to the header using any of the bg-* classes -->
									  <h5 class="description-header">Sector:<?php echo $row1['nombre_sector'] ?></h5>
													 <br>
													  
													   <span class="description-header">Cant. Paquetes:</span>
														<br>
													    <span class="description-header text-danger"><?php echo $row1['tipo_de_empaque'] ?></span>
														<br>
                                                    <h5 class="description-header">Observaciones :<?php echo $row1['observacionesvarias'] ?></h5>
                                     
									 
										<?php }else if ($row1['area_destino']=="sanus"){ ?>
							 
                                     <!-- Add the bg color to the header using any of the bg-* classes -->
									  <h5 class="description-header">Sector:<?php echo $row1['nombre_sector'] ?></h5>
													 <br>
													  
													
													   <span class="description-header">Cant. Paquetes:</span>
														<br>
													    <span class="description-header text-danger"><?php echo $row1['tipo_de_empaque'] ?></span>
														<br>
                                                    <h5 class="description-header">Observaciones :<?php echo $row1['observacionesvarias'] ?></h5>
                                   
									 	
										<?php }else if ($row1['area_destino']=="agudef"){ ?>
							 
                                     <!-- Add the bg color to the header using any of the bg-* classes -->
									  <h5 class="description-header">Sector:<?php echo $row1['nombre_sector'] ?></h5>
													
													

													   <span class="description-header">Cant. Paquetes:</span>
														<br>
													    <span class="description-header text-danger"><?php echo $row1['tipo_de_empaque'] ?></span>
                                                    <h5 class="description-header">Observaciones :<?php echo $row1['observacionesvarias'] ?></h5>
                                   
									 	<?php } else { ?>
										 
												   <h5 class="description-header">Destino :<?php echo $row1['area_destino'] ?></h5>
												   <br>
										 <h5 class="description-header">Solicitado Por :<?php echo $row1['observacionesvarias'] ?></h5>	  
													 
                                                   
										<?php }  ?>
												 
												 
												 
												 
                                                  
                                                     
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
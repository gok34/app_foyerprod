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
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
        

         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>FAMILIA VALBERT FIGUEROA</h1>
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
                <h3 class="card-title">AGREGAR GASTOS</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" class="form-horizontal" method="POST" action="guardargasto.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group"> 
                    <label for="exampleInputEmail1">MONTO</label>
                    <input type=text" name="monto" step="0.01" class="form-control" id="exampleInputEmail1" placeholder="0.00" required >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">lugar</label>
                    <input type="text" name="lugar" class="form-control" id="exampleInputPassword1" placeholder="" required>
                  </div>
				   <div class="form-group">
                    <label for="exampleInputPassword1">descripcion</label>
                      <div class="col-sm-12 col-md-12 ">


                                            <textarea rows="3" name="descripcion" id="descripcion" cols="200" class="form-control"></textarea>


                                        </div>
                  </div>
				   <div class="form-group">
                  <label for="exampleSelectBorder">Tipos de gasto </label>
                  <select name="tipogasto" class="custom-select form-control-border" id="exampleSelectBorder" required>
                    <option value="Personal">Personal</option>
                    <option value="Supermercado">Supermercado</option>
					  <option value="Mercado">Mercado</option>
					   <option value="Casa">Casa</option>
					    <option value="salud">salud</option>
						<option value="Salidas personales">Salidas personales</option>
<option value="Salidas Juntas">Salidas Juntas</option>
<option value="Gasolina">Gasolina</option>
                    
                  </select>
                </div>
				 <div class="form-group">
                  <label for="exampleSelectBorder">quien lo hizo </label>
                  <select name="sexo" class="custom-select form-control-border" id="exampleSelectBorder" required>
                    <option value="Allen">Allen</option>
                    <option value="Nelly">Nelly</option>
                    
                  </select>
                </div>
                   <div class="form-group">
                  <label for="exampleSelectBorder">Forma de Pago </label>
                  <select name="formadepago" class="custom-select form-control-border" id="exampleSelectBorder" required>
                    <option value="TC">Tarjeta de Credito</option>
                    <option value="TD">Tarjeta de Debito</option>
                     <option value="Efectivo">Efectivo</option>

                  </select>
                </div>

                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
                     </div>
					  <div class="col-md-6">
					  <div class="card" style="width: 18rem;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Gastos del Mes
	 <?php
                                                       
                                                        $stat4 = $dbConn->prepare("select SUM(monto) as total from gastoAN 
                                                                    ");
                                                        $stat4->execute();
														$stat5 = $dbConn->prepare("select SUM(monto) as total from gastoAN  where quien='Allen'
                                                                    ");
                                                        $stat5->execute();
														$stat6 = $dbConn->prepare("select SUM(monto) as total from gastoAN where quien='Nelly' 
                                                                    ");
                                                        $stat6->execute();
                                                     

													 $row4 = $stat4->fetch();
													 	 $row5 = $stat5->fetch();
														 	 $row6 = $stat6->fetch();


                                                            $totalkm = $row4['total'];
															 $totalkmA = $row5['total'];
															  $totalkmN = $row6['total'];
                                                        
                                                        ?>  <p  class="fs-1"><?php echo $totalkm ?></p> </li>
    <li class="list-group-item">Total Allen <p  class="fs-1"><?php echo $totalkmA ?></p></li>
    <li class="list-group-item">Total Nelly <p  class="fs-1"><?php echo $totalkmN ?></p></li></li>
  </ul>
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
	 
	 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
     <script src="plugins/jquery/jquery.min.js"></script>
     <!-- Bootstrap 4 -->
     <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
     <!-- AdminLTE App -->
     <script src="dist/js/adminlte.min.js"></script>
     <!-- AdminLTE for demo purposes -->
 
 </body>

 </html>
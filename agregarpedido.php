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
     <link rel="stylesheet"
         href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
     <!-- Ionicons -->
     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <!-- Theme style -->
     <link rel="stylesheet" href="dist/css/adminlte.min.css">

     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

                         <div class="col-md-12">
                             <!-- general form elements -->
                             <div class="card card-primary">
                                 <div class="card-header">
                                     <h3 class="card-title">Realizar Pedido de Reparto</h3>
                                 </div>
                                 <!-- /.card-header -->
                                 <!-- form start -->
                                 <form role="form" class="form-horizontal" method="POST" action=""
                                     enctype="multipart/form-data">
                                     <div class="card-body">
                                         <div class="form-group">
                                             <label for="exampleInputEmail1">Numero de Orden</label>
                                             <input type="text" name="orden" class="form-control" id="orden"
                                                 placeholder="Ingrese nombre" required>
                                         </div>
                                         <div class="row">

                                             <div class="col-md-2">
                                                 <div class="form-group">

                                                     <label for="exampleInputPassword1">Bolsa pequeña</label>
                                                     <input type="checkbox" name="marcadobolsa" class="form-control"
                                                         id="exampleInputPassword1" placeholder="" required>
                                                     <input type="number" name="cantidadbolsa" class="form-control"
                                                         id="exampleInputPassword1" placeholder="Cant." required>
                                                 </div>
                                             </div>
                                             <div class="col-md-2">
                                                 <div class="form-group">

                                                     <label for="exampleInputPassword1">Caja Pequeña</label>
                                                     <input type="checkbox" name="marcadobolsa" class="form-control"
                                                         id="exampleInputPassword1" placeholder="" required>
                                                     <input type="number" name="cantidadbolsa" class="form-control"
                                                         id="exampleInputPassword1" placeholder="Cant." required>
                                                 </div>
                                             </div>
                                             <div class="col-md-2">
                                                 <div class="form-group">

                                                     <label for="exampleInputPassword1">Caja Mediana</label>
                                                     <input type="checkbox" name="marcadobolsa" class="form-control"
                                                         id="exampleInputPassword1" placeholder="" required>
                                                     <input type="number" name="cantidadbolsa" class="form-control"
                                                         id="exampleInputPassword1" placeholder="Cant." required>
                                                 </div>
                                             </div>
                                             <div class="col-md-2">
                                                 <div class="form-group">

                                                     <label for="exampleInputPassword1">Caja Grande</label>
                                                     <input type="checkbox" name="marcadobolsa" class="form-control"
                                                         id="exampleInputPassword1" placeholder="" required>
                                                     <input type="number" name="cantidadbolsa" class="form-control"
                                                         id="exampleInputPassword1" placeholder="Cant." required>
                                                 </div>
                                             </div>
                                             <div class="col-md-2">
                                                 <div class="form-group">

                                                     <label for="exampleInputPassword1">Bulto</label>
                                                     <input type="checkbox" name="marcadobolsa" class="form-control"
                                                         id="exampleInputPassword1" placeholder="" required>
                                                     <input type="number" name="cantidadbolsa" class="form-control"
                                                         id="exampleInputPassword1" placeholder="Cant." required>
                                                 </div>
                                             </div>

                                         </div>
                                         <div class="row">

                                             <div class="col-md-2">
                                                 <div class="form-group">

                                                     <label for="exampleInputPassword1">Clientes</label>
                                                     <input type="checkbox" name="clientes" class="form-control"
                                                         id="clientes" placeholder="" required>

                                                 </div>
                                             </div>
                                             <div class="col-md-2">
                                                 <div class="form-group">

                                                     <label for="exampleInputPassword1">Intitucional</label>
                                                     <input type="checkbox" name="intitucional" class="form-control"
                                                         id="intitucional" placeholder="" required>

                                                 </div>
                                             </div>
                                             <div class="col-md-2">
                                                 <div class="form-group">

                                                     <label for="exampleInputPassword1">Xela</label>
                                                     <input type="checkbox" name="xela" class="form-control" id="xela"
                                                         placeholder="" required>

                                                 </div>
                                             </div>
                                             <div class="col-md-2">
                                                 <div class="form-group">

                                                     <label for="exampleInputPassword1">Sanus</label>
                                                     <input type="checkbox" name="sanus" class="form-control" id="sanus"
                                                         placeholder="" required>

                                                 </div>
                                             </div>
                                             <div class="col-md-2">
                                                 <div class="form-group">

                                                     <label for="exampleInputPassword1">Agudef</label>
                                                     <input type="checkbox" name="agudef" class="form-control"
                                                         id="agudef" placeholder="" required>

                                                 </div>
                                             </div>

                                         </div>

                                         <div id="ver" style="display: none;">
                                             <div class="form-group">
                                                 <label for="exampleInputPassword1">Sector de Punto</label>

                                                 <select class="custom-select form-control-border" id="sector_id"
                                                     name="sector">

                                                 </select>

                                                 <div class="resultado"></div>
                                             </div>
                                             <div class="form-group">
                                                 <label for="exampleInputPassword1">Sector de Punto</label>

                                                 <select class="js-example-basic-single form-control-border"
                                                     id="ruta"></select>

                                                 </select>

                                                 <div class="resultado"></div>
                                             </div>
                                             <div class="form-group">
                                                 <label for="exampleInputPassword1">Codigo de Cliente</label>
                                                 <input type="number" name="codigocliente" class="form-control"
                                                     id="exampleInputPassword1" placeholder="" required>
                                             </div>
                                             <div class="form-group">
                                                 <label for="exampleInputPassword1">Codigo de Usuario</label>
                                                 <input type="number" name="codigousuario" class="form-control"
                                                     id="exampleInputPassword1" placeholder="" required>
                                             </div>

                                         </div>

                                         <div id="intitucionalb" style="display: none;">

                                             <div class="form-group">
                                                 <label for="exampleInputPassword1"> Observaciones de Envio</label>
                                                 <textarea id="w3review" class="form-control" name="w3review" rows="4"
                                                     cols="50">

  </textarea>
                                             </div>


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
     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

     <script>
     $(document).ready(function() {
         $('.js-example-basic-single').select2();
     });
     </script>
     <script>
     var checkbox = document.getElementById('clientes');
     checkbox.addEventListener('change', function() {
         if (this.checked) {
             document.getElementById("ver").style.display = "block";
             document.getElementById("intitucional").disabled = true;
             document.getElementById("xela").disabled = true;
             document.getElementById("sanus").disabled = true;
             document.getElementById("agudef").disabled = true;

         } else {
             document.getElementById("ver").style.display = "none";
             document.getElementById("intitucional").disabled = false;
             document.getElementById("xela").disabled = false;
             document.getElementById("sanus").disabled = false;
             document.getElementById("agudef").disabled = false;
         }
     });

     var checkbox1 = document.getElementById('intitucional');
     checkbox1.addEventListener('change', function() {
         if (this.checked) {
             document.getElementById("clientes").disabled = true;
             document.getElementById("intitucionalb").style.display = "block";


             document.getElementById("xela").disabled = true;
             document.getElementById("sanus").disabled = true;
             document.getElementById("agudef").disabled = true;
         } else {
             document.getElementById("clientes").disabled = false;
             document.getElementById("intitucionalb").style.display = "none";



             document.getElementById("xela").disabled = false;
             document.getElementById("sanus").disabled = false;
             document.getElementById("agudef").disabled = false;
         }
     });
     </script>


     <!-- AdminLTE for demo purposes -->
     <script>
     //let estado = document.getElementById('id_estado');

     $(document).on('ready', function() {
         //let inputvalor = document.getElementById("id_estado").value;
         var objXMLHttpRequestt = new XMLHttpRequest();
         objXMLHttpRequestt.onreadystatechange = function() {
             if (objXMLHttpRequestt.readyState === 4) {
                 if (objXMLHttpRequestt.status === 200) {
                     // valor=objXMLHttpRequest.responseText;
                     var myArr = JSON.parse(this.responseText);
                     myFunction(myArr);

                 } else {
                     alert('Error Code: ' + objXMLHttpRequestt.status);
                     alert('Error Message: ' + objXMLHttpRequestt.statusText);
                 }
             }
         }
         objXMLHttpRequestt.open('GET', 'http://143.198.163.181/apisectores.php');
         objXMLHttpRequestt.send();
     });

     function myFunction(arr) {
         var out1 = "";
         var i;
         for (i = 0; i < arr.length; i++) {
             out1 += '<option value="' + arr[i].id_sucursal + '">' +
                 arr[i].nombre_sector + '</option>';
         }

         document.getElementById("sector_id").innerHTML = out1;
     }
     </script>
     <script>
     //let estado = document.getElementById('id_estado');


     document.getElementById("sector_id").onchange = function(e) {
         let inputvalor = document.getElementById("sector_id").value;
         alert(inputvalor);
         var objXMLHttpRequest = new XMLHttpRequest();
         objXMLHttpRequest.onreadystatechange = function() {
             if (objXMLHttpRequest.readyState === 4) {
                 if (objXMLHttpRequest.status === 200) {
                     // valor=objXMLHttpRequest.responseText;
                     var myArr2 = JSON.parse(this.responseText);
                     myFunction2(myArr2);

                 } else {
                     alert('Error Code: ' + objXMLHttpRequest.status);
                     alert('Error Message: ' + objXMLHttpRequest.statusText);
                 }
             }
         }
         objXMLHttpRequest.open('GET', 'http://143.198.163.181/apirutastodas.php?codigo_sector=' + inputvalor);
         objXMLHttpRequest.send();
     }

     function myFunction2(arr2) {
         var out = "";
         var ii;
         for (ii = 0; ii < arr2.length; ii++) {
             out += '<option value="' + arr2[ii].id_codigo + '">' +
                 arr2[ii].nombre_sucursal + '</option>';

         }

         document.getElementById("ruta").innerHTML = out;
     }
     </script>
 </body>

 </html>
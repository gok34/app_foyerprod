<?PHP

require_once "permisos.php";
require_once "config.php";
require_once "utils.php";
date_default_timezone_set('America/Guatemala');
$fechahoy = date("Y-m-d H:i:s");
$dbConn =  connect($dbdigital);
$json = array();




//$dbConn =  connect($db);





//$dbh = new PDO("mysql:host=$hostname;dbname=$database","u835344958_appfoyer","#iQ634@pne");


?>

<?php

$stat1 = $dbConn->prepare("select usuarios.names,usuarios.cod_vendedor,tipousuario.descripciontipousuario,usuarios.sexo from usuarios INNER JOIN tipousuario on tipousuario.idtipousuario=usuarios.id_tipousuario");
$stat1->execute();
/* while($row = $stat->fetch()){
        echo "<li><a href='vervisitas.php?id=".$row['id']."' target='_blank'>".$row['imagen']."</a><br>
        <embed src='data:".$row['tipo'].";base64,".base64_encode($row['contenido'])."'width='200'/></li>";
    }*/
?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Foyer | 2022</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dist/css/select2-bootstrap4.css">
    <link rel="stylesheet" href="dist/css/select2-bootstrap4.min.css">
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
        require 'menubodega.php';
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
                                <div>
                                    <div class="col-md-6">
                                        <div class=" row">
                                            <div class="col-md-4">
                                                <form role="form" class="form-horizontal" method="POST" action="guardarorden.php" enctype="multipart/form-data">
                                                    <div class="form-group" style="height:none">

                                                        <label for="exampleInputPassword1">Envio Interno</label>

                                                        <input type="checkbox" name="tipoenvio" class="form-control" id="interno" placeholder="" value="interno">

                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group" style="height:none">


                                                    <label for="exampleInputPassword1">Envio por
                                                        Cargo</label>
                                                    <input type="checkbox" name="tipoenvio" class="form-control" id="cargo" placeholder="" value="cargo">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group" style="height:none">


                                                    <label for="exampleInputPassword1">Mandados o Otros
                                                    </label>
                                                    <input type="checkbox" name="tipoenvio" class="form-control" id="mandados" value="mandado" placeholder="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div id="pedido" style="display: none">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Numero de Orden</label>
                                            <input type="number" name="orden" class="form-control" id="orden" placeholder="Ingrese nombre" required>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-2">
                                                <div class="form-group">

                                                    <label for="exampleInputPassword1">Bolsa pequeña</label>
                                                    <input type="checkbox" name="marcadobolsa" class="form-control" id="exampleInputPassword1" placeholder="">
                                                    <input type="number" name="cantidadbolsa" class="form-control" id="exampleInputPassword1" placeholder="Cant."tabindex="1">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">

                                                    <label for="exampleInputPassword1">Caja Pequeña</label>
                                                    <input type="checkbox" name="marcadobolsa" class="form-control" id="exampleInputPassword1" placeholder="">
                                                    <input type="number" name="cajapeque" class="form-control" id="exampleInputPassword1" placeholder="Cant." tabindex="2">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">

                                                    <label for="exampleInputPassword1">Caja Mediana</label>
                                                    <input type="checkbox" name="cajamedianax" class="form-control" id="exampleInputPassword1" placeholder="">
                                                    <input type="number" name="cajamediana" class="form-control" id="exampleInputPassword1" placeholder="Cant."tabindex="3">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">

                                                    <label for="exampleInputPassword1">Caja Grande</label>
                                                    <input type="checkbox" name="marcadobolsa" class="form-control" id="exampleInputPassword1" placeholder="">
                                                    <input type="number" name="cajagrande" class="form-control" id="exampleInputPassword1" placeholder="Cant." tabindex="4">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">

                                                    <label for="exampleInputPassword1">Bulto</label>
                                                    <input type="checkbox" name="marcadobolsa" class="form-control" id="exampleInputPassword1" placeholder="">
                                                    <input type="number" name="bulto" class="form-control" id="exampleInputPassword1" placeholder="Cant." tabindex="5">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-md-2">
                                                <div class="form-group">

                                                    <label for="exampleInputPassword1">Clientes</label>
                                                    <input type="checkbox" name="areadestino" class="form-control" id="clientes" placeholder="" value="cliente" >

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">

                                                    <label for="exampleInputPassword1">Intitucional</label>
                                                    <input type="checkbox" name="areadestino" class="form-control" id="intitucional" placeholder="" value="institucional">

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">

                                                    <label for="exampleInputPassword1">Xela</label>
                                                    <input type="checkbox" name="areadestino" class="form-control" id="xela" placeholder="" value="xela">

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">

                                                    <label for="exampleInputPassword1">Sanus</label>
                                                    <input type="checkbox" name="areadestino" class="form-control" id="sanus" placeholder="" value="sanus">

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">

                                                    <label for="exampleInputPassword1">Agudef</label>
                                                    <input type="checkbox" name="areadestino" class="form-control" id="agudef" placeholder="" value="agudef">

                                                </div>
                                            </div>


                                        </div>

                                        <div id="ver" style="display: none">
                                            <div class="row">
                                                <div class="col-md-2">

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Sector</label>

                                                        <select class="custom-select form-control-border" id="sector_id" name="departamento1">

                                                        </select>

                                                        <div class="resultado"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class=" form-group">
                                                        <label for="exampleInputPassword1">Cliente</label>

                                                        <select class="custom-select form-control-border" name="clientes" id="ruta"></select>

                                                        </select>

                                                        <div class="resultado"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div id="cargoexpress" style="display: none;">

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1"> Numero Guia
                                                            </label>
                                                            <input type="number" name="numerodeguia1" class="form-control" id="orden" placeholder="Ingrese nombre">
                                                            <label for="exampleInputPassword1"> fecha de Entrega</label>
                                                            <input type="date" name="fechaentrega1" class="form-control" id="orden" placeholder="Ingrese nombre">
                                                        </div>


                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>








                                    <div id="intitucionalb" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1"> Observaciones deaaa
                                                        Envio</label>
                                                    <textarea id="observaciones" class="form-control" name="observacionesvarias" rows="4" cols="50">

                                                     </textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div id="cargoexpress2" style="display: none;">

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1"> Numero Guia
                                                            </label>
                                                            <input type="number" name="numerodeguia2" class="form-control" id="orden" placeholder="Ingrese nombre">
                                                            <label for="exampleInputPassword1"> fecha de Entrega</label>
                                                            <input type="date" name="fechaentrega2" class="form-control" id="orden" placeholder="Ingrese nombre">
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>



                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-body">
                                    <form role="form" class="form-horizontal" method="POST" action="guardarorden.php" enctype="multipart/form-data">
                                        <div id="mensajeria" style="display: none;">
                                            <input type="hidden" name="tipoenvio" class="form-control" id="valortipoenvio" placeholder="Ingrese nombre">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Numero de Orden</label>
                                                <input type="text" name="orden" class="form-control" id="orden" placeholder="Ingrese nombre">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1"> Lugar Destino
                                                </label>
                                                <input type="text" name="lugardestino" class="form-control" id="orden" placeholder="Ingrese nombre">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1"> Solicitado Por</label>
                                                <input type="text" name="solicitadopor" class="form-control" id="orden" placeholder="Ingrese nombre">
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>

                                        </div>



                                    </form>
                                </div>
                            </div>

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

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('select').select2({
            theme: 'bootstrap4',
        });
        $(document).ready(function() {
            $('.custom-select').select2({
                width: '100%',


            });






        });
    </script>
    <script>
        //clientes
		 document.getElementById("cargoexpress").style.display = "none";
				 document.getElementById("cargoexpress2").style.display = "none";
      

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

        //para mostra si es cargo expresss
        var checkbox = document.getElementById('cargo');
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                document.getElementById("cargoexpress").style.display = "block";
				 document.getElementById("cargoexpress2").style.display = "block";
                document.getElementById("pedido").style.display = "block";

                document.getElementById("interno").disabled = true;
                document.getElementById("mandados").disabled = true;



            } else {
                // document.getElementById("cargoexpress").style.display = "none";
                document.getElementById("pedido").style.display = "none";
                document.getElementById("interno").disabled = false;
                document.getElementById("mandados").disabled = false;
            }
        });
        //envio inerno
        var checkbox = document.getElementById('interno');
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                document.getElementById("pedido").style.display = "block";
                //  document.getElementById("cargoexpress").style.display = "block";
                document.getElementById("cargo").disabled = true;
                document.getElementById("mandados").disabled = true;
				 document.getElementById("cargoexpress").style.display = "none";
				 document.getElementById("cargoexpress2").style.display = "none";


            } else {
                document.getElementById("cargoexpress").style.display = "none";
				 document.getElementById("cargoexpress2").style.display = "none";
                document.getElementById("pedido").style.display = "none";
                document.getElementById("cargo").disabled = false;
                document.getElementById("mandados").disabled = false;

            }
        });

        //envio mandados
        var checkbox = document.getElementById('mandados');

        checkbox.addEventListener('change', function() {
            if (this.checked) {
                document.getElementById("mensajeria").style.display = "block";
                var valor = document.getElementById('mandados').value;
                //alert(valor);
                $("#valortipoenvio").val(valor);



                document.getElementById("cargo").disabled = true;
                document.getElementById("interno").disabled = true;

            } else {
                document.getElementById("mensajeria").style.display = "none";
                document.getElementById("mensajeria").disabled = false;
                document.getElementById("interno").disabled = false;
                document.getElementById("cargo").disabled = false;
            }
        });


        //muestra intitucional
        var checkbox1 = document.getElementById('intitucional');
        checkbox1.addEventListener('change', function() {
            if (this.checked) {
                document.getElementById("clientes").disabled = true;
                document.getElementById("intitucionalb").style.display = "block";
                var checkboxin = document.getElementById('cargo');
                /*checkboxin.addEventListener('change', function() {
                    if (this.checked) {
                        
                        // document.getElementById("cargoexpress").style.display = "block";


                    } else {
                        document.getElementById("cargoexpress2").style.display = "none";

                    }
                });*/

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
        //muestra xela
        var checkbox2 = document.getElementById('xela');
        checkbox2.addEventListener('change', function() {
            if (this.checked) {
                document.getElementById("clientes").disabled = true;
                document.getElementById("intitucionalb").style.display = "block";


                document.getElementById("intitucional").disabled = true;
                document.getElementById("sanus").disabled = true;
                document.getElementById("agudef").disabled = true;
            } else {
                document.getElementById("clientes").disabled = false;
                document.getElementById("intitucionalb").style.display = "none";


                document.getElementById("intitucional").disabled = false;
                document.getElementById("xela").disabled = false;
                document.getElementById("sanus").disabled = false;
                document.getElementById("agudef").disabled = false;
            }
        });

        //muestra sanus
        var checkbox2 = document.getElementById('sanus');
        checkbox2.addEventListener('change', function() {
            if (this.checked) {
                document.getElementById("clientes").disabled = true;
                document.getElementById("intitucionalb").style.display = "block";


                document.getElementById("intitucional").disabled = true;
                document.getElementById("xela").disabled = true;
                document.getElementById("agudef").disabled = true;
            } else {
                document.getElementById("clientes").disabled = false;
                document.getElementById("intitucionalb").style.display = "none";


                document.getElementById("intitucional").disabled = false;
                document.getElementById("xela").disabled = false;
                document.getElementById("sanus").disabled = false;
                document.getElementById("agudef").disabled = false;
            }
        });
        //agudef
        var checkbox2 = document.getElementById('agudef');
        checkbox2.addEventListener('change', function() {
            if (this.checked) {
                document.getElementById("clientes").disabled = true;
                document.getElementById("intitucionalb").style.display = "block";


                document.getElementById("intitucional").disabled = true;
                document.getElementById("xela").disabled = true;
                document.getElementById("sanus").disabled = true;
            } else {
                document.getElementById("clientes").disabled = false;
                document.getElementById("intitucionalb").style.display = "none";


                document.getElementById("intitucional").disabled = false;
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
                out1 += '<option></option>';
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
            // alert(inputvalor);
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

                out += '<option value="' + arr2[ii].id_codigo + '" style="color:blue">' +
                    arr2[ii].nombre_sucursal + '</option>';

            }

            document.getElementById("ruta").innerHTML = out;
        }
    </script>
</body>

</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>PHP Blob</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
   
            $(document).ready(function (){
                var table = $('#example').DataTable({
                   dom: 'l<"toolbar">frtip',
                   initComplete: function(){
                      $("div.toolbar").html('<button type="button" id="any_button">Click Me!</button>');           
                   }       
                });  

            
        </script>
        <script language="javascript">
function finestraSecundaria (url){
window.open(url, "nombre de la ventana", "width=1000, height=600")
}
</script>
    </head>

     
     
    



  
     <link href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" re="stylesheet">
     
     
 

<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"  ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"  ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"  ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"  ></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"  ></script>


 <style>
 
 
 </style>

     <script>
      
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
         
         
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
    $stat = $dbConn->prepare("SELECT `control`.`id`,`control`.`kilometraje`,`control`.`imagen`,`control`.`contenido`,`control`.`tipo`,`control`.`fecha`,`control`.`latitud`,`control`.`longitud`,usuarios.names FROM `control`
INNER JOIN usuarios ON control.id_usuario = usuarios.cod_vendedor
");
    $stat->execute();
	$stat1 = $dbConn->prepare("SELECT `control`.`id`,`control`.`kilometraje`,`control`.`imagen`,`control`.`contenido`,`control`.`estado`,`control`.`tipo`,`control`.`fecha`,`control`.`latitud`,`control`.`longitud`,usuarios.names FROM `control`INNER JOIN usuarios ON control.id_usuario = usuarios.cod_vendedor

");
    $stat1->execute();
   /* while($row = $stat->fetch()){
        echo "<li><a href='vervisitas.php?id=".$row['id']."' target='_blank'>".$row['imagen']."</a><br>
        <embed src='data:".$row['tipo'].";base64,".base64_encode($row['contenido'])."'width='200'/></li>";
    }*/
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <div class="container-fluid">
  <h1 class="position-absolute m-2  top-100 start-50 translate-middle"  style="color:white">Tabla de Reporte kilometraje</h1>
   </div>
</nav>
 <div class="container-fluid bg-dark">
        <table id="example" class="table table-dark table-striped" cellspacing="0" width="100%">
            <thead>
                <tr>
                  <th >#</th>
      <th >Imagen</th>
       <th >Kilometraje</th>
      <th >Usuario</th>
       <th >Fecha y Hora</th>
      <th >Tipo Reporte</th>
   
	  
	    <th >Ubicación</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
	while($row1 = $stat1->fetch()){
		 ?>
                <tr>
    
                    <th scope="row"><?php echo $row1['id']?></th>
      <td><?php echo "<a  href=javascript:finestraSecundaria('vervisitas.php?id=".$row1['id']."')> <embed   src='data:".$row1['tipo'].";base64,".base64_encode($row1['contenido'])."'width='100' height='100'/></a></li>" ?></td>
       <td><?php echo $row1['kilometraje']?></td>
      <td><?php echo $row1['names']?></td>
       <td><?php
       $oDate = new DateTime($row1['fecha']);
        $sDate = $oDate->format("d-m-Y H:i:s");
       
       echo $sDate; ?></td>
      <td><?php if ($row1['estado']==1){  ?>
               Inicio
      <?php  } else {  ?>
      Final
       <?php  }   ?>
    
      </td>
      <td><?php echo "<a href=javascript:finestraSecundaria('https://maps.google.com/?q=".$row1['latitud'].",".$row1['longitud']."') >Ver Mapa</a>"?></td>
	 
	    
                </tr>
                <?php  }
    ?>
            </tbody>
        </table>  
 </div>
  
<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>


<?php
include "config.php";
include "utils.php";
$dbConn =  connect($dbdigital);


?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form role="form" class="form-horizontal" method="post" action="guardarcitas.php" >
        <div class="box-body">


            <div class="form-group">
                <label class="col-sm-1 control-label">fecha</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" name="fecha" autocomplete="off" required>
                     <input type="text" class="form-control" name="vendedor" autocomplete="off" required value="7">
                </div>
            </div>
           


            <div class="form-group">
                <label class="col-sm-1 control-label">sector</label>
                <div class="col-sm-8">
                    <select class="id_estado" id="id_estado" name="sector">

                    </select>
                </div>
                <div class="resultado"></div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">rutas</label>
                <div class="col-sm-8">
                    <div class="ruta" id="ruta" name="rutas">


</div>
                </div>
            </div>




            <br>

         

        </div><!-- /.box body -->

        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-11">
                    <input type="submit" class="btn btn-primary btn-submit" name="save" value="Guardar">
                    <a href="?module=portfolio" class="btn btn-default btn-reset">Cancelar</a>
                </div>
            </div>
        </div><!-- /.box footer -->
    </form>
</body>
 <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>


 <script>
//let estado = document.getElementById('id_estado');

$(document).on('ready',function(){
//let inputvalor = document.getElementById("id_estado").value;
    var objXMLHttpRequestt = new XMLHttpRequest();
objXMLHttpRequestt.onreadystatechange = function() {
  if(objXMLHttpRequestt.readyState === 4) {
    if(objXMLHttpRequestt.status === 200) {
         // valor=objXMLHttpRequest.responseText;
     var myArr = JSON.parse(this.responseText);
        myFunction(myArr);

    } else {
          alert('Error Code: ' +  objXMLHttpRequestt.status);
          alert('Error Message: ' + objXMLHttpRequestt.statusText);
    }
  }
}
objXMLHttpRequestt.open('GET', 'http://carpesa.com.gt/registroapi/apisectores.php?codigo_vendedor=7');
objXMLHttpRequestt.send();
});
function myFunction(arr) {
    var out1 = "";
    var i;
    for(i = 0; i < arr.length; i++) {
        out1 += '<option value="' + arr[i].id_sucursal + '">' +
        arr[i].nombre_sector + '</option>';
    }
    document.getElementById("id_estado").innerHTML = out1;
}

</script>
<script>
    
//let estado = document.getElementById('id_estado');


document.getElementById("id_estado").onchange = function(e) {
let inputvalor = document.getElementById("id_estado").value;
    var objXMLHttpRequest = new XMLHttpRequest();
objXMLHttpRequest.onreadystatechange = function() {
  if(objXMLHttpRequest.readyState === 4) {
    if(objXMLHttpRequest.status === 200) {
         // valor=objXMLHttpRequest.responseText;
     var myArr2 = JSON.parse(this.responseText);
        myFunction2(myArr2);

    } else {
          alert('Error Code: ' +  objXMLHttpRequest.status);
          alert('Error Message: ' + objXMLHttpRequest.statusText);
    }
  }
}
objXMLHttpRequest.open('GET', 'http://carpesa.com.gt/registroapi/apirutas.php?codigo_vendedor=7&codigo_sector='+inputvalor);
objXMLHttpRequest.send();
}
function myFunction2(arr2) {
    var out = "";
    var ii;
    for(ii = 0; ii < arr2.length; ii++) {
        out += '<input type="checkbox" value="' + arr2[ii].id_codigo + '" name="rutas[]">' +
        arr2[ii].nombre_sucursal +'<br>';
    }
    document.getElementById("ruta").innerHTML = out;
}

</script>
</html>
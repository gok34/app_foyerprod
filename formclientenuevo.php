<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form role="form" class="form-horizontal" method="POST" action="guardarclientes.php" enctype="multipart/form-data">
        <div class="box-body">


            <div class="form-group">
                <label class="col-sm-1 control-label">nombre local</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="nombrelocal" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">nombre contacto</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="nombrecontacto" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">nit</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="nit" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">direccion</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="direccion" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">telefono</label>
                <div class="col-sm-8">
                    <input type="numero" class="form-control" name="telefono" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">latitud</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="latitud" autocomplete="off" value="45454515">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">longitud</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="longitud" autocomplete="off" value="545454545">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">sector</label>
                <div class="col-sm-8">
                    <select name="sector">

                        <option value="1">amatitlan</option>
                        <option value="2">AV</option>
                        <option value="3">Carretera ES</option>


                    </select>
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-1 control-label">usuario</label>
                <div class="col-sm-8">
                    <select name="id_usuario">

                        <option value="997">Vendedor 1</option>
                        <option value="998">Vendedor 2</option>
                        <option value="999">Vendedor 3</option>


                    </select>
                </div>
            </div>




            <br>

            <div class="form-group">
                <label class="col-sm-1 control-label">Imagen</label>
                <div class="col-sm-8">
                    <input style="height:35px" type="file" name="imagen" autocomplete="off">
                </div>
            </div>

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

</html>
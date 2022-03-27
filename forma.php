<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form role="form" class="form-horizontal" method="POST" action="guardarkm.php" enctype="multipart/form-data">
        <div class="box-body">


            <div class="form-group">
                <label class="col-sm-1 control-label">kilometraje</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="kilometraje" autocomplete="off" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label">Activiadad</label>
                <div class="col-sm-8">
                    <select name="tipovisita">

                        <option value="Cobro">Cobro</option>
                        <option value="Pedido">Pedido</option>
                        <option value="Entrega">Entrega</option>
                        <option value="Visitas">Visitas</option>
                        <option value="Cliente">Cliente</option>

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label">usuario</label>
                <div class="col-sm-8">
                    <select name="id_usuario">

                        <option value="1">juan</option>
                        <option value="2">pedro</option>


                    </select>
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-1 control-label">Título</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="comments" autocomplete="off" required>
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
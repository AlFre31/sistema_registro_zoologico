<!--Aqui va el encabezado-->
<div class="alert alert-success" role="alert" align="center">
  Altas de zoologicos
</div>
<div align="center">
<img src="vistas/img/zoologico.jpg" alt="" srcset="">
</div>
<br><br>
<div>
    <form method="POST" autocomplete="off">
    <!--Nombre del zoológico-->
    <div>
                <div class="form-group">
                    <label for="">Nombre del zoológico:</label>
                    <input type="text" class="form-control" id="" aria-describedby="NombreHelp" name="nombre" maxlength="40" required>
                    <small  class="form-text text-muted">Ingrese el nombre del zoológico</small>
                </div>
            </div>
            <br>
    <!--Ciudad-->
			<div>
                <div class="form-group">
                    <label for="">Ciudad:</label>
					<input type="text" class="form-control" id="" aria-describedby="CiudadHelp" name="ciudad" maxlength="35" required>
                    <small  class="form-text text-muted">Ingrese la ciudad</small>
                </div>
            </div>
            <br>
    <!--País-->
			<div>
                <div class="form-group">
                    <label for="">País:</label>
					<input type="text" class="form-control" id="" aria-describedby="PaisHelp" name="pais" maxlength="40" required>
                    <small  class="form-text text-muted">Ingrese el país</small>
                </div>
            </div>
            <br>
    <!--Tamaño metros cuadrados-->
    <div>
                <div class="form-group">
                    <label for="">Tamaño en metros cuadrados:</label>
                    <input type="number" class="form-control" id="" aria-describedby="MetrosHelp" name="tamanio_metros_cuadrados" maxlength="16" required>
                    <small  class="form-text text-muted">Ingrese el tamaño en metros cuadrados</small>
                </div>
            </div>
            <br>
     <!--Presupuesto Anual-->
     <div>
                <div class="form-group">
                    <label for="">Presupuesto Anual:</label>
                    <input type="number" class="form-control" id="" aria-describedby="PresupuestoHelp" name="presupuesto_anual" maxlength="16" required>
                    <small  class="form-text text-muted">Ingrese el presupuesto anual</small>
                </div>
            </div>
    <br><br>
    <button type="submit" class="btn btn-primary mb-3">Guardar</button>
    </form>
</div>
<div>
<?php include ("listados_zoologicos.php");?>
</div>
<?php
$registro=new Controlador();
$registro->altas_zoologico();
?>
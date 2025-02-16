<!--Aqui va el encabezado-->
<div class="alert alert-success" role="alert" align="center">
  Altas de especie
</div>
<div align="center">
<img src="vistas/img/zoologico.jpg" alt="" srcset="">
</div>
<br><br>
<div>
    <form method="POST" autocomplete="off">
     <!--Nombre vulgar-->
     <div>
                <div class="form-group">
                    <label for="">Epecie Animal:</label>
                    <input type="text" class="form-control" id="" aria-describedby="NomHelp" name="nombre_vulgar" required maxlength="30">
                    <small id="NomAHelp" class="form-text text-muted">Escriba el nombre vulgar</small>
                </div>
            </div>
            <br>
    <!--Nombre científico-->
			<div>
                <div class="form-group">
                    <label for="">Nombre científico:</label>
					<input type="text" class="form-control" id="" aria-describedby="CientificoHelp" name="nombre_cientifico" required>
                    <small id="CientificoHelp" class="form-text text-muted">Escriba el nombre científico</small>
                </div>
            </div>
    <!--Familia-->
			<div>
                <div class="form-group">
                    <label for="">Familia:</label>
                    <input type="text" class="form-control" id="" aria-describedby="FamiliaHelp" name="familia" required maxlength="35">
                    <small id="FamiliaHelp" class="form-text text-muted">Escriba la Familia</small>
                </div>
            </div>
            <br>
			<!--Peligro de extinción-->
			<div>
                <div class="form-group">
                    <label for="">¿Esta en peligro de extinción?:</label>
                    <select name="peligro_extincion" id="" class="form-control" required>
                        <option selected>Elija una respuesta...</option> 
                       <option value="Si">Sí</option>
                       <option value="No">No</option>
                   </select>
                    <small id="ExtincionHelp" class="form-text text-muted">Seleccione la respuesta</small>
                </div>
            </div>
            <br>
            <!--Animal(FK)-->
			<div>
                <div class="form-group">
                    <label for="">Número del animal:</label>
                    <input type="number" class="form-control" id="" aria-describedby="FamiliaHelp" name="fk_animal" required maxlength="35">
                    <small id="FamiliaHelp" class="form-text text-muted">Ingrese el número del animal(FK)</small>
                </div>
            </div>
            <br>
             
    <br><br>
    <button type="submit" class="btn btn-primary mb-3">Calcular</button>
    </form>
</div>
<div>
<?php include ("listados_especies.php");?>
</div>
<?php
$registro=new Controlador();
$registro->altas_especie();
?>
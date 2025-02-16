<!--Aqui va el encabezado-->
<div class="alert alert-success" role="alert" align="center">
  Alta de Animal
</div>
<div align="center">
<img src="vistas/img/zoologico.jpg" alt="" srcset="">
</div>
<br><br>
<div>
    <form method="POST" autocomplete="off">
    <!--Especie-->
    <div>
        <div class="form-group">
                <label for="">Epecie Animal:</label>
                <input type="text" class="form-control" id="" aria-describedby="EspecieHelp" name="especie" required maxlength="20">
                <small id="EspecieAHelp" class="form-text text-muted">Escriba la especie Animal</small>
                </div>
         </div>
    <br>
    <div>
    <!--Sexo-->
        <div class="form-group"></div>
                    <label for="">Sexo:</label>
                    <select name="sexo" id="" class="form-control" required>
                        <option selected>Elija un sexo...</option> 
                       <option value="Macho">Macho</option>
                       <option value="Hembra">Hembra</option>
                   </select>
                    <small id="SexoHelp" class="form-text text-muted">Seleccione el sexo</small>
                </div>
            </div>
            <br>
    <!--Fecha de Nacimiento-->
            <div>
                <div class="form-group">
                    <label for="">Fecha de Nacimiento:</label>
					<input type="date" class="form-control" id="" aria-describedby="FechaNacHelp" name="nacimiento" required>
                    <small id="FechaNacHelp" class="form-text text-muted">Ingrese la Fecha de Nacimiento</small>
                </div>
            </div>
            <br>
        <!--País de origen-->
        <div>
                <div class="form-group">
                    <label for="">País de origen:</label>
                    <input type="text" class="form-control" id="" aria-describedby="PaisHelp" name="pais_origen" maxlength="30" required maxlength="10">
                    <small id="PaisHelp" class="form-text text-muted">Ingrese el País de origen</small>
                </div>
            </div>
            <br>
    <!--Continente-->
            <div>
                <div class="form-group">
                    <label for="">Continente:</label>
                    <select name="continente" id="" class="form-control" required>
                        <option selected>Elija un continente...</option> 
                       <option value="Asia">Asia</option>
                       <option value="Africa">África</option>
                       <option value="Norteamerica">Norteamérica</option>
                       <option value="Sudamerica">Sudamérica</option>
                       <option value="Antartica">Antártica</option>
                       <option value="Europa">Europa</option>
                       <option value="Australia">Australia</option>
                   </select>
                    <small id="ContinenteHelp" class="form-text text-muted">Seleccione el continente</small>
                </div>
            </div>
            <!--Zoologico(FK)-->
			<div>
                <div class="form-group">
                    <label for="">Número del zoologico:</label>
                    <input type="number" class="form-control" id="" aria-describedby="FamiliaHelp" name="fk_zoologico" required>
                    <small id="FamiliaHelp" class="form-text text-muted">Ingrese el número del zoologico(FK)</small>
                </div>
            </div>
    <br><br>
    <button type="submit" class="btn btn-primary mb-3">Registrar</button>
    </form>
</div>
<div>
<?php include ("listados_animales.php");?>
</div>
<?php
$registro=new Controlador();
$registro->altas_animal();
?>
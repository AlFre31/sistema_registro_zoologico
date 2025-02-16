<?php
//Incluimos el archivo conexión
include "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Zoológicos</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	<script src="fontawesome/js/all.js" data-auto-a11y="true" ></script>
</head>
<body>
<div>
    <!--Aquí va ir el Menu-->
    <?php
    include("menu.php");
    ?>
    </div>
<div>
    </div>
    <!--Aquí inicia el Encabezado con imagen-->
    <div>
        <div style="background-color: #48C9B0;">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <img src="img/zoológico.jpg" alt="" width="80%" height="80%">
                    </div>
                    <div class="col-9">
                        <h1 class="display-4">Alta de Zoológicos</h1>
                        <p class="lead">Rellene los campos del formulario con la información solicitada.</p>
                    </div>
                </div>    
            </div>
            </div>
          </div>
    </div>
    <!--Aquí termina el Encabezado con imagen-->
    <div class="container">
            <form method="POST">
				<!--Nombre del zoológico-->
                <div>
                <div class="form-group">
                    <label for="">Nombre del zoológico:</label>
                    <input type="text" class="form-control" id="" aria-describedby="NombreHelp" name="nombre" maxlength="40" required>
                    <small id="NombreHelp" class="form-text text-muted">Ingrese el nombre del zoológico</small>
                </div>
            </div>
			<!--Ciudad-->
			<div>
                <div class="form-group">
                    <label for="">Ciudad:</label>
					<input type="text" class="form-control" id="" aria-describedby="CiudadHelp" name="ciudad" maxlength="35" required>
                    <small id="CiudadHelp" class="form-text text-muted">Ingrese la ciudad</small>
                </div>
            </div>
            <!--País-->
			<div>
                <div class="form-group">
                    <label for="">País:</label>
					<input type="text" class="form-control" id="" aria-describedby="PaisHelp" name="pais" maxlength="40" required>
                    <small id="PaisHelp" class="form-text text-muted">Ingrese el país</small>
                </div>
            </div>
            <!--Tamaño metros cuadrados-->
            <div>
                <div class="form-group">
                    <label for="">Tamaño en metros cuadrados:</label>
                    <input type="number" class="form-control" id="" aria-describedby="MetrosHelp" name="tamanio_metros_cuadrados" maxlength="16" required>
                    <small id="MetrosHelp" class="form-text text-muted">Ingrese el tamaño en metros cuadrados</small>
                </div>
            </div>
            <!--Presupuesto Anual-->
            <div>
                <div class="form-group">
                    <label for="">Presupuesto Anual:</label>
                    <input type="number" class="form-control" id="" aria-describedby="PresupuestoHelp" name="presupuesto_anual" maxlength="16" required>
                    <small id="PresupuestoHelp" class="form-text text-muted">Ingrese el presupuesto anual</small>
                </div>
            </div>
            <button type="submit" class="btn btn-warning btn-lg btn-block">Guardar</button>
            </form>
    </div>
    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        //Incluimos el archivo conexión
        include "conexion.php";
        //Recibimos los datos
        //Variables 
        $Nombre = $_POST['nombre'];
		$Ciudad = $_POST['ciudad'];
		$Pais = $_POST['pais'];
        $Metros_cuadrados = $_POST['metros'];
		$Presupuesto_anual = $_POST['presupuesto'];

		//Query para insertar los datos
		$sentencia = $mysqli->prepare("INSERT INTO zoologico (nombre, ciudad, pais, tamanio_metros_cuadrados, presupuesto_anual) VALUES (?,?,?,?,?)");

		$sentencia->bind_param("sssii", $Nombre, $Ciudad, $Pais, $Metros_cuadrados, $Presupuesto_anual);
        //Ejecutamos la consulta y revisamos
        if($sentencia->execute()){
            echo '<script>
            alert("Datos del zoológico guardados correctamente");
            window.location="listado_zoologicos.php";
            </script>';
        }
        else{
            echo '<script>
            alert("Datos no guardados");
            window.location="principal.php";
            </script>';
        }
    }
    ?>
</body>
</html>
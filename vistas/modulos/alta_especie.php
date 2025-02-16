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
                        <h1 class="display-4">Alta de Especie Animal</h1>
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
            <!--Nombre vulgar-->
            <div>
                <div class="form-group">
                    <label for="">Epecie Animal:</label>
                    <input type="text" class="form-control" id="" aria-describedby="NomHelp" name="nom_vulgar" required maxlength="30">
                    <small id="NomAHelp" class="form-text text-muted">Escriba el nombre vulgar</small>
                </div>
            </div>
			<!--Nombre científico-->
			<div>
                <div class="form-group">
                    <label for="">Nombre científico:</label>
					<input type="text" class="form-control" id="" aria-describedby="CientificoHelp" name="nom_cientifico" required>
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
			<!--Peligro de extinción-->
			<div>
                <div class="form-group">
                    <label for="">¿Esta en peligro de extinción?:</label>
                    <select name="extincion" id="" class="form-control" required>
                        <option selected>Elija una respuesta...</option> 
                       <option value="Si">Sí</option>
                       <option value="No">No</option>
                   </select>
                    <small id="ExtincionHelp" class="form-text text-muted">Seleccione la respuesta</small>
                </div>
            </div>
            <!--Número del Animal-->
            <div class="form-group">
                    <label for="">Número Animal:</label>
                   <select name="num_animal" id="" class="form-control" required> 
                       <option selected>Elija un número de id animal...</option>
                       <?php
                       //Realizamos la consulta
                       $resultado=$mysqli->query("SELECT*FROM animal ORDER BY pk_animal");
                       $datos=$resultado->fetch_all(MYSQLI_ASSOC);
                       foreach($datos as $valores):
                       echo '<option value="'.$valores["pk_animal"].'">'.$valores["especie"].'</option>';
                        endforeach;
                       ?>
                   </select>
                    <small id="ZoologicoHelp" class="form-text text-muted">Seleccione el Id animal(PK)</small>
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
        $NombreVulgar = $_POST['nom_vulgar'];
		$NombreCientifico = $_POST['nom_cientifico'];
		$Familia = $_POST['familia'];
        $PeligroExtincion = $_POST['extincion'];
		$InfoAnimal = $_POST['num_animal'];

		//Query para insertar los datos
		$sentencia = $mysqli->prepare("INSERT INTO especie (nombre_vulgar, nombre_cientifico, familia, peligro_extincion, fk_animal) VALUES (?,?,?,?,?)");

		$sentencia->bind_param("ssssi", $NombreVulgar, $NombreCientifico, $Familia, $PeligroExtincion, $InfoAnimal);
        //Ejecutamos la consulta y revisamos
        if($sentencia->execute()){
            echo '<script>
            alert("Datos de la especie guardados correctamente");
            window.location="listado_especies.php";
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
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
                        <h1 class="display-4">Alta de Animal</h1>
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
            <!--Especie-->
            <div>
                <div class="form-group">
                    <label for="">Epecie Animal:</label>
                    <input type="text" class="form-control" id="" aria-describedby="EspecieHelp" name="especie" required maxlength="20">
                    <small id="EspecieAHelp" class="form-text text-muted">Escriba la especie Animal</small>
                </div>
            </div>
			<!--Sexo-->
			<div>
                <div class="form-group">
                    <label for="">Sexo:</label>
                    <select name="sexo" id="" class="form-control" required>
                        <option selected>Elija un sexo...</option> 
                       <option value="Macho">Macho</option>
                       <option value="Hembra">Hembra</option>
                   </select>
                    <small id="SexoHelp" class="form-text text-muted">Seleccione el sexo</small>
                </div>
            </div>
			<!--Fecha de Nacimiento-->
			<div>
                <div class="form-group">
                    <label for="">Fecha de Nacimiento:</label>
					<input type="date" class="form-control" id="" aria-describedby="FechaNacHelp" name="fecha_nac" required>
                    <small id="FechaNacHelp" class="form-text text-muted">Ingrese la Fecha de Nacimiento</small>
                </div>
            </div>
            <!--País de origen-->
			<div>
                <div class="form-group">
                    <label for="">País de origen:</label>
                    <input type="text" class="form-control" id="" aria-describedby="PaisHelp" name="pais" maxlength="30" required maxlength="10">
                    <small id="PaisHelp" class="form-text text-muted">Ingrese el País de origen</small>
                </div>
            </div>
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
                    <small id="SexoHelp" class="form-text text-muted">Seleccione el continente</small>
                </div>
            </div>
            <!--Zoológico-->
            <div class="form-group">
                    <label for="">Zoológico:</label>
                   <select name="zoologico" id="" class="form-control" required> 
                       <option selected>Elija un Zoológico...</option>
                       <?php
                       //Realizamos la consulta
                       $resultado=$mysqli->query("SELECT*FROM zoologico ORDER BY pk_zoologico");
                       $datos=$resultado->fetch_all(MYSQLI_ASSOC);
                       foreach($datos as $valores):
                       echo '<option value="'.$valores["pk_zoologico"].'">'.$valores["nombre"].'</option>';
                        endforeach;
                       ?>
                   </select>
                    <small id="ZoologicoHelp" class="form-text text-muted">Seleccione un zoológico</small>
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
        $Especie = $_POST['especie'];
		$Sexo = $_POST['sexo'];
		$Nacimiento = $_POST['fecha_nac'];
        $PaisOrigen = $_POST['pais'];
		$Continente = $_POST['continente'];
        $Zoologico = $_POST['zoologico'];

		//Query para insertar los datos
		$sentencia = $mysqli->prepare("INSERT INTO animal (especie, sexo, nacimiento, pais_origen, continente, fk_zoologico) VALUES (?,?,?,?,?,?)");

		$sentencia->bind_param("sssssi", $Especie, $Sexo, $Nacimiento, $PaisOrigen, $Continente, $Zoologico);
        //Ejecutamos la consulta y revisamos
        if($sentencia->execute()){
            echo '<script>
            alert("Datos del animal guardados correctamente");
            window.location="listado_animales.php";
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
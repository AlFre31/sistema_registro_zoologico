<?php
class Controlador{
#Llamada a la plantilla
#------------------------
static public function pagina(){
    include "vistas/plantilla.php";
}
#Control de enlaces del enlaces
#----------------------------------
static public function enlacesPaginasControlador(){
    if(isset($_GET['accion']))//Pregunto si se recibio un dato de la variable accion
    {
        $enlaces=$_GET['accion'];
    }
    else{
        $enlaces="principal";
    }
    $respuesta=Paginas::enlacesPaginasModelo($enlaces);
    include $respuesta;
}
#Altas de Animales
#-------------------------------------
static public function altas_animal(){
if(isset($_POST['especie'])){
    $tabla='animal';
    //Obtenemos al área
    $datos=($_POST['especie']);
    //Creamos un arreglo para los datos recibidos
    $datosControlador=array("especie"=>$_POST['especie'],"sexo"=>$_POST['sexo'],"nacimiento"=>$_POST['nacimiento'],"pais_origen"=>$_POST['pais_origen'],"continente"=>$_POST['continente'],"fk_zoologico"=>$_POST['fk_zoologico'],"datos"=>$datos);
    $respuesta=Modelo::registrarAnimal($datosControlador,$tabla);
    if($respuesta=="ok"){
        ?>
        <!--Aquí va el SweetAlert-->
        <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Datos Guardados Correctamente',
                confirmButtonText: 'OK',
                allowOutsideClick: false
                }).then((result)=>{
                    if(result.isConfirmed){
                        window.location.href="index.php?accion=altas_animal";
                    }
                })
            </script>
        <?php
        echo '<script>window.location="index.php?accion=altas_animal';
    }
    else{
        ?>
        <script>
            Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Datos No Guardados!',
            })
        </script>
        <?php
        echo '<script>window.location="index.php?accion=altas_animal';
    }
}
}
#Altas de zoologicos
#-------------------------------------
static public function altas_zoologico(){
    if(isset($_POST['nombre'])){
        $tabla='zoologico';
        //Obtenemos al área
        
        //Creamos un arreglo para los datos recibidos
        $datosControlador=array("nombre"=>$_POST['nombre'],"ciudad"=>$_POST['ciudad'],"pais"=>$_POST['pais'],"tamanio_metros_cuadrados"=>$_POST['tamanio_metros_cuadrados'],"presupuesto_anual"=>$_POST['presupuesto_anual']);
        $respuesta=Modelo::registrarZoologico($datosControlador,$tabla);
        if($respuesta=="ok"){
            ?>
            <!--Aquí va el SweetAlert-->
            <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Datos Guardados Correctamente',
                confirmButtonText: 'OK',
                allowOutsideClick: false
                }).then((result)=>{
                    if(result.isConfirmed){
                        window.location.href="index.php?accion=altas_zoologico";
                    }
                })
            </script>
            <?php
            echo '<script>window.location="index.php?accion=altas_zoologico';
        }
        else{
            ?>
            <script>
                Swal.fire({
                icon: 'error',
                title: 'Error...',
                text: 'Datos No Guardados!',
                })
            </script>
            <?php
            echo '<script>window.location="index.php?accion=altas_zoologico';
        }
    }
    }
#Altas de Especies
#-------------------------------------
static public function altas_especie(){
    if(isset($_POST['nombre_vulgar'])){
        $tabla='especie';
        //Obtenemos al área
        $datos=($_POST['nombre_vulgar']);
        //Creamos un arreglo para los datos recibidos
        $datosControlador=array("nombre_vulgar"=>$_POST['nombre_vulgar'],"nombre_cientifico"=>$_POST['nombre_cientifico'],"familia"=>$_POST['familia'],"nombre_vulgar"=>$_POST['peligro_extincion'],"fk_animal"=>$_POST['fk_animal'],"peligro_extincion"=>$datos);
        $respuesta=Modelo::registrarEspecies($datosControlador,$tabla);
        if($respuesta=="ok"){
            ?>
            <!--Aquí va el SweetAlert-->
            <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Datos Guardados Correctamente',
                confirmButtonText: 'OK',
                allowOutsideClick: false
                }).then((result)=>{
                    if(result.isConfirmed){
                        window.location.href="index.php?accion=altas_especie";
                    }
                })
            </script>
            <?php
            echo '<script>window.location="index.php?accion=altas_especie';
        }
        else{
            ?>
            <script>
                Swal.fire({
                icon: 'error',
                title: 'Error...',
                text: 'Datos No Guardados!',
                })
            </script>
            <?php
            echo '<script>window.location="index.php?accion=altas_especie';
        }
    }
    }
#Área del Hexágono
#-------------------------------------
static public function area_hexagono(){
    if(isset($_POST['lado'])){
        $tabla='hexagono';
        //Obtenemos al área
        $area=($_POST['lado']*$_POST['apotema'])/2;
        //Creamos un arreglo para los datos recibidos
        $datosControlador=array("lado"=>$_POST['lado'],"apotema"=>$_POST['apotema'],"area"=>$area);
        $respuesta=Modelo::registrarAreaHexagono($datosControlador,$tabla);
        if($respuesta=="ok"){
            ?>
            <!--Aquí va el SweetAlert-->
            <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Datos Guardados Correctamente',
                showConfirmButton: false,
                timer: 1500
                })
            </script>
            <?php
            echo '<script>window.location="index.php?accion=area_hexagono';
        }
        else{
            ?>
            <script>
                Swal.fire({
                icon: 'error',
                title: 'Error...',
                text: 'Datos No Guardados!',
                })
            </script>
            <?php
            echo '<script>window.location="index.php?accion=area_hexagono';
        }
    }
    }
#Método que muestra la información de los zoologicos
#----------------------------------------
static public function vistaZoologicosControlador(){
    $respuesta=Modelo::vistaZoologicosModelo("zoologico");
    foreach($respuesta as $renglon=>$valores){
        ?>
        <tr>
            <td align="center"><?php echo $valores['pk_zoologico'];?></td>
            <td align="center"><?php echo $valores['nombre'];?></td>
            <td align="center"><?php echo $valores['ciudad'];?></td>
            <td align="center"><?php echo $valores['pais'];?></td>
            <td align="center"><?php echo $valores['tamanio_metros_cuadrados'];?></td>
            <td align="center"><?php echo $valores['presupuesto_anual'];?></td>
            <td align="center">
                <a href="index.php?accion=editar_zoologico&pk=<?php echo $valores['pk_zoologico'];?>">
                    <button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i>Editar</button>
                </a>
            </td>
            <td align="center">
            <a href="index.php?accion=eliminar_zoologico&pk=<?php echo $valores['pk_zoologico'];?>">
                    <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i>Eliminar</button>
                </a>
            </td>
        </tr>
        <?php
    }
}
#Método que muestra la información de las especies
#----------------------------------------
static public function vistaEspeciesControlador(){
    $respuesta=Modelo::vistaEspeciesModelo("especie");
    foreach($respuesta as $renglon=>$valores){
        ?>
        <tr>
            <td align="center"><?php echo $valores['pk_especie'];?></td>
            <td align="center"><?php echo $valores['nombre_vulgar'];?></td>
            <td align="center"><?php echo $valores['nombre_cientifico'];?></td>
            <td align="center"><?php echo $valores['familia'];?></td>
            <td align="center"><?php echo $valores['peligro_extincion'];?></td>
            <td align="center"><?php echo $valores['fk_animal'];?></td>
            <td align="center">
                <a href="index.php?accion=editar_especie&pk=<?php echo $valores['pk_especie'];?>">
                    <button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i>Editar</button>
                </a>
            </td>
            <td align="center">
            <a href="index.php?accion=eliminar_especie&pk=<?php echo $valores['pk_especie'];?>">
                    <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i>Eliminar</button>
                </a>
            </td>
        </tr>
        <?php
    }
}
#Método que muestra la información de los animales
#----------------------------------------
static public function vistaAnimalesControlador(){
    $respuesta=Modelo::vistaAnimalesModelo("animal");
    foreach($respuesta as $renglon=>$valores){
        ?>
        <tr>
            <td align="center"><?php echo $valores['pk_animal'];?></td>
            <td align="center"><?php echo $valores['especie'];?></td>
            <td align="center"><?php echo $valores['sexo'];?></td>
            <td align="center"><?php echo $valores['nacimiento'];?></td>
            <td align="center"><?php echo $valores['pais_origen'];?></td>
            <td align="center"><?php echo $valores['continente'];?></td>
            <td align="center"><?php echo $valores['fk_zoologico'];?></td>
            <td align="center">
                <a href="index.php?accion=editar_animal&pk=<?php echo $valores['pk_animal'];?>">
                    <button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i>Editar</button>
                </a>
            </td>
            <td align="center">
            <a href="index.php?accion=eliminar_animal&pk=<?php echo $valores['pk_animal'];?>">
                    <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i>Eliminar</button>
                </a>
            </td>
        </tr>
        <?php
    }
}
#Editar Zoologico
#---------------------------
static public function modificar_zoologico(){
    $datos=$_GET['pk'];
    $respuesta=Modelo::modificarZoologicoControlador($datos,"zoologico");//Nombre de la tabla de la base de datos
    ?>
    <!--Nombre del zoológico-->
    <div>
                <div class="form-group">
                    <label for="">Nombre del zoológico:</label>
                    <input type="text" class="form-control" id="" aria-describedby="NombreHelp" name="nombre" maxlength="40" required value="<?php echo $respuesta['nombre']?>">
                    <small  class="form-text text-muted">Ingrese el nombre del zoológico</small>
                </div>
            </div>
            <br>
    <!--Ciudad-->
			<div>
                <div class="form-group">
                    <label for="">Ciudad:</label>
					<input type="text" class="form-control" id="" aria-describedby="CiudadHelp" name="ciudad" maxlength="35" required value="<?php echo $respuesta['ciudad']?>">
                    <small  class="form-text text-muted">Ingrese la ciudad</small>
                </div>
            </div>
            <br>
    <!--País-->
			<div>
                <div class="form-group">
                    <label for="">País:</label>
					<input type="text" class="form-control" id="" aria-describedby="PaisHelp" name="pais" maxlength="40" required value="<?php echo $respuesta['pais']?>">
                    <small  class="form-text text-muted">Ingrese el país</small>
                </div>
            </div>
            <br>
    <!--Tamaño metros cuadrados-->
    <div>
                <div class="form-group">
                    <label for="">Tamaño en metros cuadrados:</label>
                    <input type="number" class="form-control" id="" aria-describedby="MetrosHelp" name="tamanio_metros_cuadrados" maxlength="16" required value="<?php echo $respuesta['tamanio_metros_cuadrados']?>">
                    <small  class="form-text text-muted">Ingrese el tamaño en metros cuadrados</small>
                </div>
            </div>
            <br>
     <!--Presupuesto Anual-->
     <div>
                <div class="form-group">
                    <label for="">Presupuesto Anual:</label>
                    <input type="number" class="form-control" id="" aria-describedby="PresupuestoHelp" name="presupuesto_anual" maxlength="16" required value="<?php echo $respuesta['presupuesto_anual']?>">
                    <small  class="form-text text-muted">Ingrese el presupuesto anual</small>
                </div>
            </div>
            

            
            <input type="hidden" name="pk" value="<?php echo $respuesta['pk_zoologico']?>">
            <br>
    <button type="submit" class="btn btn-primary mb-3">Guardar cambios</button>
    <?php
}
#Método para actualizar los zoologicos
#-----------------------------------
static public function actualizarZoologicoControlador(){
    if(isset($_POST['nombre'])){
        //Aquí proceso de calculo
        $datosControlador=array("indice_pk"=>$_POST['pk'],"indice_nombre"=>$_POST['nombre'],"indice_ciudad"=>$_POST['ciudad'],"indice_pais"=>$_POST['pais'],"indice_metros"=>$_POST['tamanio_metros_cuadrados'],"indice_presupuesto"=>$_POST['presupuesto_anual']);
        $respuesta=Modelo::actualizarZoologicoModelo($datosControlador,"zoologico");
        if($respuesta=="ok"){
            ?>
            <!--Aquí va el SweetAlert-->
            <script>
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Datos Actualizados Correctamente',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                    }).then((result)=>{
                        if(result.isConfirmed){
                            window.location.href="index.php?accion=listados_zoologicos";
                        }
                    })
                </script>
            <?php
            echo '<script>window.location="index.php?accion=listados_zoologicos';
        }
        else{
            ?>
            <script>
                Swal.fire({
                icon: 'error',
                title: 'Error...',
                text: 'Datos No Modificados!',
                })
            </script>
            <?php
            echo '<script>window.location="index.php?accion=listados_zoologicos';
        }
    }
}
#Editar Animal
#---------------------------
static public function modificar_animal(){
    $datos=$_GET['pk'];
    $respuesta=Modelo::modificarAnimalControlador($datos,"animal");//Nombre de la tabla de la base de datos
    ?>
    <!--Especie-->
    <div>
        <div class="form-group">
                <label for="">Epecie Animal:</label>
                <input type="text" class="form-control" id="" aria-describedby="EspecieHelp" name="especie" required maxlength="20" value="<?php echo $respuesta['especie']?>">
                <small id="EspecieAHelp" class="form-text text-muted">Escriba la especie Animal</small>
                </div>
         </div>
    <br>
    <div>
    <!--Sexo-->
        <div class="form-group"></div>
                    <label for="">Sexo:</label>
                    <select name="sexo" id="" class="form-control" required value="<?php echo $respuesta['sexo']?>">
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
					<input type="date" class="form-control" id="" aria-describedby="FechaNacHelp" name="nacimiento" required value="<?php echo $respuesta['nacimiento']?>">
                    <small id="FechaNacHelp" class="form-text text-muted">Ingrese la Fecha de Nacimiento</small>
                </div>
            </div>
            <br>
        <!--País de origen-->
        <div>
                <div class="form-group">
                    <label for="">País de origen:</label>
                    <input type="text" class="form-control" id="" aria-describedby="PaisHelp" name="pais_origen" maxlength="30" required maxlength="10" value="<?php echo $respuesta['pais_origen']?>">
                    <small id="PaisHelp" class="form-text text-muted">Ingrese el País de origen</small>
                </div>
            </div>
            <br>
    <!--Continente-->
            <div>
                <div class="form-group">
                    <label for="">Continente:</label>
                    <select name="continente" id="" class="form-control" required value="<?php echo $respuesta['continente']?>">
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
            

            
            <input type="hidden" name="pk" value="<?php echo $respuesta['pk_animal']?>">
            <br>
    <button type="submit" class="btn btn-primary mb-3">Guardar cambios</button>
    <?php
}
#Método para actualizar la información de los animales
#-----------------------------------
static public function actualizarAnimalControlador(){
    if(isset($_POST['especie'])){
        //Aquí proceso de calculo
        $datosControlador=array("indice_pk"=>$_POST['pk'],"indice_especie"=>$_POST['especie'],"indice_sexo"=>$_POST['sexo'],"indice_nacimiento"=>$_POST['nacimiento'],"indice_pais"=>$_POST['pais_origen'],"indice_continente"=>$_POST['continente']);
        $respuesta=Modelo::actualizarAnimalModelo($datosControlador,"animal");
        if($respuesta=="ok"){
            ?>
            <!--Aquí va el SweetAlert-->
            <script>
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Datos Actualizados Correctamente',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                    }).then((result)=>{
                        if(result.isConfirmed){
                            window.location.href="index.php?accion=listados_animales";
                        }
                    })
                </script>
            <?php
            echo '<script>window.location="index.php?accion=listados_animales';
        }
        else{
            ?>
            <script>
                Swal.fire({
                icon: 'error',
                title: 'Error...',
                text: 'Datos No Modificados!',
                })
            </script>
            <?php
            echo '<script>window.location="index.php?accion=listados_animales';
        }
    }
}
#Editar Especie
#---------------------------
static public function modificar_especie(){
    $datos=$_GET['pk'];
    $respuesta=Modelo::modificarEspecieControlador($datos,"especie");//Nombre de la tabla de la base de datos
    ?>
    <!--Nombre vulgar-->
    <div>
                <div class="form-group">
                    <label for="">Epecie Animal:</label>
                    <input type="text" class="form-control" id="" aria-describedby="NomHelp" name="nombre_vulgar" required maxlength="30" value="<?php echo $respuesta['nombre_vulgar']?>">
                    <small id="NomAHelp" class="form-text text-muted">Escriba el nombre vulgar</small>
                </div>
            </div>
            <br>
    <!--Nombre científico-->
			<div>
                <div class="form-group">
                    <label for="">Nombre científico:</label>
					<input type="text" class="form-control" id="" aria-describedby="CientificoHelp" name="nombre_cientifico" required value="<?php echo $respuesta['nombre_cientifico']?>">
                    <small id="CientificoHelp" class="form-text text-muted">Escriba el nombre científico</small>
                </div>
            </div>
    <!--Familia-->
			<div>
                <div class="form-group">
                    <label for="">Familia:</label>
                    <input type="text" class="form-control" id="" aria-describedby="FamiliaHelp" name="familia" required maxlength="35" value="<?php echo $respuesta['familia']?>">
                    <small id="FamiliaHelp" class="form-text text-muted">Escriba la Familia</small>
                </div>
            </div>
            <br>
			<!--Peligro de extinción-->
			<div>
                <div class="form-group">
                    <label for="">¿Esta en peligro de extinción?:</label>
                    <select name="peligro_extincion" id="" class="form-control" required value="<?php echo $respuesta['peligro_extincion']?>">
                        <option selected>Elija una respuesta...</option> 
                       <option value="Si">Sí</option>
                       <option value="No">No</option>
                   </select>
                    <small id="ExtincionHelp" class="form-text text-muted">Seleccione la respuesta</small>
                </div>
            </div>
            

            
            <input type="hidden" name="pk" value="<?php echo $respuesta['pk_especie']?>">
            <br>
    <button type="submit" class="btn btn-primary mb-3">Guardar cambios</button>
    <?php
}
#Método para actualizar las especies
#-----------------------------------
static public function actualizarEspecieControlador(){
    if(isset($_POST['nombre_vulgar'])){
        //Aquí proceso de calculo
        $datosControlador=array("indice_pk"=>$_POST['pk'],"indice_vulgar"=>$_POST['nombre_vulgar'],"indice_cientifico"=>$_POST['nombre_cientifico'],"indice_familia"=>$_POST['familia'],"indice_extincion"=>$_POST['peligro_extincion']);
        $respuesta=Modelo::actualizarEspecieModelo($datosControlador,"especie");
        if($respuesta=="ok"){
            ?>
            <!--Aquí va el SweetAlert-->
            <script>
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Datos Actualizados Correctamente',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                    }).then((result)=>{
                        if(result.isConfirmed){
                            window.location.href="index.php?accion=listados_especies";
                        }
                    })
                </script>
            <?php
            echo '<script>window.location="index.php?accion=listados_especies';
        }
        else{
            ?>
            <script>
                Swal.fire({
                icon: 'error',
                title: 'Error...',
                text: 'Datos No Modificados!',
                })
            </script>
            <?php
            echo '<script>window.location="index.php?accion=listados_especies';
        }
    }
}
#Eliminar Zoologico
#----------------------------
static public function eliminarZoologico(){
    $datos=$_GET['pk'];
    $tabla="zoologico";
    $respuesta = Modelo::eliminarZoologicoControlador($datos,$tabla);

    if($respuesta == "ok"){
        ?>
            <!-- aqui va el sweetalert -->
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Datos Eliminados Correctamente',
                    text: 'Datos Eliminados con Exito!',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.replace("index.php?accion=listados_zoologicos");
                }
                });
            </script>
        <?php
    }else{
        ?>
            <!-- aqui va el sweetalert -->
            <script>
                Swal.fire({
                    icon: 'Error al Eliminar el zoologico',
                    title: 'Algo Salió Mal',
                    text: 'Vuelve a intentar'
                });
            </script>
        <?php
    }
}
#Eliminar Animal
#----------------------------
static public function eliminarAnimal(){
    $datos=$_GET['pk'];
    $tabla="animal";
    $respuesta=Modelo::eliminarAnimalControlador($datos,$tabla);

    if($respuesta=="ok"){
        ?>
            <!-- aqui va el sweetalert -->
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Datos Eliminados Correctamente',
                    text: 'Datos Eliminados con Exito!',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.replace("index.php?accion=listados_animales");
                }
                });
            </script>
        <?php
    }else{
        ?>
            <!-- aqui va el sweetalert -->
            <script>
                Swal.fire({
                    icon: 'Error al Eliminar el animal',
                    title: 'Algo Salió Mal',
                    text: 'Vuelve a intentar'
                });
            </script>
        <?php
    }
}
#Eliminar Especie
#----------------------------
static public function eliminarEspecie(){
    $datos=$_GET['pk'];
    $tabla="especie";
    $respuesta = Modelo::eliminarEspecieControlador($datos,$tabla);

    if($respuesta=="ok"){
        ?>
            <!-- aqui va el sweetalert -->
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Datos Eliminados Correctamente',
                    text: 'Datos Eliminados con Exito!',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.replace("index.php?accion=listados_especies");
                }
                });
            </script>
        <?php
    }else{
        ?>
            <!-- aqui va el sweetalert -->
            <script>
                Swal.fire({
                    icon: 'Error al Eliminar la Especie',
                    title: 'Algo Salió Mal',
                    text: 'Vuelve a intentar'
                });
            </script>
        <?php
    }
}
}
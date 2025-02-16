<?php
require_once "conexion.php";
class Modelo extends Conexion{
#Metodo que guarda datos de Animales
#---------------------------------------
static public function registrarAnimal($datosModelo,$tabla){
$consulta=Conexion::conectar()->prepare("INSERT INTO $tabla (especie,sexo,nacimiento,pais_origen,continente,fk_zoologico)VALUES
(:especie,:sexo,:nacimiento,:pais_origen,:continente,:fk_zoologico)");
$consulta->bindParam(":especie",$datosModelo["especie"],PDO::PARAM_STR);
$consulta->bindParam(":sexo",$datosModelo["sexo"],PDO::PARAM_STR);
$consulta->bindParam(":nacimiento",$datosModelo["nacimiento"],PDO::PARAM_STR);
$consulta->bindParam(":pais_origen",$datosModelo["pais_origen"],PDO::PARAM_STR);
$consulta->bindParam(":continente",$datosModelo["continente"],PDO::PARAM_STR);
$consulta->bindParam(":fk_zoologico",$datosModelo["fk_zoologico"],PDO::PARAM_STR);
if($consulta->execute()){
    return 'ok';
}
else{
    return 'error';
}
$consulta->close();
}
#Metodo que guarda datos de Zoologicos
#---------------------------------------
static public function registrarZoologico($datosModelo,$tabla){
    $consulta=Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,ciudad,pais,tamanio_metros_cuadrados,presupuesto_anual)VALUES
    (:nombre,:ciudad,:pais,:tamanio_metros_cuadrados,:presupuesto_anual)");
    $consulta->bindParam(":nombre",$datosModelo["nombre"],PDO::PARAM_STR);
    $consulta->bindParam(":ciudad",$datosModelo["ciudad"],PDO::PARAM_STR);
    $consulta->bindParam(":pais",$datosModelo["pais"],PDO::PARAM_STR);
    $consulta->bindParam(":tamanio_metros_cuadrados",$datosModelo["tamanio_metros_cuadrados"],PDO::PARAM_STR);
    $consulta->bindParam(":presupuesto_anual",$datosModelo["presupuesto_anual"],PDO::PARAM_STR);
    if($consulta->execute()){
        return 'ok';
    }
    else{
        return 'error';
    }
    $consulta->close();
    }
#Metodo que guarda datos de Especies animales
#---------------------------------------
static public function registrarEspecies($datosModelo,$tabla){
    $consulta=Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_vulgar,nombre_cientifico,familia,peligro_extincion,fk_animal)VALUES
    (:nombre_vulgar,:nombre_cientifico,:familia,:peligro_extincion,:fk_animal)");
    $consulta->bindParam(":nombre_vulgar",$datosModelo["nombre_vulgar"],PDO::PARAM_STR);
    $consulta->bindParam(":nombre_cientifico",$datosModelo["nombre_cientifico"],PDO::PARAM_STR);
    $consulta->bindParam(":familia",$datosModelo["familia"],PDO::PARAM_STR);
    $consulta->bindParam(":peligro_extincion",$datosModelo["peligro_extincion"],PDO::PARAM_STR);
    $consulta->bindParam(":fk_animal",$datosModelo["fk_animal"],PDO::PARAM_STR);
    if($consulta->execute()){
        return 'ok';
    }
    else{
        return 'error';
    }
    $consulta->close();
    }    
#Metodo que guarda el Área del Hexágono
#---------------------------------------
static public function registrarAreaHexagono($datosModelo,$tabla){
    date_default_timezone_set("America/Mazatlan");
    $hora=date("H:i:s");
    $fecha=date("Y-m-d");
    $consulta=Conexion::conectar()->prepare("INSERT INTO $tabla (lado,apotema,area,hora,fecha)VALUES
    (:lado,:apotema,:area,:hora,:fecha)");
    $consulta->bindParam(":lado",$datosModelo["lado"],PDO::PARAM_STR);
    $consulta->bindParam(":apotema",$datosModelo["apotema"],PDO::PARAM_STR);
    $consulta->bindParam(":area",$datosModelo["area"],PDO::PARAM_STR);
    $consulta->bindParam(":hora",$hora,PDO::PARAM_STR);
    $consulta->bindParam(":fecha",$fecha,PDO::PARAM_STR);
    if($consulta->execute()){
        return 'ok';
    }
    else{
        return 'error';
    }
    $consulta->close();
    }
#Vista de los zoologicos
#-------------------------------
static public function vistaZoologicosModelo($tabla){
    //Preparamos la consulta
    $consulta=Conexion::conectar()->prepare("SELECT pk_zoologico,nombre,ciudad,pais,tamanio_metros_cuadrados,presupuesto_anual FROM $tabla ORDER BY pk_zoologico");
    //Ejecutamos la consulta
    $consulta->execute();
    //Retornamos todos los valores
    return $consulta->fetchAll();
    //Cerramos la consulta
    $consulta->close();
}
#Vista de las especies
#-------------------------------
static public function vistaEspeciesModelo($tabla){
    //Preparamos la consulta
    $consulta=Conexion::conectar()->prepare("SELECT pk_especie,nombre_vulgar,nombre_cientifico,familia,peligro_extincion,fk_animal FROM $tabla ORDER BY pk_especie");
    //Ejecutamos la consulta
    $consulta->execute();
    //Retornamos todos los valores
    return $consulta->fetchAll();
    //Cerramos la consulta
    $consulta->close();
}
#Vista de los animales
#-------------------------------
static public function vistaAnimalesModelo($tabla){
    //Preparamos la consulta
    $consulta=Conexion::conectar()->prepare("SELECT pk_animal,especie,sexo,nacimiento,pais_origen,continente,fk_zoologico FROM $tabla ORDER BY pk_animal");
    //Ejecutamos la consulta
    $consulta->execute();
    //Retornamos todos los valores
    return $consulta->fetchAll();
    //Cerramos la consulta
    $consulta->close();
}
#Metodo para editar(modificar) los datos de los zoologicos
#-----------------------------------
static public function modificarZoologicoControlador($datos,$tabla){
    $consulta=Conexion::conectar()->prepare("SELECT pk_zoologico,nombre,ciudad,pais,tamanio_metros_cuadrados,presupuesto_anual FROM $tabla WHERE pk_zoologico=:pk");
    //Se obtiene los parametros y los pasamos a variables para la consulyta
    $consulta->bindParam(":pk",$datos,PDO::PARAM_STR);
    //Ejecutamos la consulta
    $consulta->execute();
    //Retornamos los valores obtenidos
    return $consulta->fetch();
    //Cerramos la consulta
    $consulta->close();
}
#Actualizar datos de los zoologicos
#------------------------------------
static public function actualizarZoologicoModelo($datosModelo,$tabla){
    $consulta=Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,ciudad=:ciudad,pais=:pais,tamanio_metros_cuadrados=:tamanio_metros_cuadrados,presupuesto_anual=:presupuesto_anual WHERE pk_zoologico=:pk");

    $consulta->bindParam(":pk",$datosModelo['indice_pk'],PDO::PARAM_STR);
    $consulta->bindParam(":nombre",$datosModelo['indice_nombre'],PDO::PARAM_STR);
    $consulta->bindParam(":ciudad",$datosModelo['indice_ciudad'],PDO::PARAM_STR);
    $consulta->bindParam(":pais",$datosModelo['indice_pais'],PDO::PARAM_STR);
    $consulta->bindParam(":tamanio_metros_cuadrados",$datosModelo['indice_metros'],PDO::PARAM_STR);
    $consulta->bindParam(":presupuesto_anual",$datosModelo['indice_presupuesto'],PDO::PARAM_STR);
   
    if($consulta->execute()){
        return "ok";
    }else{
        return "error";
    }
    $consulta->close();
}
#Metodo para editar(modificar) los datos de los animales
#-----------------------------------
static public function modificarAnimalControlador($datos,$tabla){
    $consulta=Conexion::conectar()->prepare("SELECT pk_animal,especie,sexo,nacimiento,pais_origen,continente FROM $tabla WHERE pk_animal=:pk");
    //Se obtiene los parametros y los pasamos a variables para la consulyta
    $consulta->bindParam(":pk",$datos,PDO::PARAM_STR);
    //Ejecutamos la consulta
    $consulta->execute();
    //Retornamos los valores obtenidos
    return $consulta->fetch();
    //Cerramos la consulta
    $consulta->close();
}
#Actualizar datos de los animales
#------------------------------------
static public function actualizarAnimalModelo($datosModelo,$tabla){
    $consulta=Conexion::conectar()->prepare("UPDATE $tabla SET especie=:especie,sexo=:sexo,nacimiento=:nacimiento,pais_origen=:pais_origen,continente=:continente WHERE pk_animal=:pk");

    $consulta->bindParam(":pk",$datosModelo['indice_pk'],PDO::PARAM_STR);
    $consulta->bindParam(":especie",$datosModelo['indice_especie'],PDO::PARAM_STR);
    $consulta->bindParam(":sexo",$datosModelo['indice_sexo'],PDO::PARAM_STR);
    $consulta->bindParam(":nacimiento",$datosModelo['indice_nacimiento'],PDO::PARAM_STR);
    $consulta->bindParam(":pais_origen",$datosModelo['indice_pais'],PDO::PARAM_STR);
    $consulta->bindParam(":continente",$datosModelo['indice_continente'],PDO::PARAM_STR);
   
    if($consulta->execute()){
        return "ok";
    }else{
        return "error";
    }
    $consulta->close();
}
#Metodo para editar(modificar) los datos de las especies
#-----------------------------------
static public function modificarEspecieControlador($datos,$tabla){
    $consulta=Conexion::conectar()->prepare("SELECT pk_especie,nombre_vulgar,nombre_cientifico,familia,peligro_extincion FROM $tabla WHERE pk_especie=:pk");
    //Se obtiene los parametros y los pasamos a variables para la consulyta
    $consulta->bindParam(":pk",$datos,PDO::PARAM_STR);
    //Ejecutamos la consulta
    $consulta->execute();
    //Retornamos los valores obtenidos
    return $consulta->fetch();
    //Cerramos la consulta
    $consulta->close();
}
#Actualizar datos de las especies
#------------------------------------
static public function actualizarEspecieModelo($datosModelo,$tabla){
    $consulta=Conexion::conectar()->prepare("UPDATE $tabla SET nombre_vulgar=:nombre_vulgar,nombre_cientifico=:nombre_cientifico,familia=:familia,peligro_extincion=:peligro_extincion WHERE pk_especie=:pk");

    $consulta->bindParam(":pk",$datosModelo['indice_pk'],PDO::PARAM_STR);
    $consulta->bindParam(":nombre_vulgar",$datosModelo['indice_vulgar'],PDO::PARAM_STR);
    $consulta->bindParam(":nombre_cientifico",$datosModelo['indice_cientifico'],PDO::PARAM_STR);
    $consulta->bindParam(":familia",$datosModelo['indice_familia'],PDO::PARAM_STR);
    $consulta->bindParam(":peligro_extincion",$datosModelo['indice_extincion'],PDO::PARAM_STR);
   
    if($consulta->execute()){
        return "ok";
    }else{
        return "error";
    }
    $consulta->close();
}
#Método para eliminar las especies animales
#-------------------------------
static public function eliminarEspecieControlador($datos,$tabla){
    $consulta = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE pk_especie=:pk");
    $consulta->bindParam(":pk",$datos,PDO::PARAM_STR);
    if($consulta->execute()){
        return "ok";
    }else{
        return "error";
    }
}
#Método para eliminar los animales
#-------------------------------
static public function eliminarAnimalControlador($datos,$tabla){
    $consulta = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE pk_animal=:pk");
    $consulta->bindParam(":pk",$datos,PDO::PARAM_STR);
    if($consulta->execute()){
        return "ok";
    }else{
        return "error";
    }
}
#Método para eliminar los zoologicos
#-------------------------------
static public function eliminarZoologicoControlador($datos,$tabla){
    $consulta = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE pk_zoologico=:pk");
    $consulta->bindParam(":pk",$datos,PDO::PARAM_STR);
    if($consulta->execute()){
        return "ok";
    }else{
        return "error";
    }
}                     
}
<?php
class Paginas{
#Método que gestiona los enlaces
static public function enlacesPaginasModelo($variable){
    if($variable=="principal"){
        $modulo="vistas/modulos/principal.php";
    }
    else if($variable=="altas_animal"){
        $modulo="vistas/modulos/altas_animal.php";
    }
    else if($variable=="altas_zoologico"){
        $modulo="vistas/modulos/altas_zoologico.php";
    }
    else if($variable=="altas_especie"){
        $modulo="vistas/modulos/altas_especie.php";
    }
    /*Listados*/
    else if($variable=="listados_zoologicos"){
        $modulo="vistas/modulos/listados_zoologicos.php";
    }
    else if($variable=="listados_especies"){
        $modulo="vistas/modulos/listados_especies.php";
    }
    else if($variable=="listados_animales"){
        $modulo="vistas/modulos/listados_animales.php";
    }
    /*Editar*/
    else if($variable=="editar_zoologico"){
        $modulo="vistas/modulos/editar_zoologico.php";
    }
    else if($variable=="editar_animal"){
        $modulo="vistas/modulos/editar_animal.php";
    }
    else if($variable=="editar_especie"){
        $modulo="vistas/modulos/editar_especie.php";
    }
    /*Eliminar*/
    else if($variable=="eliminar_zoologico"){
        $modulo="vistas/modulos/eliminar_zoologico.php";
    }
    else if($variable=="eliminar_animal"){
        $modulo="vistas/modulos/eliminar_animal.php";
    }
    else if($variable=="eliminar_especie"){
        $modulo="vistas/modulos/eliminar_especie.php";
    }
    else{
        $modulo="vistas/modulos/principal.php";
    }
    return $modulo;
}
}
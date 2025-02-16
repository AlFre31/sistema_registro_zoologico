<!--Aqui va el encabezado-->
<div class="alert alert-success" role="alert" align="center">
  Midificación de los animales
</div>
<div align="center">
<img src="vistas/img/zoologico.jpg" alt="" srcset="">
</div>
<br><br>
<div>
    <form method="POST" autocomplete="off">
    <?php
        $registro=new Controlador();
        $registro->modificar_animal();
    ?>
    </form>
</div>
<?php
$editar=new Controlador();
$editar->actualizarAnimalControlador();
?>
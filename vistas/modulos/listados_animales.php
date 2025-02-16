<!--Aqui va el encabezado-->
<div class="alert alert-success" role="alert" align="center">
Listados de los aniamles
</div>
<br><br>
<div class="container">
    <table class="table table-striped">
        <thead align="center">
            <tr>
                <th>#</th>
                <th>Especie</th>
                <th>Sexo</th>
                <th>Fecha de nacimiento</th>
                <th>País de origen</th>
                <th>Continente</th>
                <th>Número del zoologico(FK)</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $animales=new Controlador();
            $animales->vistaAnimalesControlador();
            ?>
        </tbody>
    </table>
</div>
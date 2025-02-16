<!--Aqui va el encabezado-->
<div class="alert alert-success" role="alert" align="center">
Listados de las especies
</div>
<br><br>
<div class="container">
    <table class="table table-striped">
        <thead align="center">
            <tr>
                <th>#</th>
                <th>Nombre Vulgar</th>
                <th>Nombre Cientifico</th>
                <th>Familia</th>
                <th>¿Peligro de Extinción?</th>
                <th>Número del Animal(FK)</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $especies=new Controlador();
            $especies->vistaEspeciesControlador();
            ?>
        </tbody>
    </table>
</div>
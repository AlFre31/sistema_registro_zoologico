<!--Aqui va el encabezado-->
<div class="alert alert-success" role="alert" align="center">
Listados de los Zoologicos
</div>
<br><br>
<div class="container">
    <table class="table table-striped">
        <thead align="center">
            <tr>
                <th>#</th>
                <th>Nombre del Zoologico</th>
                <th>Ciudad</th>
                <th>País</th>
                <th>Tamaño en metros cuadrados</th>
                <th>Presupuesto Anual</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $zoologicos=new Controlador();
            $zoologicos->vistaZoologicosControlador();
            ?>
        </tbody>
    </table>
</div>
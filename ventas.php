<?php include 'Template/header.php'?>
    <?php
        include_once 'Model/conexion.php';
        include_once 'Data/productos.php';

        $conexion= new CConexion();

        // Llamar a la función para obtener datos
        $datos = obtenerVentas($conexion);
        //print_r($datos);
    ?>

<div class="container mt-4">
    <h1>Consulta Ventas</h1>
    <!-- Aquí puedes agregar el contenido de tu página -->
</div>

<div class="row">
    <input type="text" id="conexion" hidden value="<?php $conexion ?>">
    <div class="col-md-1">
    </div>
    <div>
    <p>En este apartado, verás todas las ventas registradas.</p>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header text-center">
    <i class="fa fa-list" aria-hidden="true"></i><b> Ventas</b>                    
    </div>
    <div class="p-3">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ID Producto</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cantidad Vendida</th>
                        <th scope="col">Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($datos !== false) {
                        foreach ($datos as $dato) {
                        ?>
                        <tr>
                            <td scope="row"><?php echo $dato['id'] ?> </td>
                            <td scope="row"><?php echo $dato['idproducto'] ?> </td>
                            <td scope="row"><?php echo $dato['nombreproducto'] ?> </td>
                            <td scope="row"><?php echo $dato['cantidad'] ?> </td>
                            <td scope="row"><?php echo $dato['observaciones'] ?> </td>
                            </td>
                        </tr>
                        <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
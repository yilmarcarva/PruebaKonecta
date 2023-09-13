<?php include 'Template/header.php'?>
    <?php
        include_once 'Model/conexion.php';
        include_once 'Data/productos.php';

        $conexion= new CConexion();

        // Llamar a la función para obtener datos
        $datos = obtenerProductos($conexion);
        //print_r($datos);
    ?>

<!-- Contenido de la página -->
<div class="container mt-4">
    <h1>Bienvenido a nuestra Cafetería</h1>
    <!-- Aquí puedes agregar el contenido de tu página -->
</div>

<div class="row">
    <input type="text" id="conexion" hidden value="<?php $conexion ?>">
    <div class="col-md-1">
    </div>
    <div>
    <p>Bienvenido al sistema de gestión de la cafetería, acá podrás crear, modificar los productos ofrecidos a los clientes.</p>
    <p>También puedes vender cada producto.</p>
    </div>
</div>
<div class="row">
    <div class="col-md-5">

    </div>
    <div class="col-md-5">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus" aria-hidden="true"></i> Agregar nuevo producto
        </button>
    </div>
</div>
<br>
<!--Inicio Alert - Error -->
    <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){

    ?>

            <div id="altError" class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4><i class="fa fa-times"></i> Ocurrió un problema con el producto <br> Revise los datos.</h4>
            </div>
            
            <script>
              var alertList = document.querySelectorAll('.alert');
              alertList.forEach(function (alert) {
                new bootstrap.Alert(alert)
              });
              setTimeout(function() {
                    var alerta = document.getElementById('altError');
                    alerta.style.display = 'none';
                }, 3000); // 3000 milisegundos = 3 segundos
            </script>

            <?php
                }
            ?>
<!--Alerta de eliminación -->
    <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
    ?>
        <div id="altEliminar" class="alert alert-success alert-dismissible fade show" role="alert">
        <h4><i class="fa fa-check checkmark"></i> Producto con ID <?php echo $_GET['idP']?> eliminado correctamente.</h4>
        </div>
            
        <script>
            var alertList = document.querySelectorAll('.alert');
                alertList.forEach(function (alert) {
                new bootstrap.Alert(alert)
            });
            setTimeout(function() {
                    var alerta = document.getElementById('altEliminar');
                    alerta.style.display = 'none';
                }, 3000); // 3000 milisegundos = 3 segundos
        </script>

        <?php
            }
        ?>

<!--Alerta de inserción -->
    <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'insercion'){
    ?>
            <div id="altInsercion" class="alert alert-success alert-dismissible fade show" role="alert">
              <h4><i class="fa fa-check checkmark"></i> Producto insertado correctamente.</h4>
            </div>
            
            <script>
              var alertList = document.querySelectorAll('.alert');
              alertList.forEach(function (alert) {
                new bootstrap.Alert(alert)
              });
              setTimeout(function() {
                    var alerta = document.getElementById('altInsercion');
                    alerta.style.display = 'none';
                }, 3000); // 3000 milisegundos = 3 segundos
            </script>

            <?php
                }
            ?>
            
<!--Alerta de no inserción -->
    <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'noinsertado'){
    ?>
            <div id="altNoInsercion" class="alert alert-danger alert-dismissible fade show" role="alert">
              <h4><i class="fa fa-times"></i> No fue posible insertar el producto <br> Revise los datos.</h4>
            </div>
            
            <script>
              var alertList = document.querySelectorAll('.alert');
              alertList.forEach(function (alert) {
                new bootstrap.Alert(alert)
              });
              setTimeout(function() {
                    var alerta = document.getElementById('altNoInsercion');
                    alerta.style.display = 'none';
                }, 3000); // 3000 milisegundos = 3 segundos
            </script>

            <?php
                }
            ?>
<!--Alerta de modificación --> 
    <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'actualizacion'){

    ?>

            <div id="altModi" class="alert alert-success alert-dismissible fade show" role="alert">
            <h4><i class="fa fa-check checkmark"></i> Producto con ID <?php echo $_GET['idP']?> actualizado.</h4>
            </div>
            
            <script>
              var alertList = document.querySelectorAll('.alert');
              alertList.forEach(function (alert) {
                new bootstrap.Alert(alert)
              });
              setTimeout(function() {
                    var alerta = document.getElementById('altModi');
                    alerta.style.display = 'none';
                }, 3000); // 3000 milisegundos = 3 segundos
            </script>

            <?php
                }
            ?>

<!--Alerta de venta -->
    <?php
        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'vendido'){
    ?>

            <div id="altVenta" class="alert alert-success alert-dismissible fade show" role="alert">
            <h4><i class="fa fa-check checkmark"></i> Producto con id <?php echo $_GET['idP']?> vendido en la venta # <?php echo $_GET['idVenta']?>.</h4>
            </div>
            
            <script>
              var alertList = document.querySelectorAll('.alert');
              alertList.forEach(function (alert) {
                new bootstrap.Alert(alert)
              });
              setTimeout(function() {
                    var alerta = document.getElementById('altVenta');
                    alerta.style.display = 'none';
                }, 3000); // 3000 milisegundos = 3 segundos
            </script>

            <?php
                }
            ?>
<br>
<div class="card">
    <div class="card-header text-center">
    <i class="fa fa-list" aria-hidden="true"></i><b> Productos</b>                    
    </div>
    <div class="p-3">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Referencia</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Peso</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Fecha Creación</th>
                        <th scope="col" colspan="3">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($datos !== false) {
                        foreach ($datos as $dato) {
                        ?>
                        <tr>
                            <td scope="row"><?php echo $dato['id'] ?> </td>
                            <td scope="row"><?php echo $dato['nombreproducto'] ?> </td>
                            <td scope="row"><?php echo $dato['referencia'] ?> </td>
                            <td scope="row"><?php echo $dato['precio'] ?> </td>
                            <td scope="row"><?php echo $dato['peso'] ?> </td>
                            <td scope="row"><?php echo $dato['categoria'] ?> </td>
                            <td scope="row"><?php echo $dato['stock'] ?> </td>
                            <td scope="row"><?php echo $dato['fechacreacion'] ?> </td>
                            <td style="padding:10px;text-align: center;"><a class="btn btn-sm btn-outline-success" href="VentaProducto.php?id=<?php echo $dato['id']?>"><i class="fa fa-usd"> Vender</i></td>
                            <td style="padding:10px;text-align: center;"><a class="btn btn-outline-warning btn-sm" href="ModificarProducto.php?id=<?php echo $dato['id']?>" title="Editar producto"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a></td>
                            <td style="padding:10px;text-align: center;"><a class="btn btn-outline-danger btn-sm" href="# " onclick="confirmarEliminacion(<?php echo $dato['id'] ?>)"><i class="fa fa-trash"> Eliminar</i>
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

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingreso nuevo producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="miFormulario" action="GuardarProducto.php" method="POST">
        <div class="row">
            <div class="col-md-6">
            <label for="nombreProducto">Nombre producto</label>
            <input type="text" class="form-control" id="nombreProducto" name="nombreProducto">
            <span id="spnombreProducto"></span>
            </div>
            <div class="col-md-6">
            <label for="referenciaProducto">Referencia</label>
            <input type="text" class="form-control" id="referenciaProducto" name="referenciaProducto">
            <span id="spreferenciaProducto"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <label for="precioProducto">Precio</label>
            <input type="text" class="form-control" id="precioProducto" name="precioProducto" >
            <span id="spprecioProducto"></span>
            </div>
            <div class="col-md-6">
            <label for="pesoProducto">Peso (KG)</label>
            <input type="text" class="form-control" id="pesoProducto" name="pesoProducto">
            <span id="sppesoProducto"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <label for="categoriaProducto">Categoría</label>
            <select class="form-control" id="categoriaProducto" name="categoriaProducto">
                <option value="" disabled selected>Selecciona</option>
                <option value="Bebidas">Bebidas</option>
                <option value="Comidas">Comidas</option>
                <option value="Panader&iacute;a">Panadería</option>
                <option value="Ensadalas">Ensaladas</option>
            </select> 
            <span id="spcategoriaProducto"></span>
        </div>
            <div class="col-md-6">
            <label for="stockProducto">Stock (Cantidad)</label>
            <input type="text" class="form-control" id="stockProducto" name="stockProducto">
            <span id="spstockProducto"></span>
            </div>
        </div> 
        <br>
        <div class="text-right">
        <button type="submit" class="btn btn-primary">Guardar producto</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include 'Template/header.php'?>
<?php
    if(!isset($_GET['id'])){
        header('Location: index.php?mensaje=error');
        exit();
    }
    include_once 'Model/conexion.php';
    include_once 'Data/productos.php';

    $id = $_GET['id'];
        $conexion= new CConexion();

        // Llamar a la función para obtener datos
        $datos = obtenerProductoXID($conexion,$id);
        //print_r($datos);
?>

<div class="row">
    <div class="col-md-12 text-center">
        <?php
        if($datos!== false){
            foreach ($datos as $dato){
                if($dato['stock']<=0){ 
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4><i class="fa fa-check times"></i> El producto <?php echo $dato['nombreproducto']?> no cuenta con unidades disponibles.</h4>
            </div>
            
            <script>
              var alertList = document.querySelectorAll('.alert');
              alertList.forEach(function (alert) {
                new bootstrap.Alert(alert)
              });
            </script>   
        <?php
                }
            }
        }
        ?>
    </div>
</div>
<?php
        if($datos!== false){
            foreach ($datos as $dato){
        ?>
        <div class="form-group" style="margin-left:10px;margin-right:10px">
        <h4>Venta de productos</h4>   
        <br>
            <form id="miFormulario" action="venta.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                    <label for="nombreProducto">Nombre producto</label>
                    <input type="text" class="form-control"  readonly id="nombreProducto" name="nombreProducto" value="<?php echo $dato['nombreproducto']?>">
                    <span id="spnombreProducto"></span>
                    </div>
                    <div class="col-md-6">
                    <label for="cantidadVenta">Cantidad</label>
                    <input type="number" class="form-control" id="cantidadVenta" name="cantidadVenta" oninput="calcularTotal()">
                    <span id="spcantidadVenta"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <label for="precioProducto">Observaciones</label>
                    <textarea class="form-control" aria-label="With textarea" id="observacionesVenta" name="observacionesVenta"></textarea>
                    <span id="spprecioProducto"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="precioProducto">Precio unidad</label>
                        <input type="text" class="form-control" id="precioProducto" disabled name="precioProducto" value="<?php echo $dato['precio']?>">
                        <span id="spprecioProducto"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="stockProducto">Stock disponible</label>
                        <input type="text" class="form-control" id="stockProducto" disabled name="stockProducto" value="<?php echo $dato['stock']?>">
                        <span id="spstockProducto"></span>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                        <label for="totalVenta">Total</label>
                        <input type="text" class="form-control" id="totalVenta" name="totalVenta" value="">
                    </div>
                </div> 
                <br>
                <div class="text-right">
                <input type="hidden" name="id" id="id" value="<?php echo $dato['id']; ?>">
                <button type="submit" id="btnSubmit" class="btn btn-primary">Guardar Venta</button>
                <button type="button" class="btn btn-secondary" onclick="window.history.back();">Volver</button>
                </div>
            </form>
        </div>
    <?php
            }
        }
        ?>
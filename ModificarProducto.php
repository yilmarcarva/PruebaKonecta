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
        ?>
            <h4>Edición de producto <?php echo $dato['nombreproducto'] ?></h4>    
        <?php
            }
        }
        ?>
    </div>
</div>
    <?php
        if($datos!== false){
            foreach ($datos as $dato){
        ?>
        <div class="form-group">
            <form id="miFormulario" action="modificar.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                    <label for="nombreProducto">Nombre producto</label>
                    <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" value="<?php echo $dato['nombreproducto']?>">
                    <span id="spnombreProducto"></span>
                    </div>
                    <div class="col-md-6">
                    <label for="referenciaProducto">Referencia</label>
                    <input type="text" class="form-control" id="referenciaProducto" name="referenciaProducto" value="<?php echo $dato['referencia']?>">
                    <span id="spreferenciaProducto"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <label for="precioProducto">Precio</label>
                    <input type="text" class="form-control" id="precioProducto" name="precioProducto" value="<?php echo $dato['precio']?>">
                    <span id="spprecioProducto"></span>
                    </div>
                    <div class="col-md-6">
                    <label for="pesoProducto">Peso (KG)</label>
                    <input type="text" class="form-control" id="pesoProducto" name="pesoProducto" value="<?php echo $dato['peso']?>">
                    <span id="sppesoProducto"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <label for="categoriaProducto">Categoría</label>
                    <select class="form-control" id="categoriaProducto" name="categoriaProducto">
                        <option value="" selected>Selecciona</option>
                        <option value="Bebidas" <?php echo ($dato['categoria'] === 'Bebidas') ? 'selected' : ''; ?>>Bebidas</option>
                        <option value="Comidas" <?php echo ($dato['categoria'] === 'Comidas') ? 'selected' : ''; ?>>Comidas</option>
                        <option value="Panadería" <?php echo ($dato['categoria'] === 'Panadería') ? 'selected' : ''; ?>>Panadería</option>
                        <option value="Ensadalas" <?php echo ($dato['categoria'] === 'Ensadalas') ? 'selected' : ''; ?>>Ensaladas</option>
                    </select> 
                    <span id="spcategoriaProducto"></span>
                </div>
                    <div class="col-md-6">
                    <label for="stockProducto">Stock (Cantidad)</label>
                    <input type="text" class="form-control" id="stockProducto" name="stockProducto" value="<?php echo $dato['stock']?>">
                    <span id="spstockProducto"></span>
                    </div>
                </div> 
                <br>
                <div class="text-right">
                <input type="hidden" name="id" id="id" value="<?php echo $dato['id']; ?>">
                <button type="submit" class="btn btn-primary">Editar</button>
                <button type="button" class="btn btn-secondary" onclick="window.history.back();">Volver</button>
                </div>
            </form>
        </div>
    <?php
            }
        }
        ?>
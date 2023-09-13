<?php
if(!isset($_POST['id'])){
    header('Location: index.php?mensaje=error');
    exit();
}
    include 'Model/conexion.php';
    include 'Data/productos.php';

    $conexion= new CConexion();

    $idP = $_POST['id'];
    $nombreP = $_POST["nombreProducto"];
    $cantidadV = $_POST["cantidadVenta"];
    $observacionesV = $_POST["observacionesVenta"];

    $result=guardarVenta($conexion,$idP,$nombreP,$cantidadV,$observacionesV);

    $resultProducto=obtenerProductoXID($conexion,$idP);
    if($resultProducto!==false){
        foreach ($resultProducto as $dato) {
            $cantidadFinal=$dato['stock']-$cantidadV;
        }
        $resultActualizacion=actualizarStockProducto($conexion,$idP,$cantidadFinal);
        if ($resultActualizacion !== TRUE) {
            header('Location: index.php?mensaje=error');
            exit();
        }

    }

    if ($result !== false) {
        header('Location: index.php?mensaje=vendido&idP='.$idP.'&idVenta='.$result);
        exit();
    } else {
        header('Location: index.php?mensaje=error');
        exit();
        
    }
?>
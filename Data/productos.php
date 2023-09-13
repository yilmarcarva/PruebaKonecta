<?php
require_once 'Model/conexion.php';

function obtenerProductos($conexion) {
    $sql = "SELECT id, nombreproducto, referencia, precio, peso, categoria, stock, fechacreacion FROM public.productos;";
    return $conexion->ejecutarConsulta($sql);
}

function obtenerProductoXID($conexion, $idProducto){
    $sql = "SELECT id, nombreproducto, referencia, precio, peso, categoria, stock, fechacreacion FROM public.productos WHERE id=$idProducto";
    return $conexion->ejecutarConsulta($sql);
}

function guardarProducto($conexion,$nombreP,$referenciaP,$precioP,$pesoP,$categoriaP,$stockP){
    $sql = "INSERT INTO public.productos( nombreproducto, referencia, precio, peso, categoria, stock) VALUES ('$nombreP','$referenciaP',$precioP,$pesoP,'$categoriaP',$stockP)";
    return $conexion->ejecutarGuardar($sql);
}

function actualizarProducto($conexion,$idP,$nombreP,$referenciaP,$precioP,$pesoP,$categoriaP,$stockP){
    $sql = "UPDATE public.productos SET  nombreproducto='$nombreP', referencia='$referenciaP', precio=$pesoP, peso=$pesoP, categoria='$categoriaP', stock=$stockP WHERE id=$idP";
    return $conexion->ejecutarGuardar($sql);
}

function actualizarStockProducto($conexion,$idP,$stockP){
    $sql = "UPDATE public.productos SET  stock=$stockP WHERE id=$idP";
    return $conexion->ejecutarGuardar($sql);
}

function eliminarProducto($conexion,$idP){
    $sql = "DELETE FROM public.productos WHERE id=$idP";
    return $conexion->ejecutarGuardar($sql);
}

function guardarVenta($conexion,$idP,$nombreP,$cantidadV,$observacionesV){
    $sql = "INSERT INTO public.ventas(idproducto, nombreproducto, cantidad, observaciones) VALUES ($idP,'$nombreP', $cantidadV, '$observacionesV');";
    return $conexion->ejecutarGuardarVenta($sql);
}

function obtenerVentas($conexion){
    $sql = "SELECT id, idproducto, nombreproducto, cantidad, observaciones FROM public.ventas;";
    return $conexion->ejecutarConsulta($sql);
}
?>
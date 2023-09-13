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
    $referenciaP = $_POST["referenciaProducto"];
    $precioP = $_POST["precioProducto"];
    $presoP = $_POST["pesoProducto"];
    $categoriaP = $_POST["categoriaProducto"];
    $stockP = $_POST["stockProducto"];

    $result=actualizarProducto($conexion,$idP,$nombreP,$referenciaP,$precioP,$presoP,$categoriaP,$stockP);
    echo $result;
    if ($result === TRUE) {
        header('Location: index.php?mensaje=actualizacion&idP='.$_POST['id']);
        exit();
    } else {
        header('Location: index.php?mensaje=noinsertado');
        exit();
        
    }
?>
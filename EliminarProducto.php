<?php
    if(!isset($_GET['id'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'Model/conexion.php';
    include 'Data/productos.php';

    $conexion= new CConexion();

    $idP = $_GET['id'];
    echo $idP;
    $result=eliminarProducto($conexion,$idP);
    echo $result;
    if ($result === TRUE) {
        header('Location: index.php?mensaje=eliminado&idP='.$idP);
        exit();
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>
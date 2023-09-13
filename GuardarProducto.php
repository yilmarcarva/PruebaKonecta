<?php
    // if(empty($_POST["hidden"]) || empty($_POST["name"]) || empty($_POST["reference"]) 
    // || empty($_POST["price"]) || empty($_POST["weigth"]) || empty($_POST["category"]) 
    // || empty($_POST["stock"]) ){
    //     echo "¡ERROR! Faltan datos necesarios para crear un producto";
    //     header('Location: index.php?message=missing');
    //     exit();
        
    // }

    include 'Model/conexion.php';
    include 'Data/productos.php';


    $conexion= new CConexion();

    $nombreP = $_POST["nombreProducto"];
    $referenciaP = $_POST["referenciaProducto"];
    $precioP = $_POST["precioProducto"];
    $presoP = $_POST["pesoProducto"];
    $categoriaP = $_POST["categoriaProducto"];
    $stockP = $_POST["stockProducto"];

    $result=guardarProducto($conexion,$nombreP,$referenciaP,$precioP,$presoP,$categoriaP,$stockP);
    if ($result === TRUE) {
        header('Location: index.php?mensaje=insercion');
        exit();
    } else {
        header('Location: index.php?mensaje=noinsertado');
        exit();
        
    }
    
?>
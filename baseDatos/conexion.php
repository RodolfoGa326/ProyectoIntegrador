<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $baseDeDatos = "menus";

    $conectar = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

    if(!$conectar){
        echo "Error en la conexion con el servidor";
    } else{
        echo"Conexion lista!!";
    }
?>
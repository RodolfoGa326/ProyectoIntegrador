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
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../img/icon.png">
    <link rel="stylesheet" href="../css/diabetes.css">
    <title>¿Qué hay de comer?</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="btn-menu">
                <label for="btn-menu" class="icon-menu">☰</label>
            </div>
            <div class="logo">
                <h1>¿Qué hay de comer?</h1>
            </div>
        </div>
    </header>
    
        <!-- Comienza el apartado del menu lateral -->
        <input type="checkbox" id="btn-menu">
        <div class="container-menu">
            <div class="cont-menu">
             <nav>
                <a href="#" class="close-menu"> <i class="fas fa-times"></i></a>
                <a href="../html/index.php">Inicio</a>
                <a href="../html/infantil.php">Infantil</a>
                <a href="../html/diabetico.php">Diabeticos</a>
                <a href="../html/menus.php">Recetas</a>
                <a href="../html/contacto.html">Contacto</a>
                <a href="../html/acerca.html">Acerca</a>
                </nav>
            </div>
        </div>
        <!-- Fin cel menu lateral -->s
        <!-- Mostrando los menus -->
        <table class="muestra">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dificultad</th>
                <th>Comensal</th>
                <th>Tiempo</th>
                <th>Link</th>
                <th>Ingredientes</th>
            </tr>
        </thead>
        <?php
            $sql="SELECT * FROM datosrecetas";
            $result=mysqli_query($conectar,$sql);
            while($mostrar=mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $mostrar['nombre']?></td>
            <td><?php echo $mostrar['dificultad']?></td>
            <td><?php echo $mostrar['comensales']?></td>
            <td><?php echo $mostrar['tiempo']?></td>
            <td><a href="<?php echo $mostrar['link']; ?>"><?php echo $mostrar['link']; ?></a></td>
            <td><?php echo $mostrar['ingredientes']?></td>
        </tr>    
        <?php
            }
        ?>
        </table>
        <!-- Fin de muestra de menus -->
</body>
</html>

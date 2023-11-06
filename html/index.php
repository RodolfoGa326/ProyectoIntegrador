<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $baseDeDatos = "menus";
    
    $conectar = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
    
    if(!$conectar){
        echo "Error en la conexion con el servidor";
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../img/icon.png">
    <link rel="stylesheet" href="../css/estilos.css">
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
            <nav class="menu">
                <a href="../html/index.php">Inicio</a>
                <a href="../html/acerca.html">Acerca</a>
                <a href="../html/menus.php">Menus</a>
                <a href="../html/contacto.html">Contacto</a>
            </nav>
        </div>
    </header>
    <div class="capa"></div> 
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
        <!-- Fin cel menu lateral -->
    <!-- Inicio de la busqueda -->
    <div class="busqueda">
        <form method="POST">
            <input type="text" id="keywords" name="keywords" placeholder="Ingrese su búsqueda">
            <div class="btn">
                <input type="submit" name="search" id="search" value="Buscar">
            </div>
        </form>
    </div>
    <div class="respuestas">
    <?php
        //Si se ha pulsado el botón de buscar
        if (isset($_POST['search'])) {
            //Recogemos las claves enviadas
            $keywords = $_POST['keywords'];
            $conectar = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
            $query = "SELECT * FROM datosrecetas WHERE ingredientes LIKE '%$keywords%'";
            
            $query_searched = mysqli_query($conectar, $query);
            $count_results = mysqli_num_rows($query_searched);
            
            //Si ha resultados
            if ($count_results > 0) {
                echo '<h2>Se han encontrado '.$count_results.' resultados.</h2>';
                echo '<br>';
                echo '<ul>';
                while ($row_searched = mysqli_fetch_array($query_searched)) {?>
                <table class="muestra">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Dificultad</th>
                            <th>Comensales</th>
                            <th>Tiempo</th>
                            <th>Link</th>
                            <th>Ingredientes</th>
                        </tr>
                    </thead>
                    <tr>
                        <td><?php echo '<h3>'.$row_searched['nombre'].'</h3>'?></td>
                        <td><?php echo '<h3>'.$row_searched['dificultad'].'</h3>'?></td>
                        <td><?php echo '<h3> Para '.$row_searched['comensales'].' personas</h3>'?></td>
                        <td><?php echo '<h3>'.$row_searched['tiempo'].'</h3>'?></td>
                        <td><?php echo '<h3> <a href="'.$row_searched['link'].'"> Ver receta </a></h3>'?></td>
                        <td><?php echo '<h3>'.$row_searched['ingredientes'].'</h3>'?></td>
                    </tr>
                </table>
                <?php
                }
                echo '</ul>';
            } else {
                //Si no hay registros encontrados
                echo '<h2>No se encuentran resultados con los criterios de búsqueda.</h2>';
            }         
        }
    ?>
    </div>
    <!-- Fin de la busqueda -->
</body>
</html>
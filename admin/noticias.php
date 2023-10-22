<?php
session_start();
extract($_REQUEST);
if (!isset($_SESSION['usuario_logueado']))
    header("location:index.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <link href="../lib/bootstrap-5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/styles.css">

</head>

<body>
    <div class="container-fluid">
        <?php require("menu.php"); ?>
        <h1>NOTICIAS</h1>
        <?php

        if (isset($mensaje))
            print("<h3 style='color:#cc00ff'>" . $mensaje . "</h3>");
        ?>
        <a href="noticias_nueva.php" class="btn btn-primary">Nueva Noticia</a>
    </div>
    <table class="table">
        <tr>
            <th>TITULO</th>
            <th>FECHA</th>
            <th>COPETE</th>
            <th>EDITAR</th>
            <th>BORARR</th>
        </tr>
        <?php
        require("conexion.php");
        $conexion = mysqli_connect($server_db, $usuario_db, $password_db)
            or die("No se puede conectar con el servidor");
        mysqli_select_db($conexion, $base_db)
            or die("No se puede seleccionar la base de datos");
        $instruccion = "select * from noticias  order by fecha desc";
        $consulta = mysqli_query($conexion, $instruccion) or die("no puedo consultar");

        $nfilas = mysqli_num_rows($consulta);
        for ($i = 0; $i < $nfilas; $i++) {
            $resultado = mysqli_fetch_array($consulta);
            $inst2 = "select * from usuarios where id_usuario=" . $resultado['id_usuario'];
            $consulta2 = mysqli_query($conexion, $inst2) or die("no puedo consultar");
            $autor = mysqli_fetch_array($consulta2);
            print('
            <tr>
                <td>' . trim($resultado['titulo']) . '</td>
                <td>' . $resultado['fecha'] . '</td>
                
                <td>' . substr($resultado['copete'], 0, 50) . '...</td>   
            
            
                <td><a href="noticias_editar.php?id_noticia=' . $resultado['id_noticia'] . '"class="btn btn-success">Editar</a></td>
                <td><a href="noticias_borrar.php?id_noticia=' . $resultado['id_noticia'] . '&imagen=' . $resultado['imagen'] . '" class="btn btn-danger" "onclick="return confirm(&quot; Desea eliminar &quot;)">Borrar</a></td>
            </tr>
            
            ');
        }
        mysqli_close($conexion);
        ?>
    </table>

    <script src="../lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>

</html>

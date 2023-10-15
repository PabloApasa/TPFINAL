<!DOCTYPE html>
<html lang="es">
<!-- aca se edita la pantalla de noticias que se ve en el portal -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style1.css">
    <!-- bootstrap -->
    <link href="lib/bootstrap-5.3.2//css/bootstrap.min.css" rel="stylesheet">
    <script src="lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>

</head>


<body>
    <div class="container-fluid">
        <?php
        // require("menu.php");
        ?>
        <img class="logo" src="./images/elnot.jpg" alt="elnot">
        <h1>EL NOTICIERO</h1>

        <h1>UN POCO DE TODO</h1>
        <div class=row>
            <?php
            extract($_REQUEST);
            require("admin/conexion.php");
            $conexion = mysqli_connect($server_db, $usuario_db, $password_db)
                or die("No se puede conectar con el servidor");
            mysqli_select_db($conexion, $base_db)
                or die("No se puede seleccionar la base de datos");
            $instruccion = "select * from noticias where id_noticia=" . $id_noticia;


            $consulta = mysqli_query($conexion, $instruccion) or die("no puedo consultar");
            $nfilas = mysqli_num_rows($consulta);
            for ($i = 0; $i < $nfilas; $i++) {
                $resultado = mysqli_fetch_array($consulta);
                $inst = "select * from usuarios where id_usuario='" . $resultado['id_usuario'] . "'";
                $consulta2 = mysqli_query($conexion, $inst) or die("no puedo consultar");
                $autor = mysqli_fetch_array($consulta2);
                print('
                <div class="col-12">
                    <div class="card">
                    <img src="imagenes_subidas/' . $resultado['imagen'] . '" class="img-fluid imagen-noticias-zoom" alt="' . $resultado['titulo'] . '">
                        <div class="card-body1">
                            <h5 class="card-title">' . $resultado['titulo'] . '</h5>
                            <p class="card-subtitle mb-2 text-body-secondary">' . $resultado['copete'] . '</p>
                            <p class="card-text">' . $resultado['cuerpo'] . '</p>
                            <p class="card-text"> Publicado por: ' . $autor['nombre'] . '</p>
                            <a href="javascript:history.back()" class="btn btn-primary">Volver a la pagina principal</a>
                        </div>
                    </div>
                </div>
            
            ');
            }
            mysqli_close($conexion);

            ?>
        </div>
</body>

</html>

<!-- aa -->
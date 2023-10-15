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
    <div class="container">
        <?php
        // require("menu.php");x
        ?>
        <img class="logo" src="./images/elnot.jpg" alt="elnot">
        <h1>EL NOTICIERO</h1>

        <h1>UN POCO DE TODO</h1>
        <div class="row">
            <?php
            require("admin/conexion.php");
            $conexion = mysqli_connect($server_db, $usuario_db, $password_db)
                or die("No se puede conectar con el servidor");
            mysqli_select_db($conexion, $base_db)
                or die("No se puede seleccionar la base de datos");
            $instruccion = "select * from noticias order by fecha desc limit 10";



            $consulta = mysqli_query($conexion, $instruccion) or die("no puedo consultar");
            $nfilas = mysqli_num_rows($consulta);
            for ($i = 0; $i < $nfilas; $i++) {
                $resultado = mysqli_fetch_array($consulta);
                print('
                <div class="col-3">
                    <div class="card">
                        <img src="imagenes_subidas/' . $resultado['imagen'] . '" class="card-img-top imagen-noticias" alt="' . $resultado['titulo'] . '">
                        <div class="card-body">
                            <h5 class="card-title">' . substr($resultado['titulo'], 0, 20) . '</h5>
                            <p class="card-text">' . substr($resultado['copete'], 0, 20) . '</p>
                            <a href="ver_noticias.php?id_noticia=' . $resultado['id_noticia'] . '" class="btn btn-primary">Ver noticia</a>
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
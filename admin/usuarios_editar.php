<?php
session_start();
extract($_REQUEST);
if (!isset($_SESSION['usuario_logueado']))
    header("location: index.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <-- bootstrap -->
        <link href="../lib/bootstrap-5.3.2//css/bootstrap.min.css" rel="stylesheet">
        <script src="../lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- include summernote css/js -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>


<body>
    <div class="container">
        <?php
        require("menu.php");
        ?>
        <h1>Usuarios Editar</h1>
        <?php
        require("conexion.php");
        $conexion = mysqli_connect($server_db, $usuario_db, $password_db)
            or die("No se puede conectar con el servidor");
        mysqli_select_db($conexion, $base_db)
            or die("No se puede seleccionar la base de datos");
        $instruccion = "select*from usuarios where id_usuario=" . $id_usuario;
        $consulta = mysqli_query($conexion, $instruccion) or die("Error en la consulta a la base de datos");
        $resultado = mysqli_fetch_array($consulta);

        if (isset($mensaje))
            print("<h3 style='color:#cc00ff'>" . $mensaje . "</h3>");
        ?>


        <form action="usuarios_editar_guardar.php" method="post" enctype="multipart/form-data">
            <!-- nuevo nombre del usuario -->
            <div class="mb-3">
                <label for="nombre" class="form-label">NOMBRE</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required value="<?php print($resultado['nombre']); ?>">
            </div>
            <!-- nuevo apellido del usuario -->
            <div>
                <label for="apellido" class="form-label">APELLIDO</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido" required value="<?php print($resultado['apellido']); ?>">
            </div>
            <!-- usuario editado nuevo-->
            <div class="mb-3">
                <label for="usuario" class="form-label">USUARIO</label>
                <input type="text" class="form-control" id="usuario" name="usuario" onkeyup="comprobar_usuario(this.value)" requiredvalue="<?php print($resultado['usuario']); ?>">
                <span id="mensaje"></span>
            </div>
            <!--  password del usuario editado nuevo-->
            <div class="mb-3">
                <label for="password" class="form-label">PASSWORD</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <!-- boton de publicacion -->
            <div class="mb-3">
                <input type="hidden" name="id_usuario" value="<?php print($resultado['id_usuario']); ?>">
                <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="PUBLICAR">
                <a href="noticias.php" class="btn btn-success">Regresar</a>
            </div>
        </form>
    </div>

    <div id="librerias">
        <script>
            $(document).ready(function() {
                $('#cuerpo').summernote({
                    height: 200
                });
            });
        </script>
    </div>

</body>

</html>
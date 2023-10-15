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
    <link rel="stylesheet" href="style.css">
    <!-- bootstrap -->
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
        <h1>Noticia Editar</h1>
        <?php
        require("conexion.php");
        $conexion = mysqli_connect($server_db, $usuario_db, $password_db)
            or die("No se puede conectar con el servidor");
        mysqli_select_db($conexion, $base_db)
            or die("No se puede seleccionar la base de datos");
        $instruccion = "select*from noticias where id_noticia=" . $id_noticia;
        $consulta = mysqli_query($conexion, $instruccion) or die("Error en la consulta a la base de datos");
        $resultado = mysqli_fetch_array($consulta);

        if (isset($mensaje))
            print("<h3 style='color:#cc00ff'>" . $mensaje . "</h3>");
        ?>


        <form action="noticias_editar_guardar.php" method="post" enctype="multipart/form-data">
            <!-- titulo de la noticia nueva -->
            <div class="mb-3">
                <label for="titulo" class="form-label">TITULO</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="titulo" required value="<?php print($resultado['titulo']); ?>">
            </div>
            <!-- fecha de la noticia nueva -->
            <div>
                <label for="titulo" class="form-label">FECHA</label>
                <input type="DATE" class="form-control" id="fecha" name="fecha" placeholder="fecha" required value="">
            </div>
            <!-- copete de la noticia nueva -->
            <div class="mb-3">
                <label for="copete" class="form-label">COPETE</label>
                <input type="text" class="form-control" id="copete" name="copete" required value="<?php print($resultado['copete']); ?>">
            </div>
            <!-- cuerpo de la noticia nueva -->
            <div class="mb-3">
                <label for="cuerpo" class="form-label">CUERPO</label>
                <textarea rows="10" class="form-control" id="cuerpo" name="cuerpo" required><?php print($resultado['titulo']); ?></textarea>
            </div>
            <!-- imagen de la noticia nueva -->
            <div class="mb-3">
                <label for="imagen" class="form-label">IMAGEN</label>
                <input type="file" class="form-control" id="imagen" name="imagen"></input>
                <img src="../imagenes_subidas/<?php print($resultado['imagen']); ?>" alt="imagen" width="100px" height="100px">
            </div>
            <!-- categoria de la noticia nueva -->
            <div class="mb-3">
                <label for="categoria" class="form-label">CATEGORIA</label>
                <select class="form-control" id="categoria" name="categoria" required>
                    <option value="Deportes" <?php if ($resultado['categoria'] == "Deportes") print("selected"); ?>>Deportes</option>
                    <option value="Moda" <?php if ($resultado['categoria'] == "Moda") print("selected"); ?>>Moda</option>
                    <option value="Social" <?php if ($resultado['categoria'] == "Social") print("selected"); ?>>Social</option>
                </select>
            </div>
            <!-- boton de publicacion -->
            <div class="mb-3">
                <input type="hidden" name="imagencita" value="<?php print($resultado['imagen']); ?>">
                <input type="hidden" name="id_noticia" value="<?php print($resultado['id_noticia']); ?>">
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
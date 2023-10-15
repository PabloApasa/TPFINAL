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
        <h1>Noticia Nueva</h1>

        <form action="noticias_nuevas_guardar.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <!-- titulo de la noticia nueva -->
                <label for="titulo" class="form-label">TITULO</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="titulo" required>
            </div>
            <!-- fecha de la noticia nueva -->
            <div>
                <label for="titulo" class="form-label">FECHA</label>
                <input type="DATE" class="form-control" id="fecha" name="fecha" placeholder="fecha" required>
            </div>
            <!-- copete de la noticia nueva -->
            <div class="mb-3">
                <label for="copete" class="form-label">COPETE</label>
                <input type="text" class="form-control" id="copete" name="copete" required>
            </div>
            <!-- cuerpo de la noticia nueva -->
            <div class="mb-3">
                <label for="cuerpo" class="form-label">CUERPO</label>
                <textarea rows="10" class="form-control" id="cuerpo" name="cuerpo" required></textarea>
            </div>
            <!-- imagen de la noticia nueva -->
            <div class="mb-3">
                <label for="imagen" class="form-label">IMAGEN</label>
                <input type="file" class="form-control" id="imagen" name="imagen" required>
            </div>
            <!-- categoria de la noticia nueva -->
            <div class="mb-3">
                <label for="categoria" class="form-label">CATEGORIA</label>
                <select class="form-control" id="categoria" name="categoria" required>
                    <option value="Deportes">Deportes</option>
                    <option value="Moda">Moda</option>
                    <option value="Social">Social</option>
                </select>
            </div>
            <!-- boton de publicacion -->
            <div class="mb-3">
                <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="PUBLICAR">
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

    </div>
</body>

</html>
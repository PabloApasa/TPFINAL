<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="contenedor">
        <h1>COMENTARIOS</h1>

        <?php
        $conexion = mysqli_connect("localhost", "root", "", "noticiero");

        $resultado = mysqli_query($conexion, "SELECT * FROM comentarios");

        while ($comentario = mysqli_fetch_object($resultado)) {
        ?>
            <b><?php echo ($comentario->nombre); ?></b> (<?php echo ($comentario->fecha); ?>) dijo;
            <br />
            <?php echo ($comentario->comentario); ?>
            <br />
            <hr />
        <?php
        }
        ?>
        <div>
            <form id="formulario" action="enviarcomentarios.php" method="post">
                <h3>NOMBRE</h3>
                <input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre">
                <h3>COMENTARIO</h3>
                <textarea name="comentario" id="comentario" cols="30" rows="10" placeholder="Ingrese su comentario"></textarea>
                <br /><br />
                <input type="submit" value="Enviar">
            </form>

            <script language="javascript">
                $("#enviar").click(function() {
                    var nombre = $('#nombre').val();
                    var comentario = $('#comentario').val();

                    if (nombre == "") {
                        alert("ingrese nombre");
                        return;
                    }

                    if (comentario == "") {
                        alert("ingrese comentario");
                        return;
                    }

                    $('#formulario').submit();
                });
            </script>
        </div>
        <a href="javascript:history.back()" class="btn btn-volver">Volver</a>
    </div>
</body>

</html>
<?php

$nombre = $_POST['nombre'];
$comentario = $_POST['comentario'];

$conexion = mysqli_connect("localhost","root","","noticiero");

$nombre = mysqli_real_escape_string($conexion,$nombre);
$comentario = mysqli_real_escape_string($conexion,$comentario);

$resultado = mysqli_query($conexion,"INSERT INTO comentarios (nombre, comentario) VALUES ('$nombre','$comentario')");

if($resultado)
    echo('comentario enviado con exito');
else
    echo('error al enviar comentario');

mysqli_close($conexion);
header("location:comentarios.php?mensaje=COMENTARIO GUARDADO CON ÉXITO");

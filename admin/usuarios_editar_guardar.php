<?php
    session_start();
        extract($_REQUEST);
    if (!isset($_SESSION['usuario_logueado']))
        header("location:index.php");

    require("conexion.php");
    $conexion = mysqli_connect($server_db, $usuario_db, $password_db)
        or die("No se puede conectar con el servidor");
    mysqli_select_db($conexion, $base_db)
        or die("No se puede seleccionar la base de datos");
    $fecha=date("Y-m-d");
    $id_usuario=$_SESSION['id_usuario'];
    
    $nombre=mysqli_real_escape_string($conexion,$nombre);
    $apellido=mysqli_real_escape_string($conexion,$apellido);
    $usuario=mysqli_real_escape_string($conexion,$usuario);
    $password = mysqli_real_escape_string($conexion, $password);

    $instruccion="update usuarios set nombre='$nombre',apellido='$apellido',usuario='$usuario',password='$clave_crypt' where id_usuario='$id_usuario'";
    $consulta=mysqli_query($conexion,$instruccion) 
            or die("no pudo insertar");
    
    mysqli_close($conexion);
    header("location:usuarios_editar.php?mensaje=USUARIO EDITADO CON ÉXITO&id_usuario=".$id_usuario);
?>  

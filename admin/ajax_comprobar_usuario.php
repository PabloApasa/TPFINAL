<?php
include("conexion.php");
extract($_REQUEST);

$conexion = mysqli_connect($server_db, $usuario_db, $password_db)
    or die("Problemas con la conexion al servidor");
mysqli_select_db($conexion, $base_db)
    or die("Problemas con la seleccion de base de datos");
mysqli_set_charset($conexion, "utf8");
$usuario_db = mysqli_real_escape_string($conexion, $usuario_db);

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario_db'";
$resultado = mysqli_query($conexion, $sql);
$total = mysqli_num_rows($resultado);
if ($total > 0) {
    echo "1"; 
} else {
    echo "0"; 
}
mysqli_close($conexion);

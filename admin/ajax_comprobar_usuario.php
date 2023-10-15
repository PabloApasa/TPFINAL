<?php
include("conexion.php");
extract($_REQUEST);

$conexion = mysqli_connect($server_db, $usuario_db, $password_db,)
    or die("problemas con la conexion al servidor");
mysqli_select_db($conexion, $base_db)
    or die("problemas con la seleccion de base de datos");
mysqli_set_charset($conexion, "utf8");
$usuario = mysqli_real_escape_string($conexion, $usuario);

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
$resultado = mysqli_query($conexion, $sql);
$total = mysqli_num_rows($resultado);
if ($total == 0) {
    echo "1"; //usuario ocupado
} else {
    echo "0";  //usuario libre
}
mysqli_close($conexion);

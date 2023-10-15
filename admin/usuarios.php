 <?php
    session_start();
    extract($_REQUEST);
    if (!isset($_SESSION['usuario_logueado']))
        header("location: index.php");
    ?>
 <!DOCTYPE html>
 <html lang="es">
 <!-- aca se edita la pantalla de noticias -->

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Admin</title>
     <!-- bootstrap -->
     <link href="../lib/bootstrap-5.3.2//css/bootstrap.min.css" rel="stylesheet">
     <script src="../lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
 </head>


 <body>
     <div class="container-fluid">
         <?php
            require("menu.php");
            ?>
         <h1>USUARIOS</h1>
         <?php
            if (isset($mensaje))
                print("<h3 style='color:#cc00ff'>" . $mensaje . "</h3>");
            ?>
         <a href="usuarios_nuevos.php" class="btn btn-outline-primary">REGISTRARSE</a>
     </div>
     <table class="table">
         <tr>
             <th>nombre</th>
             <th>apellido</th>
             <th>editar</th>
             <th>borrar</th>
         </tr>

         <?php
            require("conexion.php");
            $conexion = mysqli_connect($server_db, $usuario_db, $password_db)
                or die("No se puede conectar con el servidor");
            mysqli_select_db($conexion, $base_db)
                or die("No se puede seleccionar la base de datos");
            $instruccion = "select * from usuarios ";

            $consulta = mysqli_query($conexion, $instruccion) or die("no puedo consultar");
            $nfilas = mysqli_num_rows($consulta);

            for ($j = 0; $j < $nfilas; $j++) {
                $resultado = mysqli_fetch_array($consulta);

                print('
            <tr>
                <td>' . $resultado['nombre'] . '</td>
                <td>' . $resultado['apellido'] . '</td>
                <td><a href="usuarios_editar.php?id_usuario=' . $resultado['id_usuario'] . '" class="btn btn-secondary"> editar </a></td>
                <td><a href="usuarios_borrar.php?id_usuario=' . $resultado['id_usuario'] . '" class="btn btn-danger" onclick="return confirm(&quot; desea eliminar &quot;)">borrar</a></td>
            </tr>
            
            ');
            }
            mysqli_close($conexion);

            ?>
     </table>
 </body>

 </html>
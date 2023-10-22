<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portada principal</title>
    <link href="lib/bootstrap-5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./admin/CSS/styles.css">


</head>

<body>

    <div class="container-fluid">
        <?php // require("menu.php"); 
        ?>

        <!--<h1 class="text-center">Noticias</h1>-->
        <div id="fecha">
            <?php
            // zona horaria para Argentina
            date_default_timezone_set('America/Argentina/Buenos_Aires');

            // Días de la semana 
            $dias_semana = [
                'Domingo',
                'Lunes',
                'Martes',
                'Miércoles',
                'Jueves',
                'Viernes',
                'Sábado'
            ];

            // Meses
            $meses = [
                'Enero',
                'Febrero',
                'Marzo',
                'Abril',
                'Mayo',
                'Junio',
                'Julio',
                'Agosto',
                'Septiembre',
                'Octubre',
                'Noviembre',
                'Diciembre'
            ];

            // Obtener el nombre del día, día del mes, nombre del mes y año de la fecha actuaLL
            $nombre_dia = $dias_semana[date("w")];
            $dia_mes = date("j");
            $nombre_mes = $meses[date("n") - 1]; // Restamos 1 porque los índices de los meses comienzan en 0
            $año = date("Y");

            // Mostrar la fecha en el formato deseado
            echo "$nombre_dia $dia_mes de $nombre_mes de $año";
            ?>
        </div>
        <img class="logo" src="./images/logo10_18_12345.png" alt="logo de diario">

        <nav class="nav">

            <li class="nav-item">
                <a class="nav-link" href="comentarios.php">Comentarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./admin/logout.php">Salir</a>
            </li>

        </nav>

        <!---->

        <div class="row">
            <?php
            require("admin/conexion.php");
            $conexion = mysqli_connect($server_db, $usuario_db, $password_db)
                or die("No se puede conectar con el servidor");
            mysqli_select_db($conexion, $base_db)
                or die("No se puede seleccionar la base de datos");
            $instruccion = "select * from noticias  order by fecha desc";

            $consulta = mysqli_query($conexion, $instruccion) or die("no puedo consultar");

            $nfilas = mysqli_num_rows($consulta);
            for ($i = 0; $i < $nfilas; $i++) {
                $resultado = mysqli_fetch_array($consulta);
                print('
            <div class="col-4">
                <div class="card">
                <img src="imagenes_subidas/' . $resultado['imagen'] . '" class="card-img-top img-portada" alt="' . $resultado['titulo'] . '">
                    <div class="card-body">
                        <h5 class="card-title">' . $resultado['titulo'] . '</h5>
                        <p class="card-text">' . substr($resultado['copete'], 0, 40) . '</p>
                        <a href="ver_noticia.php?id_noticia=' . $resultado['id_noticia'] . '" class="btn btn-primary">Ver noticia</a>
                    </div>
                 </div>
            </div>          
            
            ');
            }
            mysqli_close($conexion);
            ?>
        </div>
        <footer>
            <p> - BLOW DE NOTICIAS - APASA PABLO - <br />
                <a href="https://github.com/FaniCasco"><img src="./images/gith.png" alt="icono de github" width="10%" height="10%"></a><br>
            <p>TRABAJO FINAL BACK END - Php </p>
        </footer>
        <script src="lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
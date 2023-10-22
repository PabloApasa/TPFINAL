<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver noticia</title>
    <link href="lib/bootstrap-5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./admin/CSS/styles.css">


</head>

<body>
    <div class="container-fluid">
        <?php // require("menu.php"); 
        ?>
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

            // Obtener el nombre del día, día del mes, nombre del mes y año de la fecha actual
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
            <br />
            <br />
        </nav>

        <div class="row">
            <?php
            extract($_REQUEST);
            require("admin/conexion.php");
            $conexion = mysqli_connect($server_db, $usuario_db, $password_db)
                or die("No se puede conectar con el servidor");
            mysqli_select_db($conexion, $base_db)
                or die("No se puede seleccionar la base de datos");
            $instruccion = "select * from noticias where id_noticia=" . $id_noticia;

            $consulta = mysqli_query($conexion, $instruccion) or die("no puedo consultar");

            $nfilas = mysqli_num_rows($consulta);
            for ($i = 0; $i < $nfilas; $i++) {
                $resultado = mysqli_fetch_array($consulta);
                $inst2 = "select * from usuarios where id_usuario=" . $resultado['id_usuario'];

                $consulta2 = mysqli_query($conexion, $inst2) or die("no puedo consultar");
                $autor = mysqli_fetch_array($consulta2);

                print('
            <div class="col-12">
                <div class="card">
                <img src="imagenes_subidas/' . $resultado['imagen'] . '" class="card-img-top" alt="' . $resultado['titulo'] . '">
                    <div class="card-body">
                        <h2 class="card-title">' . $resultado['titulo'] . '</h2>
                        <h4 class="card-text">' . substr($resultado['copete'], 0, 200) . '</h4>
                        <p class="card-text">' . substr($resultado['cuerpo'], 0, 10000) . '</p>
                        <br/>
                        <p class="card-text">Autor: ' . $autor['nombre'] . '</p>
                        <p class="card-text">Fecha: ' . $resultado['fecha'] . '</p>
                        <p class="card-text">Categoria: ' . $resultado['categoria'] . '</p> 
                        <a href="javascript:history.back()" class="btn btn-volver">Volver</a>
                    </div>
                 </div>
            </div>           
            
                ');
            }


            mysqli_close($conexion);
            ?>

        </div>


        <footer>
            <p> - BLOW DE NOTICIAS - APASA PABLO - <br>
                <a href="https://github.com/FaniCasco"><img src="./images/gith.png" alt="icono de github" width="10%" height="10%"></a><br>
            <p> - TRABAJO FINAL BACK END - Php - </p>
        </footer>
        <script src="lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/styles.css">
    <title>Menu</title>
</head>

<body>

    <div>

    </div>
    <ul class="nav-menu nav-pills">
        <li class="nav-item">
            <a class="nav-link active" href="index.php">INICIO</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="noticias.php">TABLA DE NOTICIAS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="usuarios_nueva.php">LOGUEARSE</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="usuarios.php">TABLA DE USUARIOS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">SALIR</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../index.php" target="_blank">VER NOTICIERO</a>
        </li>
        <li class="nav-item">
            <?php
            print("<a class='nav-link disabled'>" . $_SESSION['nombre'] . " " . $_SESSION['apellido'] . "</a>");
            ?>
        </li>
    </ul>
</body>

</html>
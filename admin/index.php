<!-- TODO EL BACK END -->
<?php
session_start();
extract($_REQUEST);
if (isset($_SESSION['usuario_logueado']))
    header("location:home.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/styles.css">
</head>

<!-- FORMULARIO DE LOGUEO -->

<body>
    <div class="container-fluid">
        <div class="row">
            <h1>FORMULARIO DE LOGUEO</h1>
            <div>
                <?php
                if (isset($_SESSION['mensaje'])) {
                    print("<p>" . $_SESSION['mensaje'] . "</p>");
                    unset($_SESSION['mensaje']);
                }
                ?>

                <form class="form-usuario" action="login.php" method="post">
                    <h1>INGRESA A TU CUENTA</h1>
                    <div class="mb-3">
                        <label for="usuario" class="form-label">USUARIO</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">PASSWORD</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" id="enviar" name="enviar" value="LOGUEARSE">
                    </div>


                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>